<?php

    require "Model/users.php";

    if(isset($_GET["action"]) &&
        (isset($_GET['id'])) &&
        is_numeric($_GET['id'])    
    ) {
        $id = cleanString($_GET['id']);

        switch($_GET['action']) {
            case 'toggle_enabled':
                toggle_enabled($pdo, $id);
                header('Location: index.php?component=users');
                break;
            case 'delete':
                $deleted = deleteUser($pdo, $id);
                if(!empty($deleted)) {
                    $errors[''] = 'Deletion impossible, user still linked';
                } else {
                    header('Location: index.php?component=users');
                }
                break;  
        }
    } elseif(isset($_GET['action']) && (!isset($_GET['id']))){
        if($_GET['action'] === 'create'){
            header('Location: index.php?component=user&action=create');            
        } else {
            $errors[] = 'Error 54';
        }
    }

    
       

   


    $users = getAll($pdo);


    require "View/users.php";

?>