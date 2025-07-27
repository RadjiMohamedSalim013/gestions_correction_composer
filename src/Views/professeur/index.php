<?php include __DIR__ . '/../templates/header.php'; ?>

<main class="container my-4">
    <h1 class="mb-4">Liste des professeurs</h1>
    <nav class="mb-3">
        <a href="/" class="btn btn-secondary btn-sm me-2">Accueil</a>
        <a href="/?action=professeur_new" class="btn btn-primary btn-sm">Ajouter un nouveau professeur</a>
    </nav>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Spécialité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($professeurs)): ?>
                    <?php foreach ($professeurs as $prof): ?>
                        <tr>
                            <td><?= htmlspecialchars($prof->getId()) ?></td>
                            <td><?= htmlspecialchars($prof->getNom()) ?></td>
                            <td><?= htmlspecialchars($prof->getSpecialite()) ?></td>
                            <td>
                                <a href="/?action=professeur_edit&id=<?= urlencode($prof->getId()) ?>" class="btn btn-sm btn-warning me-1">Modifier</a>
                                <a href="/?action=professeur_delete&id=<?= urlencode($prof->getId()) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Aucun professeur trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include __DIR__ . '/../templates/footer.php'; ?>
