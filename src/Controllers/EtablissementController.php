<?php

namespace App\Controllers;

use App\Models\Etablissement;
use Config\Database;

class EtablissementController
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())->getConnection();
    }

    // Afficher la liste
    public function index()
    {
        $etablissements = Etablissement::all($this->pdo);
        require __DIR__ . '/../Views/etablissement/index.php';
    }

    // Afficher le formulaire d'ajout
    public function new()
    {
        require __DIR__ . '/../Views/etablissement/new.php';
    }

    // Enregistrer un nouvel établissement
    public function store()
    {
        $etab = new Etablissement();
        $etab->setNom($_POST['nom'] ?? '');
        $etab->setVille($_POST['ville'] ?? '');
        $etab->save($this->pdo);

        header('Location: /');
        exit;
    }

    // Afficher le formulaire de modification
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) exit("ID manquant");

        $etab = Etablissement::find($this->pdo, $id);
        require __DIR__ . '/../Views/etablissement/edit.php';
    }

    // Mettre à jour l’établissement
    public function update()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) exit("ID manquant");

        $etab = Etablissement::find($this->pdo, $id);
        $etab->setNom($_POST['nom'] ?? '');
        $etab->setVille($_POST['ville'] ?? '');
        $etab->update($this->pdo);

        header('Location: /');
        exit;
    }

    // Supprimer
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) exit("ID manquant");

        $etab = Etablissement::find($this->pdo, $id);
        $etab->delete($this->pdo);

        header('Location: /');
        exit;
    }
}
