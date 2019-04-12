<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpCache\ResponseCacheStrategy;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Article;
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render("test/fiche_article.html.twig");
    }

    /**
     * @Route("/article/",name="article")
     */
    public function showArticle(){
        $article=$this->getDoctrine()
        ->getRepository("AppBundle:Article")
            ->findByNom("article A");
        if(!$article){
            throw $this->createNotFoundException("Aucun produit ne correspond");
        }
        return new Response($article[1]->getNom());
    }

    /**
     * @Route("/catalogue/",name="catalogue")
     */
    public function showALlArticle(){
        $articles=$this->getDoctrine()
            ->getRepository("AppBundle:Article")
            ->findAll();

        return new Response(count($articles)." articles dans le catalogue");

    }
}
