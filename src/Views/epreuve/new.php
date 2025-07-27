<?php include __DIR__ . '/../templates/header.php'; ?>

<main class="container my-4">
    <h1 class="mb-4">Ajouter une épreuve</h1>

    <form method="post" action="?action=epreuve_store">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" id="nom" name="nom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type :</label>
            <select id="type" name="type" class="form-select" required>
                <option value="">-- Sélectionnez un type --</option>
                <option value="écrit">Écrit</option>
                <option value="oral">Oral</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_examen" class="form-label">Examen :</label>
            <select id="id_examen" name="id_examen" class="form-select" required>
                <option value="">-- Sélectionnez un examen --</option>
                <?php foreach ($examens as $examen): ?>
                    <option value="<?= htmlspecialchars($examen->getId()) ?>"><?= htmlspecialchars($examen->getNom()) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="/?action=epreuve_index" class="btn btn-secondary ms-2">Annuler</a>
    </form>
</main>

<?php include __DIR__ . '/../templates/footer.php'; ?>
