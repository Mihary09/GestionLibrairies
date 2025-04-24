<?php
require_once '../library/App/livre.php'; // Assure l'accès à la connexion PDO

if (isset($_GET['id'])) {
    $id = htmlspecialchars(trim($_GET['id']));

    // Récupérer les données du livre
    $req = $pdo->prepare("SELECT * FROM livres WHERE idLivre = ?");
    $req->execute([$id]);
    $livre = $req->fetch(PDO::FETCH_ASSOC);

    if (!$livre) {
        echo "Livre introuvable.";
        exit;
    }
}
?>
<h2 class="mt-4">Modifier le livre</h2>
<form action="#" method="post" class="bg-light p-5 rounded mt-3">
    <input type="hidden" name="idLivre" value="<?= $livre['idLivre'] ?>">

    <div class="mb-3">
        <label for="title" class="form-label">Titre du livre</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $livre['Titre'] ?>">
    </div>

    <div class="mb-3">
        <label for="auteur" class="form-label">Auteur</label>
        <input type="text" class="form-control" id="auteur" name="auteur" value="<?= $livre['auteur'] ?>">
    </div>

    <div class="mb-3">
        <label for="categorie_id" class="form-label">Catégorie</label>
        <select class="form-select" name="categorie_id">
            <?php foreach ($categories as $categorie) : ?>
                <option value="<?= $categorie['id_categorie'] ?>" <?= $livre['categorie_id'] == $categorie['id_categorie'] ? 'selected' : '' ?>>
                    <?= $categorie['titre'] ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>

    <button type="submit" name="updateBook" class="btn btn-primary">Mettre à jour</button>
</form>
