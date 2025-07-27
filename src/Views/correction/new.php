<?php include __DIR__ . '/../templates/header.php'; ?>

<main class="container my-4">
    <h1 class="mb-4">Ajouter une correction</h1>

    <form method="post" action="?action=correction_store">
        <div class="mb-3">
            <label for="id_professeur" class="form-label">Professeur :</label>
            <select name="id_professeur" id="id_professeur" class="form-select" required>
                <option value="">-- Sélectionnez un professeur --</option>
                <?php foreach ($professeurs as $professeur): ?>
                    <option value="<?= htmlspecialchars($professeur->getId()) ?>"><?= htmlspecialchars($professeur->getNom()) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_epreuve" class="form-label">Épreuve :</label>
            <select name="id_epreuve" id="id_epreuve" class="form-select" required>
                <option value="">-- Sélectionnez une épreuve --</option>
                <?php foreach ($epreuves as $epreuve): ?>
                    <option value="<?= htmlspecialchars($epreuve->getId()) ?>"><?= htmlspecialchars($epreuve->getNom()) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date :</label>
            <input type="date" id="date" name="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nbr_copie" class="form-label">Nombre de copies :</label>
            <input type="number" id="nbr_copie" name="nbr_copie" min="0" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="/?action=correction_index" class="btn btn-secondary ms-2">Annuler</a>
    </form>
</main>

<?php include __DIR__ . '/../templates/footer.php'; ?>
