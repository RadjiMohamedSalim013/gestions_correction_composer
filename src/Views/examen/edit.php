<?php include __DIR__ . '/../templates/header.php'; ?>

<main class="container my-4">
    <h1 class="mb-4">Modifier l'examen</h1>

    <form method="post" action="?action=examen_update&id=<?= htmlspecialchars($examen->getId()) ?>">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" id="nom" name="nom" class="form-control" value="<?= htmlspecialchars($examen->getNom()) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
        <a href="/?action=examen_index" class="btn btn-secondary ms-2">Annuler</a>
    </form>
</main>

<?php include __DIR__ . '/../templates/footer.php'; ?>
