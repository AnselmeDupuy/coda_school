<?php



function getUser(PDO $pdo,string $username) : array | bool
{
    /**
    * @var PDO $pdo
    */
    $query = "SELECT `username`, `password`, enabled FROM `users` WHERE `username` = :username";
    $res = $pdo->prepare($query);
    $res->bindParam(':username', $username);
    $res->execute();
    return $res->fetch();
}



?>