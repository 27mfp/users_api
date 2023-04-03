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
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

#[Route('/api', name: 'api_', methods: ['GET'])]
class UserController extends AbstractController
{

    #[Route('/login',name: 'login',methods: ['POST'])]
    public function login()
    {
        return new JsonResponse("connected");
    }
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
        UserPasswordHasherInterface $passwordHasher
    ): JsonResponse {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

<<<<<<< Updated upstream
        /** @var \App\Entity\User $user */
        $user = $serializer->deserialize($request->getContent(), User::class, 'json');
=======
        $name = $requestData['name'];
        $email = $requestData['email'];
        $birthdate = $requestData['birthdate'];
        $bio = $requestData['bio'];
        $city = $requestData['city'];
        $phonenumber = $requestData['phonenumber'];
>>>>>>> Stashed changes

        $user->setUpdatedAt(new \DateTimeImmutable());

<<<<<<< Updated upstream
        $user->setPassword($passwordHasher->hashPassword($user,$user->getPassword()));
=======
        $user = new User();
        $user->setName($name);
        $user->setEmail($email);
        $user->setCreatedAt(new \DateTimeImmutable('now', new \DateTimeZone('UTC')));
        $user->setUpdatedAt(new \DateTimeImmutable('now', new \DateTimeZone('UTC')));
        $user->setBirthdate($birthdate);
        $user->setBio($bio);
        $user->setCity($city);
        $user->setphonenumber($phonenumber);
>>>>>>> Stashed changes

        $userRepository->save($user, true);

        return $this->json([
            'message' => 'User successfully created',
            'data' => $user,
        ], 201);
    }

    /*
    UPDATE
    */

    #[Route('/users/{user}', name: 'users_update', methods: ['PUT', 'PATCH'])]
    public function update(
        User $user,
        Request $request,
        ManagerRegistry $doctrine,
        UserRepository $userRepository
    ): JsonResponse {
        $requestData = json_decode($request->getContent(), true);

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

<<<<<<< Updated upstream
        if (isset($requestData['admin'])) {
            $user->setAdmin($requestData['admin']);
=======
        if (isset($requestData['phonenumber'])) {
            $user->setphonenumber($requestData['phonenumber']);
>>>>>>> Stashed changes
        }

        $user->setUpdatedAt(new \DateTimeImmutable('now', new \DateTimeZone('UTC')));

        $entityManager = $doctrine->getManager();
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
