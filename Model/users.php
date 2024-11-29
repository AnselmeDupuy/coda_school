<?php   



function getAll(PDO $pdo)
{
    try{
        $res = $pdo->prepare('SELECT * FROM `users`');
        $res->execute();
        return $res->fetchAll();
    } catch (Exception $e) {
        $errors[] = "get all users issue";
    }
}

function toggle_enabled(PDO $pdo, int $id) : void
{
    try{
        $res = $pdo->prepare('UPDATE `users` SET `enabled` = NOT enabled WHERE `id` = :id');
        $res->bindParam(':id', $id, PDO::PARAM_INT); 
        $res->execute();
    } catch (Exception $e) {
        $errors[] = "toggle_enabled issue";
    }
}

function deleteUser(PDO $pdo, int $id)
{
    try{
        $res = $pdo->prepare('DELETE FROM `users` WHERE `id` = :id');
        $res->bindParam(':id', $id, PDO::PARAM_INT); 
        $res->execute();
    } catch (PDOException $e) {
       return $e->getMessage();
    }
}





?>