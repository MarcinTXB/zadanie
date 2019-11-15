<?php

namespace App\Controller;

use App\Entity\Akapit;
use App\Entity\Post;
use App\Form\AkapitType;
use App\Repository\AkapitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/akapit")
 */
class AkapitController extends AbstractController
{
    /**
     * @Route("/{id}", name="akapit_index", methods={"GET"})
     */
    public function index(AkapitRepository $akapitRepository, Post $post): Response
    {
        return $this->render('akapit/index.html.twig', [
            'akapity' => $akapitRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="akapit_new", methods={"GET","POST"})
     */
    public function new(Request $request, Post $post): Response
    {
        $akapit = new Akapit();
        $form = $this->createForm(AkapitType::class, $akapit);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($akapit);
            $entityManager->flush();

            return $this->redirectToRoute('akapit_index');
        }

        return $this->render('akapit/new.html.twig', [
            'akapit' => $akapit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="akapit_show", methods={"GET"})
     */
    public function show(Akapit $akapit): Response
    {
        return $this->render('akapit/show.html.twig', [
            'akapit' => $akapit,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="akapit_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Akapit $akapit): Response
    {
        $form = $this->createForm(AkapitType::class, $akapit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('akapit_index');
        }

        return $this->render('akapit/edit.html.twig', [
            'akapit' => $akapit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="akapit_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Akapit $akapit): Response
    {
        if ($this->isCsrfTokenValid('delete'.$akapit->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($akapit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('akapit_index');
    }
}
