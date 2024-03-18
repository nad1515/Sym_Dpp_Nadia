<?php

namespace App\Controller;
//  use App\Form\ConnectionType;
use App\Entity\User;
 use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
 use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
// use  Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('user/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

//     #[Route('/add', name: 'app_user_add')]
//     public function addUser(UserPasswordHasherInterface $passwordHasher,Request $request, EntityManagerInterface $entityManager):Response
//  {
//  // Créer une instance de l'entité User
//  $user = new User();
//  // Définir le nom d'utilisateur, le mot de passe, et d'autres propriétés
//  $user->setNom('nouvel_utilisateur');
//  $user->setPassword($passwordHasher->hashPassword(
//  $user,
//  'mot_de_passe_secret'
//  ));
//  // Ajouter des rôles si nécessaire
//  $user->setRoles(['ROLE_USER']);
//  // Enregistrer l'utilisateur dans la base de données
//  $entityManager = $this->getDoctrine()->getManager();
//  $entityManager->persist($user);
//  $entityManager->flush();
//  return $this->redirectToRoute('homepage');
//  }
}
