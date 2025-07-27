<?php

namespace App\Controllers;

use App\Models\Professeur;
use Config\Database;

class ProfesseurController
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())->getConnection();
    }

    // Afficher la liste
    public function index()
    {
        $professeurs = Professeur::all($this->pdo);
        require __DIR__ . '/../Views/professeur/index.php';
    }

    // Afficher le formulaire d'ajout
    public function new()
    {
        $etablissements = \App\Models\Etablissement::all($this->pdo);
        require __DIR__ . '/../Views/professeur/new.php';
    }

    // Enregistrer un nouveau professeur
    public function store()
    {
        $prof = new Professeur();
        $prof->setNom($_POST['nom'] ?? '');
        $prof->setPrenom($_POST['prenom'] ?? '');
        $prof->setGrade($_POST['grade'] ?? '');
        $prof->setIdEtab($_POST['id_etab'] ?? null);
        $prof->save($this->pdo);

        header('Location: /?action=professeur_index');
        exit;
    }

    // Afficher le formulaire de modification
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) exit("ID manquant");

        $prof = Professeur::find($this->pdo, $id);
        $etablissements = \App\Models\Etablissement::all($this->pdo);
        require __DIR__ . '/../Views/professeur/edit.php';
    }

    // Mettre à jour le professeur
    public function update()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) exit("ID manquant");

        $prof = Professeur::find($this->pdo, $id);
        $prof->setNom($_POST['nom'] ?? '');
        $prof->setPrenom($_POST['prenom'] ?? '');
        $prof->setGrade($_POST['grade'] ?? '');
        $prof->setIdEtab($_POST['id_etab'] ?? null);
        $prof->update($this->pdo);

        header('Location: /?action=professeur_index');
        exit;
    }

    // Supprimer
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) exit("ID manquant");

        $prof = Professeur::find($this->pdo, $id);
        $prof->delete($this->pdo);

        header('Location: /?action=professeur_index');
        exit;
    }
}
?>
