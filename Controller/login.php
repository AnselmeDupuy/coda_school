<?php
    require "Model/login.php";

    if (isset($_POST['login-button'])) 
        {
            $errors = [];
            $username = !empty($_POST["username"]) ? $_POST["username"] : null;
            $password = !empty($_POST["password"]) ? $_POST["password"] : null;
            if(
                !empty($username) &&
                !empty($password)
            ) { 
                $username = cleanString($username);
                $password = cleanString($password);

                $user = getUser($pdo,$username);

                $checkPass = is_array($user) && password_verify($password, $user["password"]);

                if($checkPass && $user['enabled']) {
                    $_SESSION["auth"] = true;
                    header('location: index.php');
                } elseif (!$user['enabled']) {
                    $errors[] = 'Account deactivated';
                } elseif (!$checkPass) {
                    $errors[] = "Wrong Password";
                } else {
                    $errors[] = "invalid auth";
                }


                // if (is_array($user)) {
                //     $checkPass = password_verify($password, $user["password"]);
                //     if($checkPass === true) 
                //     {     
                //     } else {
                //         $errors[] = "Wrong password";
                //     }
                // } else {
                //     $errors[] = "Incorrect username";       
                // } 
            } else {
                $errors[] = "Empty usernam/password";
            }
        }

    require "View/login.php";

           
    
?>