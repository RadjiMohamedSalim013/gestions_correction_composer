<?php include __DIR__ . '/../templates/header.php'; ?>

<main class="container my-4">
    <h1 class="mb-4">Modifier l’établissement</h1>

    <form method="post" action="?action=update&id=<?= htmlspecialchars($etab->getId()) ?>">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" id="nom" name="nom" class="form-control" value="<?= htmlspecialchars($etab->getNom()) ?>" required>
        </div>

        <div class="mb-3">
            <label for="ville" class="form-label">Ville :</label>
            <input type="text" id="ville" name="ville" class="form-control" value="<?= htmlspecialchars($etab->getVille()) ?>">
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
        <a href="/?action=index" class="btn btn-secondary ms-2">Annuler</a>
    </form>
</main>

<?php include __DIR__ . '/../templates/footer.php'; ?>
