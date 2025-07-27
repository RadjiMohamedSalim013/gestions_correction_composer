<?php

namespace App\Controllers;

use App\Models\Correction;
use App\Models\Professeur;
use App\Models\Epreuve;
use Config\Database;

class CorrectionController
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())->getConnection();
    }

    // Afficher la liste
    public function index()
    {
        $corrections = Correction::all($this->pdo);
        $professeurs = Professeur::all($this->pdo);
        $epreuves = Epreuve::all($this->pdo);
        require __DIR__ . '/../Views/correction/index.php';
    }

    // Afficher le formulaire d'ajout
    public function new()
    {
        $professeurs = Professeur::all($this->pdo);
        $epreuves = Epreuve::all($this->pdo);
        require __DIR__ . '/../Views/correction/new.php';
    }

    // Enregistrer une nouvelle correction
    public function store()
    {
        $correction = new Correction();
        $correction->setIdProfesseur($_POST['id_professeur'] ?? null);
        $correction->setIdEpreuve($_POST['id_epreuve'] ?? null);
        $correction->setDate($_POST['date'] ?? null);
        $correction->setNbrCopie($_POST['nbr_copie'] ?? null);
        $correction->save($this->pdo);

        header('Location: /?action=correction_index');
        exit;
    }

    // Afficher le formulaire de modification
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) exit("ID manquant");

        $correction = Correction::find($this->pdo, $id);
        $professeurs = Professeur::all($this->pdo);
        $epreuves = Epreuve::all($this->pdo);
        require __DIR__ . '/../Views/correction/edit.php';
    }

    // Mettre à jour la correction
    public function update()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) exit("ID manquant");

        $correction = Correction::find($this->pdo, $id);
        $correction->setIdProfesseur($_POST['id_professeur'] ?? null);
        $correction->setIdEpreuve($_POST['id_epreuve'] ?? null);
        $correction->setDate($_POST['date'] ?? null);
        $correction->setNbrCopie($_POST['nbr_copie'] ?? null);
        $correction->update($this->pdo);

        header('Location: /?action=correction_index');
        exit;
    }

    // Supprimer
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) exit("ID manquant");

        $correction = Correction::find($this->pdo, $id);
        $correction->delete($this->pdo);

        header('Location: /?action=correction_index');
        exit;
    }
}
?>
