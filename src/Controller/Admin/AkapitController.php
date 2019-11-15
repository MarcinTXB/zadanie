<?php

namespace App\Controller\Admin;

use App\Entity\Akapit;
use App\Entity\Post;
use App\Entity\Temat;
use App\Form\AkapitType;
use App\Repository\AkapitRepository;
use App\Repository\TematRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class AkapitController extends AbstractController
{
    /**
     * @Route("/akapit", name="admin_akapit_index", methods={"GET"})
     */
    public function index(AkapitRepository $akapitRepository, Post $post): Response
    {
        return $this->render('admin/akapit/index.html.twig', [
            'akapity' => $akapitRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{nazwa}/post-{id}/akapit-new", name="admin_akapit_new", methods={"GET","POST"})
     */
    public function new(Request $request, $nazwa, Post $post, TematRepository $tematRepository): Response
    {
        //var_dump($post->getTytul());
        //die('2_____');
        $temat = $tematRepository->findOneByName($nazwa);
        $akapit = new Akapit();
        $akapit->setPost($post);
        $form = $this->createForm(AkapitType::class, $akapit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($akapit);
            $entityManager->flush();

            return $this->redirectToRoute('admin_index');
        }
        
        return $this->render('admin/akapit/new.html.twig', [
            'akapit' => $akapit,
            'form' => $form->createView(),
            'post' => $post,
            'temat' => $temat
        ]);
    }

    /**
     * @Route("/akapit/{id}", name="admin_akapit_show", methods={"GET"})
     */
    public function show(Akapit $akapit): Response
    {
        return $this->render('admin/akapit/show.html.twig', [
            'akapit' => $akapit,
        ]);
    }


    //  @Route("/{nazwa}/akapit/{id}/edit", name="admin_akapit_edit", methods={"GET","POST"})
    /**     
     * @Route("/{nazwa}/post-{post}/akapit-{id}/edit", name="admin_akapit_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, $nazwa, $post, Akapit $akapit, TematRepository $tematRepository): Response
    {
        //var_dump($akapit->getPost()->getTemat()->getName());
        //die('AkapitController edit');
        $temat = $tematRepository->findOneByName($nazwa);
        $form = $this->createForm(AkapitType::class, $akapit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            //var_dump($akapit->getPost()->getTemat()->getName());
            //die('AkapitController edit ___');
            
            return $this->redirectToRoute('admin_post_edit', [
                'id' => $akapit->getPost()->getId(),
            //    'temat' => $temat,                                        Skasowaliśmy
                'nazwa' => $temat->getName()                           //   Dodaliśmy
            ]);
        }

        return $this->render('admin/akapit/edit.html.twig', [
            'akapit' => $akapit,
            'form' => $form->createView(),
            'temat' => $temat,
            'post' => $akapit->getPost()
            
        ]);
    }

    /**
     * @Route("/akapit/{id}", name="admin_akapit_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Akapit $akapit): Response
    {
        if ($this->isCsrfTokenValid('delete'.$akapit->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($akapit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_akapit_index');
    }
}
