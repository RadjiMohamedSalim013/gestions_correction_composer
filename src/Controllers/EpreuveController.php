<?php

namespace App\Controllers;

use App\Models\Epreuve;
use App\Models\Examen;
use Config\Database;

class EpreuveController
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())->getConnection();
    }

    // Afficher la liste
    public function index()
    {
        $epreuves = Epreuve::all($this->pdo);
        require __DIR__ . '/../Views/epreuve/index.php';
    }

    // Afficher le formulaire d'ajout
    public function new()
    {
        $examens = Examen::all($this->pdo);
        require __DIR__ . '/../Views/epreuve/new.php';
    }

    // Enregistrer une nouvelle épreuve
    public function store()
    {
        $epreuve = new Epreuve();
        $epreuve->setNom($_POST['nom'] ?? '');
        $epreuve->setType($_POST['type'] ?? '');
        $epreuve->setIdExamen($_POST['id_examen'] ?? null);
        $epreuve->save($this->pdo);

        header('Location: /?action=epreuve_index');
        exit;
    }

    // Afficher le formulaire de modification
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) exit("ID manquant");

        $epreuve = Epreuve::find($this->pdo, $id);
        $examens = Examen::all($this->pdo);
        require __DIR__ . '/../Views/epreuve/edit.php';
    }

    // Mettre à jour l'épreuve
    public function update()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) exit("ID manquant");

        $epreuve = Epreuve::find($this->pdo, $id);
        $epreuve->setNom($_POST['nom'] ?? '');
        $epreuve->setType($_POST['type'] ?? '');
        $epreuve->setIdExamen($_POST['id_examen'] ?? null);
        $epreuve->update($this->pdo);

        header('Location: /?action=epreuve_index');
        exit;
    }

    // Supprimer
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) exit("ID manquant");

        $epreuve = Epreuve::find($this->pdo, $id);
        $epreuve->delete($this->pdo);

        header('Location: /?action=epreuve_index');
        exit;
    }
}
?>
