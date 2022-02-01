<?php

namespace App\Controller;

session_start();

use App\Entity\User;
use App\Helpers\EntityManagerHelper as Em;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class UserController
{
    
    const REQUIRES = [
        "firstname",
        "mail"
    ];

    public function showAll()
    {
        $em = Em::getEntityManager();
        $repository = new EntityRepository($em, new ClassMetadata("App\Entity\User"));

        $aUser =$repository->findAll();
    }

    public function add()
    {
           
        foreach (self::REQUIRES as $value) {

            $_POST[$value] = htmlentities(strip_tags(trim($_POST[$value])));
            if ($_POST[$value] === '') {
                $_SESSION['error'] = 'Veuillez remplir tous les champs ! ';
                include __DIR__ . "/../Vues/User/add.php";
                exit();
            }
            if (!array_key_exists($value, $_POST)) {
                $_SESSION['error'] = 'Veuillez remplir tous les champs ! ';
                include __DIR__ . "/../Vues/User/add.php";
                exit();
            }
        }
            $em = Em::getEntityManager();

            
        $aUser = new User($_POST['firstname'],$_POST['mail']);

        $em->persist($aUser);

        $em->flush();
        
        include __DIR__ . "/../Vues/User/add.php";
    }

    public function modify(string $id)
    {
        $em = Em::getEntityManager();
        $Repository = new EntityRepository($em, new ClassMetadata("App\Entity\User"));

        $userId = $Repository->find($id);
 

        if (!empty($_POST)) {
            foreach (self::REQUIRES as $value) {
                // var_dump("je suis la "); die;
                $exist = array_key_exists($value, $_POST);
                if ($exist === false) {
                    echo "Erreur";
                    include __DIR__ . "/../Vues/User/modify.php";
                    exit;
                }
                $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));
                
                if ($_POST[$value] === "") {
                    echo "champs $value vide";
                    include __DIR__ . "/../Vues/User/modify.php";
                    die();

                }
            }
            

            if ($_POST["firstname"] !== $userId->getFirstname()) {
                $userId->setFirstname($_POST["firstname"]);
            }
            if ($_POST["mail"] !== $userId->getMail()) {
                $userId->setMail($_POST["mail"]);
            }     
                  
            $em->persist($userId);
            $em->flush();
        }
        
        include __DIR__ . "/../Vues/User/modify.php";

    }

    public function delete(string $id)
    {
        $em = Em::getEntityManager();
        $Repo = new EntityRepository($em, new ClassMetadata("App\Entity\User"));

        $userD = $Repo->find($id);

        $em->remove($userD);
        $em->flush();

    }
}