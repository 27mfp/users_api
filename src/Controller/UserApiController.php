<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Validator\ValidatorInterface;


#[Route('api/users', name: 'user_api_')]
class UserApiController
{

    public function __construct(
        public ValidatorInterface $validator,
        public UserRepository $userRepository
    ) {
    }

    private const MESSAGE_USER_CREATED = 'user with id %s has been successfully created';
    private const MESSAGE_USER_UPDATED = 'user with id %s has been successfully updated';
    private const MESSAGE_USER_DELETED = 'user with id %s has been successfully deleted';
    private const MESSAGE_USER_NOT_FOUND = 'user with id %s is not found';

    #[Route(name: 'index', methods: ['GET'])]
    public function index(UserRepository $userRepository): JsonResponse
    {

        $data = [
            'message' => $userRepository->findAll(),
            'errors' => []
        ];

        return new JsonResponse($data);
    }

    #[Route(name: 'create', methods: ['POST'])]
    public function create(
        Request $request,
        UserPasswordHasherInterface $passwordHasher
    ): JsonResponse {


        $user = $this->populateUserFromRequest($request);

        $errors = $this->handleErrors($user);

        if (empty($errors)) {

            $user->setUpdatedAt(new \DateTimeImmutable());
            $user->setPassword($passwordHasher->hashPassword($user, $user->getPassword()));

            $this->userRepository->save($user, true);
        }

        $data = [
            'message' => empty($errors) ? sprintf(static::MESSAGE_USER_CREATED, $user->getId()) : 'error',
            'errors' => $errors
        ];


        return new JsonResponse($data, Response::HTTP_CREATED);

    }

    #[Route(path: '/{id}', name: 'update', methods: ['POST'])]
    public function update(
        Request $request,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $passwordHasher
    ): JsonResponse {

        $user = $this->userRepository->findOneBy(["email" => $request->get('id')]);

        if (!$user) {
            return new JsonResponse(static::MESSAGE_USER_NOT_FOUND);
        }

        $user = $this->populateUserFromRequest($request, $user);

        $errors = $this->handleErrors($user);

        if (empty($errors)) {

            if ($request->get('password')) {
                $user->setPassword($passwordHasher->hashPassword($user, $user->getPassword()));
            }

            $user->setUpdatedAt(new \DateTimeImmutable());

            $em->flush();
        }
        $data = [
            'message' => empty($errors) ? sprintf(static::MESSAGE_USER_UPDATED, $user->getId()) : 'error',
            'errors' => $errors
        ];


        return new JsonResponse($data);
    }

    #[Route(path: '/{id}', name: 'delete', methods: ['DELETE'])]
    public function delete(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $user = $this->userRepository->findOneBy(["email" => $request->get('id')]);

        if (!$user) {
            return new JsonResponse(static::MESSAGE_USER_NOT_FOUND);
        }

        $id = $user->getId();

        $this->userRepository->remove($user, true);

        return new JsonResponse(sprintf(static::MESSAGE_USER_DELETED, $id));
    }

    private function populateUserFromRequest(Request $request, ?User $user = null): User
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);


        try {
            $user = $serializer->deserialize($request->getContent(), User::class, 'json', [
                AbstractNormalizer::OBJECT_TO_POPULATE => $user ?? new User()
            ]);
        } catch (NotNormalizableValueException|NotEncodableValueException $exception) {
            dd($exception);
        }

        return $user;
    }

    private function handleErrors(User $user): array
    {

        $errors = $this->validator->validate($user);
        $message = [];

        foreach ($errors as $error) {
            $message[$error->getPropertyPath()] = $error->getMessage();
        }

        return $message;
    }

}
