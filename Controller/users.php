<?php

    require "Model/users.php";

    if(
        isset($_GET['action']) && 
        $_GET['action'] === 'toggle_enabled' && 
        isset($_GET['id']) && 
        is_numeric($_GET['id'])
        ) {

        $id = cleanString($_GET['id']);

        toggle_enabled($pdo, $id);
        header('location: index.php?component=users');

    }

    $users = getAll($pdo);


    require "View/users.php";

?>