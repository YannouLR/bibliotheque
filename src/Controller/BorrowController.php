<?php

namespace App\Controller;

session_start();

use App\Entity\Borrow;
use App\Helpers\EntityManagerHelper as Em;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class BorrowController
{
    
    const REQUIRES = [
        "user",
        "livre"
    ];

    public function showAll()
    {
        $em = Em::getEntityManager();
        $repository = new EntityRepository($em, new ClassMetadata("App\Entity\Borrow"));

        $aBorrow =$repository->findAll();
    }

    public function add()
    {
           
        foreach (self::REQUIRES as $value) {

            $_POST[$value] = htmlentities(strip_tags(trim($_POST[$value])));
            if ($_POST[$value] === '') {
                $_SESSION['error'] = 'Veuillez remplir tous les champs ! ';
                include __DIR__ . "/../Vues/Borrow/add.php";
                exit();
            }
            if (!array_key_exists($value, $_POST)) {
                $_SESSION['error'] = 'Veuillez remplir tous les champs ! ';
                include __DIR__ . "/../Vues/Borrow/add.php";
                exit();
            }
        }
            $em = Em::getEntityManager();
            $repoUser = new EntityRepository($em, new ClassMetadata("App\Entity\User"));
            $user = $repoUser->find($_POST['user']);
            $repoLivre = new EntityRepository($em, new ClassMetadata("App\Entity\Livre"));
            $livre = $repoLivre->find($_POST['livre']);
            
        $aBorrow = new Borrow($user, $livre);

        $em->persist($aBorrow);

        $em->flush();
        
        include __DIR__ . "/../Vues/Borrow/add.php";
    }

    public function modify(string $id)
    {
        $em = Em::getEntityManager();
        $Repository = new EntityRepository($em, new ClassMetadata("App\Entity\Borrow"));
        $RepoLivre = new EntityRepository($em, new ClassMetadata("App\Entity\Livre"));
        $RepoUser = new EntityRepository($em, new ClassMetadata("App\Entity\User"));

        $borrowId = $Repository->find($id);
 

        if (!empty($_POST)) {
            foreach (self::REQUIRES as $value) {
                // var_dump("je suis la "); die;
                $exist = array_key_exists($value, $_POST);
                if ($exist === false) {
                    echo "Erreur";
                    include __DIR__ . "/../Vues/Borrow/modify.php";
                    exit;
                }
                $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));
                
                if ($_POST[$value] === "") {
                    echo "champs $value vide";
                    include __DIR__ . "/../Vues/Borrow/modify.php";
                    die();

                }
            }
            

            if ($_POST["user"] !== $userId->getVisitor()->getId()) {
                $oUser = $repoUser->find($_POST["user"]);
                $userId->setVisitor($oUser);
            }
            if ($_POST["livre"] !== $userId->getLivre()->getId()) {
                $oLivre = $repoLivre->find($_POST["livre"]);
                $borrowIs->setLivre($oLivre);
            }     
                  
            $em->persist($borrowId);
            $em->flush();
        }
        
        include __DIR__ . "/../Vues/Borrow/modify.php";

    }

    public function delete(string $id)
    {
        $em = Em::getEntityManager();
        $Repo = new EntityRepository($em, new ClassMetadata("App\Entity\Borrow"));

        $borrowD = $Repo->find($id);

        $em->remove($borrowD);
        $em->flush();

    }
}