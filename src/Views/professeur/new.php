<?php include __DIR__ . '/../templates/header.php'; ?>

<main class="container my-4">
    <h1 class="mb-4">Ajouter un professeur</h1>

    <form method="post" action="?action=professeur_store">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" id="nom" name="nom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom :</label>
            <input type="text" id="prenom" name="prenom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="grade" class="form-label">Grade :</label>
            <input type="text" id="grade" name="grade" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="id_etab" class="form-label">Établissement :</label>
            <select id="id_etab" name="id_etab" class="form-select" required>
                <option value="">-- Sélectionnez un établissement --</option>
                <?php foreach ($etablissements as $etab): ?>
                    <option value="<?= htmlspecialchars($etab->getId()) ?>"><?= htmlspecialchars($etab->getNom()) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="/?action=professeur_index" class="btn btn-secondary ms-2">Annuler</a>
    </form>
</main>

<?php include __DIR__ . '/../templates/footer.php'; ?>
