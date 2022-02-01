<?php

namespace App\Controller;

session_start();

use App\Entity\Note;
use App\Helpers\EntityManagerHelper as Em;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class NoteController
{
    const REQUIRES = ['note', 'comment', 'editeur_id', 'livre_id'];

    public function showAll()
    {
        $em = Em::getEntityManager();
        $repository = new EntityRepository(
            $em,
            new ClassMetadata('App\Entity\Note')
        );

        $aNote = $repository->findAll();
    }

    public function add()
    {
        foreach (self::REQUIRES as $value) {
            $_POST[$value] = htmlentities(strip_tags(trim($_POST[$value])));
            if ($_POST[$value] === '') {
                echo 'Veuillez remplir tous les champs ! ';
                include __DIR__ . '/../Vues/Note/add.php';
                exit();
            }
            if (!array_key_exists($value, $_POST)) {
                $_SESSION['error'] = 'Veuillez remplir tous les champs ! ';
                include __DIR__ . '/../Vues/Note/add.php';
                exit();
            }
        }
        $em = Em::getEntityManager();
        $RepoLivre = new EntityRepository($em,new ClassMetadata('App\Entity\Livre'));
        $RepoUser = new EntityRepository($em,new ClassMetadata('App\Entity\User'));
        $livre = $RepoLivre->find($_POST['livre_id']);
        $editeur = $RepoUser->find($_POST['editeur_id']);

        if (!$livre) {
            echo "Le livre n'existe pas!!";
            include __DIR__ . "/../Vues/Note/add.php";
            exit;
        }   
        if (!$editeur) {
            echo "L'editeur n'existe pas!!";
            include __DIR__ . "/../Vues/Note/add.php";
            exit;
        }   

        $aNote = new Note($_POST['note'], $_POST['comment'], $editeur, $livre);

        $em->persist($aNote);

        $em->flush();

        include __DIR__ . '/../Vues/Note/add.php';
    }

    public function modify(string $id)
    {
        $em = Em::getEntityManager();
        $Repository = new EntityRepository($em,new ClassMetadata('App\Entity\Note'));
        $RepoLivre = new EntityRepository($em,new ClassMetadata('App\Entity\Livre'));
        $RepoUser = new EntityRepository($em,new ClassMetadata('App\Entity\User'));

        $noteId = $Repository->find($id);

        if (!empty($_POST)) {
            foreach (self::REQUIRES as $value) {
                // var_dump("je suis la "); die;
                $exist = array_key_exists($value, $_POST);
                if ($exist === false) {
                    echo 'Erreur';
                    include __DIR__ . '/../Vues/Note/modify.php';
                    exit();
                }
                $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));

                if ($_POST[$value] === '') {
                    echo "champs $value vide";
                    include __DIR__ . '/../Vues/Note/modify.php';
                    die();
                }
            }

            if ($_POST['note'] !== $noteId->getNote()) {
                $noteId->setNote($_POST['note']);
            }
            if ($_POST['comment'] !== $noteId->getComment()) {
                $noteId->setComment($_POST['comment']);
// var_dump($_POST['comment']);
// die('---END---');                

            }
            if ($_POST['editeur_id'] !== $noteId->getEditeur()->getId()) {
                $oEditeur = $RepoUser->find($_POST['editeur_id']);
                $noteId->setComment($oEditeur);
            }
            if ($_POST['livre'] !== $noteId->getLivre()->getId()) {
                $oLivre = $RepoLivre->find($_POST['livre_id']);
                $noteId->setLivre($oLivre);
            }

            $em->persist($noteId);
            $em->flush();
        }

        include __DIR__ . '/../Vues/Note/modify.php';
    }

    public function delete(string $id)
    {
        $em = Em::getEntityManager();
        $Repo = new EntityRepository($em, new ClassMetadata('App\Entity\Note'));

        $noteD = $Repo->find($id);

        $em->remove($noteD);
        $em->flush();
    }
}
