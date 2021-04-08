<?php

namespace App\Controller;

use App\Entity\Child;
use App\Form\ClassRegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class ClassRegistrationController extends AbstractController
{
    /**
     * @Route("/preinscription", name="class_registration")
     * @IsGranted("ROLE_USER")
     */
    public function preregister(Request $request): Response
    {
        $child = new Child;
        $form = $this->createForm(ClassRegistrationType::class, $child);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $child->setStatut('attente');
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($child);
            $entityManager->flush();

            return $this->render('class_registration/formSended.html.twig');
        }

        return $this->render('class_registration/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
