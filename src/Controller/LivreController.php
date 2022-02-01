<?php

namespace App\Controller;

session_start();

use App\Entity\Livre;
use App\Helpers\EntityManagerHelper as Em;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class LivreController
{
    
    const REQUIRES = [
        "title",
        "resume",
        "num_ISBN",
        'exemplaire_dispo',
        'exemplaire_emprunte',
        "editor",
        "author",
        'stock'
    ];

    public function showAll()
    {
        $em = Em::getEntityManager();
        $repository = new EntityRepository($em, new ClassMetadata("App\Entity\Livre"));
        $repoUser = new EntityRepository($em, new ClassMetadata("App\Entity\User"));

        $aLivre =$repository->findAll();
        $oAuthor = $repoUser->findAll(); 
        include __DIR__ . "/../Vues/Livres/showAll.php";

        
       
    }

    public function add()
    {
           
        foreach (self::REQUIRES as $value) {

            $_POST[$value] = htmlentities(strip_tags(trim($_POST[$value])));
            if ($_POST[$value] === '') {
                $_SESSION['error'] = 'Veuillez remplir tous les champs ! ';
                include __DIR__ . "/../Vues/Livres/add.php";
                exit();
            }
            if (!array_key_exists($value, $_POST)) {
                $_SESSION['error'] = 'Veuillez remplir tous les champs ! ';
                include __DIR__ . "/../Vues/Livres/add.php";
                exit();
            }
        }
            $em = Em::getEntityManager();
            $repo = new EntityRepository($em, new ClassMetadata("App\Entity\User"));
            $editor = $repo->find($_POST['editor']);
            $author = $repo->find($_POST['author']);

            if (!$editor) {
            echo "l'editeur n'existe pas";
            include __DIR__ . "/../Vues/Livres/add.php";
            exit;
            }

            if (!$author) {
                echo "l'editeur n'existe pas";
                include __DIR__ . "/../Vues/Livres/add.php";
                exit;
            }

            
        $aLivre = new Livre($_POST['title'],$_POST['resume'],$_POST['num_ISBN'],$_POST['exemplaire_dispo'],$_POST['exemplaire_emprunte'], $editor, $author, $_POST['stock']);

        $em->persist($aLivre);

        $em->flush();
        
        include __DIR__ . "/../Vues/Livres/add.php";
    }

    public function modify(string $id)
    {
        $em = Em::getEntityManager();
        $RepoLivre = new EntityRepository($em, new ClassMetadata("App\Entity\Livre"));
        $RepoUser = new EntityRepository($em, new ClassMetadata("App\Entity\User"));

        $livreId = $RepoLivre->find($id);
 

        if (!empty($_POST)) {
            foreach (self::REQUIRES as $value) {
                // var_dump("je suis la "); die;
                $exist = array_key_exists($value, $_POST);
                if ($exist === false) {
                    echo "Erreur";
                    include __DIR__ . "/../Vues/Livres/modify.php";
                    exit;
                }
                $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));
                
                if ($_POST[$value] === "") {
                    echo "champs $value vide";
                    include __DIR__ . "/../Vues/Livres/modify.php";
                    die();

                }
            }
            

            if ($_POST["title"] !== $livreId->getTitle()) {
                $livreId->setTitle($_POST["title"]);
            }
            if ($_POST["resume"] !== $livreId->getResume()) {
                $livreId->setResume($_POST["resume"]);
            }
            if ($_POST["num_ISBN"] !== $livreId->getNumISBN()) {
                $livreId->setNumISBN($_POST["num_ISBN"]);
            }
            if ($_POST["exemplaire_dispo"] !== $livreId->getExemplaireDispo()) {
                $livreId->setExemplaireDispo($_POST["exemplaire_dispo"]);
            }
            if ($_POST["exemplaire_emprunte"] !== $livreId->getExemplaireEmprunte()) {
                $livreId->setExemplaireEmprunte($_POST["exemplaire_emprunte"]);
            }
            if ($_POST["editor"] !== $livreId->getEditor()->getId()) { 
                $oEditor = $RepoUser->find($_POST["editor"]);
                $livreId->setEditor($oEditor);
            }
            if ($_POST["author"] !== $livreId->getAuthor()->getId()) {
                $oAuthor = $RepoUser->find($_POST["author"]);
                $livreId->setAuthor($oAuthor);
            }
            if ($_POST["stock"] !== $livreId->getStock()) {
                $livreId->setStock($_POST["stock"]);
            }       
                  
            $em->persist($livreId);
            $em->flush();
        }
        
        include __DIR__ . "/../Vues/Livres/modify.php";

    }

    public function delete(string $id)
    {
        $em = Em::getEntityManager();
        $Repo = new EntityRepository($em, new ClassMetadata("App\Entity\Livre"));

        $livreD = $Repo->find($id);

        $em->remove($livreD);
        $em->flush();

    }
}