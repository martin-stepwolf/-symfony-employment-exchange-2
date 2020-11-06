<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\OfferRepository;
use App\Entity\Offer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class ApplicantController extends AbstractController
{
    /**
     * @Route("/", name="applicant_index")
     */
    public function index(OfferRepository $offerRepository): Response
    {
        return $this->render('applicant/index.html.twig', [
            'offers' => $offerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/apply/{id}", name="applicant_apply")
     */
    public function apply(Offer $offer, EntityManagerInterface $entityManager)
    {
        $user = $this->getUser();
        if ($user == null)
            return $this->redirectToRoute('app_register');
        $offer->addApplicant($user);
        $entityManager->persist($offer);
        try {
            $entityManager->flush();
            $this->addFlash('success', 'Request received!');
        } catch (\Exception $exception) {
            $this->addFlash('danger', 'Request was not received, please try it later.');
        }
        return $this->redirectToRoute('applicant_index');
    }
}
