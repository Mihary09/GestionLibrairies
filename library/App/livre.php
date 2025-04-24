<?php

//* Connexion BDD
$dsn = "mysql:host=localhost;dbname=librairies";
$user = "root";
$password = "";

//* Gestion des erreurs : try .. catch

try {

    $pdo = new PDO ($dsn, $user, $password);
}

catch(PDOException $msg ) {
    echo "<b style='color:red; '> Erreur de connexion au base de données : </b> " . $msg->getMessage();
 //   var_dump($title, $auteur, $category_id);
    die();
}

// select category
$req = $pdo->query("SELECT idCatégorie AS id_categorie, titre FROM catégories");
$categories = $req->fetchAll(PDO::FETCH_ASSOC);



//var_dump($categories);

// Insert
if (isset($_POST['addNewBook'])) {

    $is_valide = true;
    $msg = [];

    if(empty($_POST['title'])) {
        $msg['title'] = 'Entrer le titre du livre';
        $is_valide = false;
    }

    if(empty($_POST['auteur'])) {
        $msg['auteur'] = 'Entrer l\' auteur du livre';
        $is_valide = false;
    }
    if(empty($_POST['category_id'])) {
        $msg['catégorie'] = 'Entrer la catégorie du livre';
        $is_valide = false;
    }

    if($is_valide) {
        $title = htmlspecialchars(trim($_POST['title']));
        $auteur = htmlspecialchars(trim($_POST['auteur']));
        $category_id = htmlspecialchars(trim($_POST['category_id']));

        $req = $pdo->prepare('INSERT INTO livres SET titre = ?, auteur = ?, categorie_id = ?');
        $req->execute([$title, $auteur, $category_id]);

        $_SESSION['validate'] = 'Insertion avec succès';
    }
}


// Affichage
$req = $pdo->query(
    "SELECT livres.idLivre, livres.titre, livres.auteur, livres.creation, catégories.titre as titreCat, catégories.edition
    FROM livres 
    LEFT JOIN catégories ON livres.categorie_id = catégories.idCatégorie 
    ORDER BY idLivre DESC
    LIMIT 10"
    
    );

$datas = $req ->fetchAll(PDO::FETCH_ASSOC) ;

// var_dump($datas);

// Edit 
if (isset($_POST['updateBook'])) {
    $idLivre = htmlspecialchars(trim($_POST['idLivre']));
    $title = htmlspecialchars(trim($_POST['title']));
    $auteur = htmlspecialchars(trim($_POST['auteur']));
    $categorie_id = htmlspecialchars(trim($_POST['categorie_id']));

    // Requête de mise à jour
    $req = $pdo->prepare("UPDATE livres SET titre = ?, auteur = ?, categorie_id = ? WHERE idLivre = ?");
    $req->execute([$title, $auteur, $categorie_id, $idLivre]);

    $_SESSION['validate'] = "Livre mis à jour avec succès !";
    header('Location: ' . BASE_URL . '/index.php?p=livre');
    exit;
}



// DELETE
if(array_key_exists('sup', $_GET)) {
    $sup = htmlspecialchars(trim($_GET['sup']));

    $req = $pdo->prepare(
        "DELETE FROM livres WHERE idLivre = ?"
    );

    $req->execute([$sup]);

    // Redirection
    header('location:'. BASE_URL . '/index.php');
}