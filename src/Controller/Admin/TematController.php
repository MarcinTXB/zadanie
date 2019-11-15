<?php

namespace App\Controller\Admin;

use App\Entity\Temat;
use App\Form\TematType;
use App\Repository\TematRepository;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;



//  //  @IsGranted("ROLE_ADMIN")
/**
 * @Route("/admin")
 *                              
 */
class TematController extends AbstractController
{
    /**
     * @Route("/", name="admin_index", methods={"GET"})
     */
    public function index(TematRepository $tematRepository): Response
    {
        return $this->render('admin/temat/index.html.twig', [
            'temats' => $tematRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $temat = new Temat();
        $form = $this->createForm(TematType::class, $temat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($temat);
            $entityManager->flush();

            return $this->redirectToRoute('admin_index');
        }

        return $this->render('admin/temat/new.html.twig', [
            'temat' => $temat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * ("/{name}", name="show", methods={"GET"}, requirements={"id" = "\w+"})
     *
    public function show(Temat $temat): Response
    {
        return $this->render('temat/show.html.twig', [
            'temat' => $temat,
        ]);
    }
    */
    
    /**
     * @Route("/{name}/edit", name="admin_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Temat $temat): Response
    {
        $form = $this->createForm(TematType::class, $temat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_index');
        }

        return $this->render('admin/temat/edit.html.twig', [
            'temat' => $temat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{name}", name="admin_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Temat $temat): Response
    {
        if ($this->isCsrfTokenValid('delete'.$temat->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($temat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_index');
    }
    
    /**
     * @Route("/{name}", name="admin_list", methods={"GET"})
     */
    public function list(Request $request, Temat $temat, PostRepository $postRepository): Response
    {
        
        /*echo "<pre>";
        print_r($postRepository->findByTemat($temat));
        echo "</pre>";
        die('TematController list');*/
        
        return $this->render('admin/post/index.html.twig', [
            //'temats' => $tematRepository->findAll(),
            'posty' => $postRepository->findByTemat($temat),
            'tematNazwa' => $temat->getName(),
            'temat' => $temat
        ]);
    }      
    
    
}
