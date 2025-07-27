<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\EtablissementController;
use App\Controllers\ProfesseurController;
use App\Controllers\ExamenController;
use App\Controllers\EpreuveController;
use App\Controllers\CorrectionController;

$action = $_GET['action'] ?? null;

if ($action === null) {
    include __DIR__ . '/../src/Views/templates/header.php';
    ?>

    <main class="container my-5">
        <h1 class="mb-4 text-center">Bienvenue sur la page d'accueil</h1>
        <nav class="d-flex flex-wrap justify-content-center gap-4">
            <?php 
            $links = [
                ['url' => '/?action=index', 'label' => 'Liste des établissements'],
                ['url' => '/?action=professeur_index', 'label' => 'Liste des professeurs'],
                ['url' => '/?action=examen_index', 'label' => 'Liste des examens'],
                ['url' => '/?action=epreuve_index', 'label' => 'Liste des épreuves'],
                ['url' => '/?action=correction_index', 'label' => 'Liste des corrections'],
            ];
            foreach ($links as $link): ?>
                <a href="<?= htmlspecialchars($link['url']) ?>" class="card-link p-4 text-center text-decoration-none shadow-sm rounded" style="min-width: 200px; flex: 1 1 200px;">
                    <?= htmlspecialchars($link['label']) ?>
                </a>
            <?php endforeach; ?>
        </nav>
    </main>

    <style>
        .card-link {
            border: 1px solid #ced4da;
            background-color: #fff;
            color: #212529;
            transition: background-color 0.3s ease, box-shadow 0.3s ease, color 0.3s ease;
            font-weight: 600;
            font-size: 1.1rem;
            display: inline-block;
        }
        .card-link:hover, 
        .card-link:focus {
            background-color: #0d6efd; 
            color: #fff;
            border-color: #0d6efd;
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.4);
            text-decoration: none;
            outline: none;
        }
        .card-link:active {
            background-color: #084298; 
            border-color: #084298;
            box-shadow: none;
        }
    </style>

    <?php
    include __DIR__ . '/../src/Views/templates/footer.php';
    exit;
}

// Initialisation des contrôleurs
$controllerEtab = new EtablissementController();
$controllerProf = new ProfesseurController();
$controllerExamen = new ExamenController();
$controllerEpreuve = new EpreuveController();
$controllerCorrection = new CorrectionController();

$routes = [
    // Etablissement
    'new' => [$controllerEtab, 'new'],
    'store' => [$controllerEtab, 'store'],
    'edit' => [$controllerEtab, 'edit'],
    'update' => [$controllerEtab, 'update'],
    'delete' => [$controllerEtab, 'delete'],
    'index' => [$controllerEtab, 'index'],

    // Professeur
    'professeur_index' => [$controllerProf, 'index'],
    'professeur_new' => [$controllerProf, 'new'],
    'professeur_store' => [$controllerProf, 'store'],
    'professeur_edit' => [$controllerProf, 'edit'],
    'professeur_update' => [$controllerProf, 'update'],
    'professeur_delete' => [$controllerProf, 'delete'],

    // Examen
    'examen_index' => [$controllerExamen, 'index'],
    'examen_new' => [$controllerExamen, 'new'],
    'examen_store' => [$controllerExamen, 'store'],
    'examen_edit' => [$controllerExamen, 'edit'],
    'examen_update' => [$controllerExamen, 'update'],
    'examen_delete' => [$controllerExamen, 'delete'],

    // Epreuve
    'epreuve_index' => [$controllerEpreuve, 'index'],
    'epreuve_new' => [$controllerEpreuve, 'new'],
    'epreuve_store' => [$controllerEpreuve, 'store'],
    'epreuve_edit' => [$controllerEpreuve, 'edit'],
    'epreuve_update' => [$controllerEpreuve, 'update'],
    'epreuve_delete' => [$controllerEpreuve, 'delete'],

    // Correction
    'correction_index' => [$controllerCorrection, 'index'],
    'correction_new' => [$controllerCorrection, 'new'],
    'correction_store' => [$controllerCorrection, 'store'],
    'correction_edit' => [$controllerCorrection, 'edit'],
    'correction_update' => [$controllerCorrection, 'update'],
    'correction_delete' => [$controllerCorrection, 'delete'],
];


if (isset($routes[$action])) {
    call_user_func($routes[$action]);
} else {
    http_response_code(404);
    echo "Page non trouvée";
}
