<?php include __DIR__ . '/../templates/header.php'; ?>

<main class="container my-4">
    <h1 class="mb-4">Liste des examens</h1>
    <nav class="mb-3">
        <a href="/" class="btn btn-secondary btn-sm me-2">Accueil</a>
        <a href="/?action=examen_new" class="btn btn-primary btn-sm">Ajouter un nouvel examen</a>
    </nav>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($examens)): ?>
                    <?php foreach ($examens as $examen): ?>
                        <tr>
                            <td><?= htmlspecialchars($examen->getId()) ?></td>
                            <td><?= htmlspecialchars($examen->getNom()) ?></td>
                            <td>
                                <a href="/?action=examen_edit&id=<?= urlencode($examen->getId()) ?>" class="btn btn-sm btn-warning me-1">Modifier</a>
                                <a href="/?action=examen_delete&id=<?= urlencode($examen->getId()) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">Aucun examen trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include __DIR__ . '/../templates/footer.php'; ?>
