<?php

namespace App\Controllers;

use App\Models\Examen;
use Config\Database;

class ExamenController
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())->getConnection();
    }

    // Afficher la liste
    public function index()
    {
        $examens = Examen::all($this->pdo);
        require __DIR__ . '/../Views/examen/index.php';
    }

    // Afficher le formulaire d'ajout
    public function new()
    {
        require __DIR__ . '/../Views/examen/new.php';
    }

    // Enregistrer un nouvel examen
    public function store()
    {
        $examen = new Examen();
        $examen->setNom($_POST['nom'] ?? '');
        $examen->save($this->pdo);

        header('Location: /?action=examen_index');
        exit;
    }

    // Afficher le formulaire de modification
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) exit("ID manquant");

        $examen = Examen::find($this->pdo, $id);
        require __DIR__ . '/../Views/examen/edit.php';
    }

    // Mettre à jour l'examen
    public function update()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) exit("ID manquant");

        $examen = Examen::find($this->pdo, $id);
        $examen->setNom($_POST['nom'] ?? '');
        $examen->update($this->pdo);

        header('Location: /?action=examen_index');
        exit;
    }

    // Supprimer
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) exit("ID manquant");

        $examen = Examen::find($this->pdo, $id);
        $examen->delete($this->pdo);

        header('Location: /?action=examen_index');
        exit;
    }
}
?>
