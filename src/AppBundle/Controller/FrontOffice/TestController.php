<?php

namespace AppBundle\Controller\FrontOffice;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    class TestController extends Controller
    {
        /**
         * @Route("/test", name="test")
         */
        public function indexAction(Request $requesr)
    {
        // replace this example code with whatever you need
        $username ='Defrex';

     /* return $this->render('test/login.html.twig');*/
        return $this->render('test/test.html.twig',array('username'=>$username,
            'listProduits'=>$this->getProduitsBase()));
    }
        private function getProduits(){
            $produits=['clavier','ecran','souris','tour','portable'];
            return $produits;
        }

        private function getProduitsBase(){
            $produits[1]=["id"=>1,"libelle"=>"clavier",
                "description"=>"périphérique d'entréé composé de plusieurs touches"];

            $produits[2]=["id"=>1,"libelle"=>"ecran",
                "description"=>"périphérique de sortie qui ser à afficher"];

            $produits[3]=["id"=>1,"libelle"=>"souris",
                "description"=>"périphérique d'entréé/sortie qui clique et pointe"];

            return $produits;
        }
        /**
         * @Route("/test/article/{id}",name="fiche_article",requirements={"id"="\d+"})
         * @Route("test/article/",defaults={"id"=1})
         * @Method({"POST"})
        */
        public function afficherDetailProduit($id){
            $username="Defrex";
            return($this->render("test/fiche_article.html.twig",array('username'=>$username,
                'produit'=>$this->getProduitsBase()[$id])));

    }
    }
