<?php include __DIR__ . '/../templates/header.php'; ?>

<main class="container my-4">
    <h1 class="mb-4">Liste des établissements</h1>
    <nav class="mb-3">
        <a href="/" class="btn btn-secondary btn-sm me-2">Accueil</a>
        <a href="/?action=new" class="btn btn-primary btn-sm">Ajouter un nouvel établissement</a>
    </nav>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Ville</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($etablissements)): ?>
                    <?php foreach ($etablissements as $etab): ?>
                        <tr>
                            <td><?= htmlspecialchars($etab->getId()) ?></td>
                            <td><?= htmlspecialchars($etab->getNom()) ?></td>
                            <td><?= htmlspecialchars($etab->getVille()) ?></td>
                            <td>
                                <a href="/?action=edit&id=<?= urlencode($etab->getId()) ?>" class="btn btn-sm btn-warning me-1">Modifier</a>
                                <a href="/?action=delete&id=<?= urlencode($etab->getId()) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Aucun établissement trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include __DIR__ . '/../templates/footer.php'; ?>
