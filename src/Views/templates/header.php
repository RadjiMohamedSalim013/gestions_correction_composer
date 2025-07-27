<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Gestion Étudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            background-color: #fefefe;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1 0 auto;
            padding-top: 70px; 
            padding-bottom: 60px; 
        }
        footer {
            background-color: #f8f9fa;
            padding: 10px;
            text-align: center;
            font-size: 14px;
            position: fixed;
            bottom: 0; left: 0; right: 0;
            height: 40px;
            line-height: 20px;
            border-top: 1px solid #dee2e6;
        }
    .navbar-dark .navbar-nav .nav-link {
        color: #ffffff !important;
        font-weight: 600;
        font-size: 1.05rem;
        text-shadow: 0 0 3px rgba(0, 0, 0, 0.5);
        transition: color 0.3s ease;
    }
    .navbar-dark .navbar-nav .nav-link:hover,
    .navbar-dark .navbar-nav .nav-link:focus {
        color: #cce5ff !important; 
        text-decoration: underline;
    }
    .navbar-brand {
        color: #ffffff !important;
        text-shadow: 0 0 4px rgba(0, 0, 0, 0.6);
    }

    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Gestion Étudiant</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Basculer la navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/?action=index">Établissements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/?action=professeur_index">Professeurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/?action=examen_index">Examens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/?action=epreuve_index">Épreuves</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/?action=correction_index">Corrections</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>

