<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UserRepository;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;


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
    SINGLE
    */

    /*#[Route('/api/users/{id}', name: 'api_single_user', methods: ['GET'])]
    public function single(string $user, UserRepository $userRepository): JsonResponse
    {
    $user = $userRepository->find($id);
    if (!$user) {
    throw $this->createNotFoundException(sprintf('No user found with id "%s"', $id));
    }
    $data = [
    'id' => $user->getId(),
    'name' => $user->getName(),
    'email' => $user->getEmail(),
    'createdAt' => $user->getCreatedAt()->format('Y-m-d H:i:s'),
    'updatedAt' => $user->getUpdatedAt()->format('Y-m-d H:i:s'),
    ];
    return $this->json($data);
    }*/

    /**
     * @Route("/api/users/{id}", name="api_get_user", methods={"GET"})
     */
    public function single(int $id, UserRepository $userRepository): JsonResponse
    {
        $user = $userRepository->find($id);

        if (!$user) {
            throw $this->createNotFoundException(sprintf('No user found with id "%s"', $id));
        }

        $data = [
            'id' => $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'createdAt' => $user->getCreatedAt()->format('Y-m-d H:i:s'),
            'updatedAt' => $user->getUpdatedAt()->format('Y-m-d H:i:s'),
        ];

        return $this->json($data);
    }

    /* 
    CREATE
    */

    #[Route('/api/users', name: 'users_create', methods: ['POST'])]
    public function create(Request $request, UserRepository $userRepository): JsonResponse
    {

        if ($request->headers->get('content-type') == 'application/json') {
            $data = $request->toArray();
        } else {
            $data = $request->request->all();
        }


        $user = new User();
        $user->setName($data['name']);
        $user->setEmail($data['email']);
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

    #[Route('/api/users/{id}', name: 'users_update', methods: ['PUT', 'PATCH'])]
    public function update(int $id, Request $request, ManagerRegistry $doctrine, UserRepository $userRepository): JsonResponse
    {
        $user = $userRepository->find($id);

        if (!$user) {
            throw $this->createNotFoundException();
        }

        $data = $request->request->all();

        $user->setName($data['name']);
        $user->setEmail($data['email']);
        $user->setUpdatedAt(new \DateTimeImmutable('now', new \DateTimeZone('UTC')));

        $doctrine->getManager()->flush();

        return $this->json([
            'message' => 'User successfully updated',
            'data' => $user,
        ], 201);
    }





    /*
    DELETE
    */


    /*#[Route('/api/users/{user}', name: 'users_update', methods: ['DELETE'])]
    public function delete(int $user, Request $request, UserRepository $userRepository): JsonResponse
    {
    $user = $userRepository->find($user);
    $userRepository->remove($user, true);
    return $this->json([
    'data' => $user
    ]);
    } */

    #[Route('/api/users/{id}', name: 'users_delete', methods: ['DELETE'])]
    public function delete(int $id, ManagerRegistry $doctrine, UserRepository $userRepository): JsonResponse
    {
        $user = $userRepository->find($id);

        if (!$user) {
            throw $this->createNotFoundException();
        }

        $entityManager = $doctrine->getManager();
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->json([
            'message' => 'User successfully deleted',
        ], 200);
    }


    /*
    SEARCH
    */

    #[Route('/api/users/search', name: 'api_search_users', methods: ['GET'])]
    public function searchUsersByEmail(Request $request, UserRepository $userRepository): JsonResponse
    {
        $email = $request->query->get('email');

        $users = $userRepository->findBy(['email' => $email]);

        return $this->json([
            'data' => $users
        ]);
    }



}