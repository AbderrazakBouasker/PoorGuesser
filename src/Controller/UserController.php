<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, UserRepository $userRepository): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->save($user, true);

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, UserRepository $userRepository, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($userPasswordHasher->isPasswordValid($user,$request->request->get('PlainPassword'))){
                $user->setPassword($userPasswordHasher->hashPassword($user,$form->get('password')->getData()));
                $userRepository->save($user, true);
                //return new JsonResponse(array("1"=>$user->getPassword(),"2"=>$userPasswordHasher->hashPassword($user,$request->request->get('PlainPassword')),"3"=>$user->getPassword()==$userPasswordHasher->hashPassword($user,$request->request->get('PlainPassword')),"4"=>password_verify($request->request->get('PlainPassword'),$user->getPassword())));
                //return new JsonResponse(array("plainpass"=>$request->request->get('PlainPassword'),"hashpass"=>$user->getPassword(),"comp"=>password_verify($request->request->get('PlainPassword'),$user->getPassword())));
//                return new JsonResponse(array("plain"=>$request->request->get('PlainPassword'),"comp"=>$userPasswordHasher->isPasswordValid($user,$request->request->get('PlainPassword'))));
            }


            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_user_edit_username', methods: ['GET', 'POST'])]
    public function editusername(Request $request, UserPasswordHasherInterface $userPasswordHasher , User $user, UserRepository $userRepository): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        $upuser=new User();

        if ($form->isSubmitted() && $form->isValid()) {
            if ($userPasswordHasher->hashPassword(
                $user,
                $form->get('plainPassword')->getData()
            ) == $user->getPassword()){
                $upuser->setUsername($form->get('username')->getData());
                $userRepository->updateUsername($user,$upuser);
            }


            return $this->redirectToRoute('app_user_show', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, UserRepository $userRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $userRepository->remove($user, true);
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
