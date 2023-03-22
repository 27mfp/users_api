<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
    /* 
    LIST
    */

    #[Route('/api/users', name: 'users_list', methods: ['GET'])]
    public function index(UserRepository $userRepository): JsonResponse
    {
        return $this->json([
            'data' => $userRepository->findAll(),
        ]);
    }

    /* 
    CREATE
    */

    #[Route('/api/users', name: 'users_create', methods: ['POST'])]
    public function create(Request $request, UserRepository $userRepository): JsonResponse
    {
        $requestData = json_decode($request->getContent(), true);

        $name = $requestData['name'];
        $email = $requestData['email'];

        $user = new User();
        $user->setName($name);
        $user->setEmail($email);
        $user->setCreatedAt(new \DateTimeImmutable('now', new \DateTimeZone('UTC')));
        $user->setUpdatedAt(new \DateTimeImmutable('now', new \DateTimeZone('UTC')));

        $userRepository->add($user, true);

        return $this->json([
            'message' => 'User successfully created',
            'data' => $user,
        ], 201);
    }



    /* 
    UPDATE
    */

    #[Route('/api/users/{user}', name: 'users_update', methods: ['PUT', 'PATCH'])]
    public function update(User $user, Request $request, ManagerRegistry $doctrine, UserRepository $userRepository): JsonResponse
    {
        $requestData = json_decode($request->getContent(), true);

        if (isset($requestData['name'])) {
            $user->setName($requestData['name']);
        }

        if (isset($requestData['email'])) {
            $user->setEmail($requestData['email']);
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

    #[Route('/api/users/{email}', name: 'users_delete', methods: ['DELETE'])]
    public function delete(string $email, EntityManagerInterface $entityManager, UserRepository $userRepository): JsonResponse
    {
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

    #[Route('/api/users/search', name: 'users_search', methods: ['GET'])]
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