<?php include __DIR__ . '/../templates/header.php'; ?>

<main class="container my-4">
    <h1 class="mb-4">Liste des épreuves</h1>
    <nav class="mb-3">
        <a href="/" class="btn btn-secondary btn-sm me-2">Accueil</a>
        <a href="/?action=epreuve_new" class="btn btn-primary btn-sm">Ajouter une nouvelle épreuve</a>
    </nav>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Examen</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($epreuves)): ?>
                    <?php foreach ($epreuves as $epreuve): ?>
                        <tr>
                            <td><?= htmlspecialchars($epreuve->getId()) ?></td>
                            <td><?= htmlspecialchars($epreuve->getNom()) ?></td>
                            <td><?= htmlspecialchars($epreuve->getType()) ?></td>
                            <td>
                                <?php
                                $examen = null;
                                foreach ($examens as $ex) {
                                    if ($ex->getId() === $epreuve->getIdExamen()) {
                                        $examen = $ex;
                                        break;
                                    }
                                }
                                echo $examen ? htmlspecialchars($examen->getNom()) : 'N/A';
                                ?>
                            </td>
                            <td>
                                <a href="/?action=epreuve_edit&id=<?= urlencode($epreuve->getId()) ?>" class="btn btn-sm btn-warning me-1">Modifier</a>
                                <a href="/?action=epreuve_delete&id=<?= urlencode($epreuve->getId()) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Aucune épreuve trouvée.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include __DIR__ . '/../templates/footer.php'; ?>
