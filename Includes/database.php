<?php
    try 
    {
        $pdo = new PDO("mysql:host=localhost;dbname=coda_school", username: 'root');
    } catch (Exception $e) 
    {
        $errors[] = "Erreur de connexion à la BDD (GET): {$e->getMessage()}";
    }


?>