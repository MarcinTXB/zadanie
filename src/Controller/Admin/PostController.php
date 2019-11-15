<?php

namespace App\Controller\Admin;

use App\Entity\Post;
use App\Entity\Temat;
use App\Form\PostType;
use App\Repository\PostRepository;
use App\Repository\AkapitRepository;
use App\Repository\TematRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

//      @IsGranted("ROLE_ADMIN")
/**
 * @Route("/admin") 
 */
class PostController extends AbstractController
{
    /*
     * @Route("/post", name="admin_post_index", methods={"GET"})
     *
    public function index(PostRepository $postRepository, Temat $temat): Response
    {
        //echo "<pre>";
        //print_r($postRepository->findAll());
        //echo "</pre>";
        //die('2______________');
        
        
        return $this->render('admin/post/index.html.twig', [
            'posty' => $postRepository->findAll(),
            'tematNazwa' => $temat->getName(),
        ]);
    }
    
    */

    /**
     * @Route("/{name}/new", name="admin_post_new", methods={"GET","POST"})
     */
    public function new(Request $request, Temat $temat): Response
    {
        //var_dump($temat->getName());
        //die('PostController new');
        $post = new Post();
        $post->setTemat($temat);
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirectToRoute('admin_index');
        }
        
        return $this->render('admin/post/new.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
            'tematName' => $temat->getName(),
            'temat' => $temat
        ]);
    }

    /*
     * @Route("/post/{id<\d+>}", name="admin_post_show", methods={"GET"})
     *
    public function show(Post $post): Response
    {
        echo "<pre>";
        print_r($post->getTytul());
        echo "</pre>";
        die('2__________________');
        return $this->render('admin/post/show.html.twig', [
            'post' => $post,
        ]);
    }
    */

    /**
     * @Route("/{nazwa}/post-{id}/edit", name="admin_post_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, $nazwa, Post $post, AkapitRepository $akapitRepository, TematRepository $tematRepository): Response
    {  
        $temat = $tematRepository->findOneByName($nazwa);
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('admin_list', [
                'name' => $post->getTemat(),
            ]);
        }

        return $this->render('admin/post/edit.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
            'akapity' => $akapitRepository->findByPost($post),
            'temat' => $post->getTemat(),
            'tematName' => $post->getTemat()->getName(),            
        ]);
    }

    /*
     * @Route("/post/{id}", name="admin_post_delete", methods={"DELETE"})
     *
    public function delete(Request $request, Post $post): Response
    {
        if ($this->isCsrfTokenValid('delete'.$post->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($post);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_post_index');
    }
    */
}
