<?php include __DIR__ . '/../templates/header.php'; ?>

<main class="container my-4">
    <h1 class="mb-4">Liste des corrections</h1>
    <nav class="mb-3">
        <a href="/" class="btn btn-secondary btn-sm me-2">Accueil</a>
        <a href="/?action=correction_new" class="btn btn-primary btn-sm">Ajouter une nouvelle correction</a>
    </nav>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Professeur</th>
                    <th>Épreuve</th>
                    <th>Date</th>
                    <th>Nombre de copies</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($corrections)): ?>
                    <?php foreach ($corrections as $correction): ?>
                        <tr>
                            <td><?= htmlspecialchars($correction->getId()) ?></td>
                            <td>
                                <?php
                                $professeur = null;
                                foreach ($professeurs as $prof) {
                                    if ($prof->getId() === $correction->getIdProfesseur()) {
                                        $professeur = $prof;
                                        break;
                                    }
                                }
                                echo $professeur ? htmlspecialchars($professeur->getNom()) : 'N/A';
                                ?>
                            </td>
                            <td>
                                <?php
                                $epreuve = null;
                                foreach ($epreuves as $ep) {
                                    if ($ep->getId() === $correction->getIdEpreuve()) {
                                        $epreuve = $ep;
                                        break;
                                    }
                                }
                                echo $epreuve ? htmlspecialchars($epreuve->getNom()) : 'N/A';
                                ?>
                            </td>
                            <td><?= htmlspecialchars($correction->getDate()) ?></td>
                            <td><?= htmlspecialchars($correction->getNbrCopie()) ?></td>
                            <td>
                                <a href="/?action=correction_edit&id=<?= urlencode($correction->getId()) ?>" class="btn btn-sm btn-warning me-1">Modifier</a>
                                <a href="/?action=correction_delete&id=<?= urlencode($correction->getId()) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Aucune correction trouvée.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include __DIR__ . '/../templates/footer.php'; ?>
