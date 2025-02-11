<?php 
    session_start();
    $errors = [];

    if (isset($_GET['disconnect'])) {
        session_destroy();
        header('Location: index.php');
        exit();
    }

    require "Includes/database.php";
    require "Includes/function.php";
    
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>coda_school</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="container">

            <?php
            if (isset($_SESSION["auth"])) {
                require "_partials/navbar.php";
                if($_SESSION["auth"] === true) {
                    if(isset($_GET['component'])) {
                        $component = cleanString($_GET['component']);
                        if(file_exists("Controller/$component.php"))
                        {
                            require "Controller/$component.php";
                        }
                    }
                }
            } else {
                require "Controller/login.php";
            }
            require "_partials/errors.php";
            ?>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>