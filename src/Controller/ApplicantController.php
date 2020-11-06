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
        // TODO: use IsGranted to manage access
        $user = $this->getUser();
        if ($user == null)
            return $this->redirectToRoute('app_login');
        $roles = $this->getUser()->getRoles();
        if (!in_array('ROLE_APPLICANT', $roles)) {
            $this->addFlash('danger', 'Rejected request, use an normal account to apply for an offer.');
            return $this->redirectToRoute('applicant_index');
        }

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
