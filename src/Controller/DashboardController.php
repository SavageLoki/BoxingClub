<?php

namespace App\Controller;

use App\Entity\Child;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @IsGranted("ROLE_ADMIN")
 */
class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(): Response
    {
        $children = $this->getDoctrine()->getRepository(Child::class)->findBy([
            'statut' => 'attente'
        ]);

        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }

    /**
     * @Route("/dashboard/course", name="course_management")
     */
    public function courseManagement(): Response
    {
        return $this->render('dashboard/courseManagement.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }

    /**
     * @Route("/dashboard/paiement", name="paiement_management")
     */
    public function paiementManagement(): Response
    {
        return $this->render('dashboard/paiementManagement.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }

    /**
     * @Route("/dashboard/absence", name="absence_management")
     */
    public function absenceManagement(): Response
    {
        return $this->render('dashboard/absenceManagement.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
}
