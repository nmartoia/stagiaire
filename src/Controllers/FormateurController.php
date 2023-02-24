<?php

namespace Stagiaire\Controllers;

use Stagiaire\Models\FormateurManager;
use Stagiaire\Validator;

/** Class UserController **/
class FormateurController
{
    private $manager;
    private $validator;

    public function __construct()
    {
        $this->manager = new FormateurManager();
        $this->validator = new Validator();
    }

    public function index()
    {
        require VIEWS . 'Todo/homepage.php';
    }

    public function create()
    {
        $nat = $this->manager->getAllNat();
        $formation = $this->manager->getAllForm();
        $formateur = $this->manager->getAllFormateur();
        $formateur2 = $this->manager;
        require VIEWS . 'Todo/create.php';
    }

    public function store()
    {
        $_SESSION['old'] = $_POST;
        if (htmlspecialchars($_POST['name']) != $_POST['name'] || htmlspecialchars($_POST['prenom']) != $_POST['prenom']) {
            $_SESSION["error"]['name'] = "caracter speciaux";
        } else if ($_POST['name'] == '' || $_POST['prenom'] == '') {
            $_SESSION["error"]['name'] = "le nom ou le prenom est vide";
        } else if (strlen($_POST['name']) > 20 || strlen($_POST['prenom']) > 20) {
            $_SESSION["error"]['name'] = "le nom ou le prenom est trop long (20 max)";
        } else if (!isset($_POST["formateurs"])) {
            $_SESSION["error"]['name'] = "aucun formateur selectionner";
        } else if ($_POST["datedeb"] > $_POST["datefin"]) {
            $_SESSION["error"]['name'] = "la date de debut et apres celle de fin";
        } else {
            $this->manager->store();
            $lastId = $this->manager->lastid();
            for ($i = 0; $i < sizeof($_POST["formateurs"]); $i++) {
                $date = date_create($_POST['datedeb'][$i]);
                $date1 = date_create($_POST['datefin'][$i]);
                
                $this->manager->storeformation($date, $date1, $lastId[0]->getlastid(),$_POST['formateurs'][$i]);
            }
        }
        header("Location:/dashboard/nouveau");
    }
    public function update($slug)
    {
        $dateinf = 0;
        if (!isset($_POST['formateurs'])) {
            //si aucun formateurs est cocher on a une erreur
            $_SESSION["error"]['name'] = "aucun formateur choisi";
            header("Location: /dashboard/".$slug);
        } else{
            $formateurs_tb = $_POST['formateurs'];
            for ($j = 0; $j < sizeof($formateurs_tb); $j++) {
                if ($_POST['datedeb'] > $_POST['datefin']) {
                    $dateinf++;
                    //si des date de fin et plus avent le debut le compteur augment
                }
            }
            if($dateinf>0){
                //si le compteur et plus grand que 0 on a une erreur
                $_SESSION["error"]['name'] = "une date de debut et apres la date de fin";
                header("Location: /dashboard/".$slug);
            }
            else if (htmlspecialchars($_POST['nom']) != $_POST['nom'] || htmlspecialchars($_POST['prenom']) != $_POST['prenom']) {
                //si ya des caracteur speciaux on a une erreur
                $_SESSION["error"]['name'] = "caracter speciaux dans le nom ou prenom";
                header("Location: /dashboard/".$slug);
            } else if ($_POST['nom']== '' || $_POST['prenom'] == '') {
                //si un des champ est vide on a une erreur
                $_SESSION["error"]['name'] = "nom ou prenom vide";
                header("Location: /dashboard/".$slug);
            } else if (strlen($_POST['nom']) > 20 || strlen($_POST['prenom']) > 20) {
                //si un des champ a une taille plus grand que 20 on a une erreur
                $_SESSION["error"]['name'] = "nom ou prenom plus grand que 20";
                header("Location: /dashboard/".$slug);
            }else {
                $this->manager->update($slug);
                $this->manager->deleteupdate($slug);
               
                for ($j = 0; $j < sizeof($formateurs_tb); $j++) {
                    $date = date_create($_POST['datedeb'][$j]);
                    $date1 = date_create($_POST['datefin'][$j]);
                    $this->manager->insertupdate($slug,$formateurs_tb[$j],date_format($date, 'Y-m-d'),date_format($date1, 'Y-m-d'));
                }
                //si tous va bien message pour dire que la modif a bien eter fais
                header("Location:/dashboard/");
            }
        }
    }

    public function delete($slug)
    {

        $this->manager->delete($slug);
        header("Location: /dashboard");
    }


    public function show($slug)
    {
        $nat = $this->manager->getAllNat();
        $formation = $this->manager->getAllForm();
        $formateur = $this->manager->getAllFormateur();
        $formateur2 = $this->manager;
        $todo = $this->manager->find($slug);
        if (!$todo) {
            header("Location: /error");
        }
        require VIEWS . 'Todo/show.php';
    }
    public function showAll()
    {
        $formateurTab = $this->manager->getAll();
        if (!$formateurTab) {
            header("Location: /error");
        }
        require VIEWS . 'Todo/index.php';
    }
}
