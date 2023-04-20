<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Serializer\SerializerInterface;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\JsonApiSerializer;
use League\Fractal\Serializer\ArraySerializer;
use DateTime;


#[Route('/api', name: 'api_', methods: ['GET'])]
class UserController extends AbstractController
{
    /*
    LIST
    */

    #[Route('/users', name: 'users_list', methods: ['GET'])]
    public function index(UserRepository $userRepository): JsonResponse
    {
        $fractal = new Manager();
        $fractal->setSerializer(new ArraySerializer());

        $users = $userRepository->findAll();

        $resource = new Collection($users, function ($user) {
            return [
                'id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
		'phone_number' => $user->getPhonenumber(),
		'birthdate' => $user->getBirthdate()->format('Y-m-d'),
		'bio' => $user->getBio(),
		'city' => $user->getCity(),
		'created_at' => $user->getCreatedAt()->format('Y-m-d H:i:s'),
		'updated_at' => $user->getUpdatedAt()->format('Y-m-d H:i:s')
            ];
        });

        $data = $fractal->createData($resource)->toArray();
        return new JsonResponse($data);
    }

    /*
    CREATE
    */

    #[Route('/users', name: 'users_create', methods: ['POST'])]
    public function create(
        Request $request,
        UserRepository $userRepository,
        EntityManagerInterface $entityManager,
        SerializerInterface $serializer
    ): JsonResponse {

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
	    $birthdate = new DateTime($requestData['birthdate']);
            $user->setBirthDate($birthdate);
        }

        if (isset($requestData['bio'])) {
            $user->setBio($requestData['bio']);
        }

        if (isset($requestData['city'])) {
            $user->setCity($requestData['city']);
        }

        if (isset($requestData['phone_number'])) {
            $user->setPhonenumber($requestData['phone_number']);
        }

        $errors = $validator->validate($user);
        if (count($errors) > 0) {
            return $this->json([
                'message' => 'Validation errors',
                'errors' => (string) $errors,
            ], 400);
        }

        $user->setUpdatedAt(new \DateTimeImmutable('now', new \DateTimeZone('Europe/London')));

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

    #[Route('/users/search/{email}', name: 'users_single', methods: ['GET'])]
    public function search(string $email, UserRepository $userRepository): JsonResponse
    {
        $user = $userRepository->findOneByEmail($email);

        // Handle the case where the user is not found
        if (!$user) {
            return new JsonResponse(['message' => 'User not found'], 404);
        }

        // Return the user details as a JSON response
        return $this->json($user);
    }
}
