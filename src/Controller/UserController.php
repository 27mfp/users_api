<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/api', name: 'api_', methods: ['GET'])]
class UserController extends AbstractController
{
    /*
    LIST
    */

    #[Route('/users', name: 'users_list', methods: ['GET'])]
    public function index(UserRepository $userRepository): JsonResponse
    {
        return $this->json([
            'data' => $userRepository->findAll(),
        ]);
    }

    /*
    CREATE
    */

    #[Route('/users', name: 'users_create', methods: ['POST'])]
    public function create(
        Request $request,
        UserRepository $userRepository,
        EntityManagerInterface $entityManager
    ): JsonResponse {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        $data = json_decode($request->getContent(), true);
        $email = $data['email'];

        if ($userRepository->findOneBy(['email' => $email])) {
            return $this->json([
                'message' => sprintf('User with email: %s already exists', $email),
            ], Response::HTTP_CONFLICT);
        }

        /** @var \App\Entity\User $user */
        $user = $serializer->deserialize($request->getContent(), User::class, 'json');
        $user->setUpdatedAt(new \DateTimeImmutable());
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->json([
            'message' => 'User successfully created',
            'data' => $user,
        ], Response::HTTP_CREATED);
    }


    /*
    UPDATE
    */

    #[Route('/users/{email}', name: 'users_update', methods: ['PUT', 'PATCH'])]
    public function update(
        string $email,
        Request $request,
        EntityManagerInterface $entityManager,
        ValidatorInterface $validator
    ): JsonResponse {
        $user = $entityManager->getRepository(User::class)->findOneBy(['email' => $email]);

        if (!$user) {
            throw $this->createNotFoundException(sprintf('No user found with email: "%s"', $email));
        }

        $requestData = json_decode($request->getContent(), true);

        if (isset($requestData['email']) && $requestData['email'] !== $user->getEmail()) {
            $existingUser = $entityManager->getRepository(User::class)->findOneBy(['email' => $requestData['email']]);
            if ($existingUser) {
                return $this->json([
                    'message' => sprintf('User with email: %s already exists', $requestData['email']),
                ], 400);
            }
        }

        if (isset($requestData['name'])) {
            $user->setName($requestData['name']);
        }

        if (isset($requestData['email'])) {
            $user->setEmail($requestData['email']);
        }

        if (isset($requestData['birthdate'])) {
            $user->setBirthdate($requestData['birthdate']);
        }

        if (isset($requestData['bio'])) {
            $user->setBio($requestData['bio']);
        }

        if (isset($requestData['city'])) {
            $user->setCity($requestData['city']);
        }

        $errors = $validator->validate($user);
        if (count($errors) > 0) {
            return $this->json([
                'message' => 'Validation errors',
                'errors' => (string) $errors,
            ], 400);
        }

        $user->setUpdatedAt(new \DateTimeImmutable('now', new \DateTimeZone('UTC')));

        $entityManager->flush();

        return $this->json([
            'message' => 'User successfully updated',
            'data' => $user,
        ], 201);
    }



    /*
    DELETE
    */

    #[Route('/users/{email}', name: 'users_delete', methods: ['DELETE'])]
    public function delete(
        string $email,
        EntityManagerInterface $entityManager,
        UserRepository $userRepository
    ): JsonResponse {
        $user = $userRepository->findOneBy(['email' => $email]);

        if (!$user) {
            throw $this->createNotFoundException(sprintf('No user found with email "%s"', $email));
        }

        $entityManager->remove($user);
        $entityManager->flush();

        return $this->json([
            'message' => 'User successfully deleted',
        ], 200);
    }

    /*
    SEARCH BY EMAIL
    */

    #[Route('/users/search', name: 'users_search', methods: ['GET'])]
    public function search(Request $request, UserRepository $userRepository): JsonResponse
    {
        $email = $request->query->get('email');

        if (!$email) {
            throw new BadRequestHttpException('Missing email parameter');
        }

        $user = $userRepository->findOneBy(['email' => $email]);

        if (!$user) {
            throw $this->createNotFoundException(sprintf('No user found with email "%s"', $email));
        }

        return $this->json([
            'data' => $user,
        ], 200);
    }
}