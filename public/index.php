<?php
if (isset($_SERVER)) {

    if(isset($_SERVER['REQUEST_SCHEME']) && isset($_SERVER
    ['SERVER_NAME']) && isset($_SERVER['SCRIPT_NAME'])) {

        $base_url = $_SERVER['REQUEST_SCHEME'] . '://'. $_SERVER
        ['SERVER_NAME']  . dirname($_SERVER['SCRIPT_NAME']);

        define ('BASE_URL', $base_url);
    }
}

if(isset($_GET)) {
    ob_start();
    if (array_key_exists('p', $_GET)) {

        $page = htmlspecialchars(trim($_GET['p']));

        

        if($page == 'livre') {
            require_once "../view/livre-view.php";
        }
        else if($page == 'categorie') {
            require_once "../view/categorie-view.php";
        }
        else if($page == 'membre') {
            require_once "../view/membre-view.php";
        }
        else if ($page == 'editLivre') {
            require_once "../view/editLivre-view.php";
        }
        else {
            require_once "../view/error/error404.php";
        }
        
        
    }
    else {
        require_once "../view/livre-view.php";
    }

    $contenue = ob_get_clean();
        require_once "../view/template/default.php";
}
