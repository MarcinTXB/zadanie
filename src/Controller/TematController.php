<?php

namespace App\Controller;

use App\Entity\Temat;
use App\Form\TematType;
use App\Repository\TematRepository;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/") 
 */
class TematController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(TematRepository $tematRepository): Response
    {
        return $this->render('index.html.twig', [
            //'tematy' => $tematRepository->findAll(),
            'tematy' => $tematRepository->findAllOrdered()
            
        ]);
    }
    
    /**
     * ("/{name}", name="show", methods={"GET"}, requirements={"id" = "\w+"})
     *
    public function show(Temat $temat): Response
    {
        return $this->render('show.html.twig', [
            'temat' => $temat,
        ]);
    }
    */
        
    
    
    /**
     * @Route("/{name}", name="list", methods={"GET"})
     */
    public function list(Request $request, Temat $temat, PostRepository $postRepository): Response
    {
        /*
        echo "<pre>";
        print_r($postRepository->findByTemat($temat)[0]->getAkapity()[3]->getKolor());        
        echo "</pre>";        
        die('TematController list');*/
        
        
        
        
        return $this->render('list.html.twig', [
            //'temats' => $tematRepository->findAll(),
            'posty' => $postRepository->findByTemat($temat),
            'tematNazwa' => $temat->getName(),
            
        ]);
        
    }
    
}
