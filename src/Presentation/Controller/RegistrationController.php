<?php

namespace App\Presentation\Controller;
 
use App\Presentation\Form\UserType;
use App\Domain\User\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
 
class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="user_registration")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
 
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
 
            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
 
            // Par defaut ROLE_ADMIN et peut être changer en ROLE_USER
            $user->setRoles(['ROLE_ADMIN']);
 
            // On enregistre l'utilisateur dans la base
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
 
            return $this->redirectToRoute('security_login');
        }
 
        return $this->render(
            'pages/register.html.twig',
            array('form' => $form->createView())
        );
    }
}