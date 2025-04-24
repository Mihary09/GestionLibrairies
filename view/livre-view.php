<?php require_once '../library/App/livre.php' ; ?>

<?php if (isset($_SESSION['validate'])) : ?>
    <div class="alert alert-success mt-5"> <?= $_SESSION['validate'] ; unset($_SESSION['validate']) ?> </div>
<?php endif ?>


<h2 class="mt-4">Ajouter un nouveau livre</h2>
<form action="#" class="bg-light p-5 rounded mt-3" method="post">
    <div class="mb-3 row">
        <label for="title" class="col-md-2 col-form-label">Titre du livre:</label>
        <div class="col-md-10">
            <input type="text" class="form-control" placeholder="Titre du livre" id="title" name="title"
            value="<?= isset($_POST['title']) ? $_POST['title'] : '' ?>">
            <div class="small text-danger"> <?= isset($msg['title']) ? $msg['title'] : '' ?> </div>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="auteur" class="col-md-2 col-form-label">Auteur du livre:</label>
        <div class="col-md-10">
            <input type="text" class="form-control" id="auteur" placeholder="Auteur du livre" name="auteur"
            value="<?= isset($_POST['auteur']) ? $_POST['auteur'] : '' ?>">
            <div class="small text-danger"> <?= isset($msg['auteur']) ? $msg['auteur'] : '' ?> </div>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="sel1" class="col-md-2 col-form-label">Catégorie du livre:</label>
        <div class="col-md-10">
            <select class="form-select" id="sel1" name="category_id">

                <?php if ($_POST['category_id']) : ?>
                    <option value="<?= $_POST['category_id'] ?>"><?= $_POST['category_id'] ?></option>
                <?php endif ?>

                <option value="">---</option>
                
                <?php foreach ($categories as $categorie) : ?>
                    <option value="<?= $categorie['id_categorie'] ?>"><?= $categorie['titre'] ?></option>
                <?php endforeach ?>
                
            </select>
            <div class="small text-danger"> <?= isset($msg['catégorie']) ? $msg['catégorie'] : '' ?> </div>
        </div>
    </div> 

    <div class="mb-3 row">
        <label class="col-md-2 col-form-label"></label>
        <div class="col-md-10">
            <button class="btn btn-primary mt-3 w-100" name="addNewBook">Ajouter</button>
        </div>
    </div>
    
</form>



<h2 class="mt-4">Tous les livres : </h2>
<input type="search" placeholder="Rechercher votre livre ..." class="form-control form-control-sm w-25 my-3 ms-auto">
<table class="table table-bordered text-center">
    <thead class="table-dark">
      <tr>
        <th>N°</th>
        <th>Titre du livre</th>
        <th>Auteur</th>
        <th>Catégories</th>
        <th>Edition</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($datas as $data) : ?>
        <tr>
            <td> <?= $data['idLivre'] ; ?> </td>
            <td> <?= $data['titre'] ; ?> </td>
            <td> <?= $data['auteur'] ; ?> </td>
            <td> <?= $data['titreCat'] ; ?> </td>
            <td> <?= $data['edition'] ; ?> </td>
            <td>
                <a href="<?= BASE_URL . '/index.php?p=editLivre&id=' . $data['idLivre'] ?>" class="btn btn-sm btn-success text-light small">Edit</a>
                <a href="<?= isset($page) ? BASE_URL . '/index.php?p=' . $page . '&amp;sup=' . $data 
                ['idLivre'] : BASE_URL . '/index.php?sup=' . $data['idLivre'] ?>" class="btn btn-sm 
                btn-danger text-light small">Sup</a>
            </td>
        </tr>
        <?php endforeach ?>

    </tbody>
  </table>