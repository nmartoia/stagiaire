<?php
namespace Stagiaire\Models;

/** Class Todo **/
class Formateur{

    private $ID_NATION;
    private $LIBELLE_NATION;
    private $ID_FORM;
    private $date;
    private $LIBELLE_FORM;
    private $formateurTab = [];
    private $ID_FORMATEUR;
    private $PRENOM_FORMATEUR;
    private $NOM_FORMATEUR;
    private $LIBELLE;
    private $IdDuFormateur;
    private $lastid;
    private $PRENOM;
    private $NOM;
    private $persone;
    private $NOMFORM;
    private $DATE_DEBUT;
    private $DATE_FIN;
    private $salle;


    public function getIdNat() {
        return $this->ID_NATION;
    }

    public function getNat() {
        return $this->LIBELLE_NATION;
    }
    public function getIdForm() {
        return $this->ID_FORM;
    }
    public function getForm() {
        return $this->LIBELLE_FORM;
    }
    public function getIdFormateur() {
        return $this->ID_FORMATEUR;
    }
    public function getPrenomFormateur() {
        return $this->PRENOM_FORMATEUR;
    }
    public function getNomFormateur() {
        return $this->NOM_FORMATEUR;
    }
    public function getLibelle() {
        return $this->LIBELLE;
    }
    public function getIdDuFormateur() {
        return $this->IdDuFormateur;
    }
    public function getPersone() {
        return $this->persone;
    }
    public function getDate() {
        $date = date_create($this->date);
        return date_format($date, 'd-m-Y');
        //donne la date française si on veux la date americain suprimer le code si dessus et remplacer le par return $this->$date;
    }
    public function getPrenom() {
        return $this->PRENOM;
    }
    public function getNom() {
        return $this->NOM;
    }
    public function getlastid() {
        return $this->lastid;
    }


    public function getNOMFORM() {
        return $this->NOMFORM;
    }

    public function getDateDeb() {
        $date = date_create($this->DATE_DEBUT);
        return date_format($date, 'd/m/Y');
        //donne la date française si on veux la date americain suprimer le code si dessus et remplacer le par return $this->$date;
    }
    public function getDateDebUS() {
        $date = date_create($this->DATE_DEBUT);
        return date_format($date, 'Y-m-d');;
    }
    public function getDateFin() {
        $date = date_create($this->DATE_FIN);
        return date_format($date, 'd/m/Y');
        //donne la date française si on veux la date americain suprimer le code si dessus et remplacer le par return $this->$date;
    }
    public function getDateFinUS() {
        $date = date_create($this->DATE_FIN);
        return date_format($date, 'Y-m-d');
    }
    public function getSalle() {
        return $this->salle;
    }

    public function setNomForm(String $NOMFORM) {
        $this->NOMFORM = $NOMFORM;
    }
    public function setDateDeb(String $DATE_DEBUT) {
        $this->DATE_DEBUT = $DATE_DEBUT;
    }
    public function setDateFin(String $DATE_FIN) {
        $this->DATE_FIN = $DATE_FIN;
    }
    public function setSalle(String $salle) {
        $this->salle = $salle;
    }
    public function setIdNat(Int $ID_NATION) {
        $this->ID_NATION = $ID_NATION;
    }

    public function setNat(String $LIBELLE_NATION) {
        $this->LIBELLE_NATION = $LIBELLE_NATION;
    }
    public function setIdForm(String $ID_FORM) {
        $this->ID_FORM = $ID_FORM;
    }
    public function setForm(String $LIBELLE_FORM) {
        $this->LIBELLE_FORM = $LIBELLE_FORM;
    }
    public function setDate(String $date) {
        $this->date = $date;
    }
    public function setIdFormateur(String $ID_FORMATEUR) {
        $this->ID_FORMATEUR = $ID_FORMATEUR;
    }
    public function setPrenomFormateur(String $PRENOM_FORMATEUR) {
        $this->PRENOM_FORMATEUR = $PRENOM_FORMATEUR;
    }
    public function setNomFormateur(String $NOM_FORMATEUR) {
        $this->NOM_FORMATEUR = $NOM_FORMATEUR;
    }
    public function setLibelle(String $LIBELLE) {
        $this->LIBELLE = $LIBELLE;
    }
    public function setIdDuFormateur(String $IdDuFormateur) {
        $this->IdDuFormateur = $IdDuFormateur;
    }
    public function setlastid(String $lastid) {
        $this->lastid = $lastid;
    }
    public function setPrenom(String $PRENOM) {
        $this->LIBELLE = $PRENOM;
    }
    public function setNom(String $NOM) {
        $this->NOM = $NOM;
    }
    public function setPersone(String $persone) {
        $this->persone = $persone;
    }
    public function formateur()
    {
        $manager = new FormateurManager();
        if (!$this->formateurTab) {
            $this->formateurTab = $manager->getAllFormateur2($this->getIdFormateur());
        }

        return $this->formateurTab;
    }
    public function getAll()
    {
        $manager = new FormateurManager();
        if (!$this->formateurTab) {
            $this->formateurTab = $manager->getAll();
        }

        return $this->formateurTab;
    }
    public function allForm()
    {
        $manager = new FormateurManager();
        if (!$this->formateurTab) {
            $this->formateurTab = $manager->allForm($this->getPersone());
        }

        return $this->formateurTab;
    }
}
