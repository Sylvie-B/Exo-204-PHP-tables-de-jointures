<?php

/*
 * 1 - Uniquement pour la pratique, reproduisez via mysql workbench le schémas proposé.
 * 2 - Exportez le résultat de manière à créer les tables en base de données.
 * 3 - Ajoutez des utilisateurs, des rôles et ajoutez des données dans la table user_role ( attention, au moins un
 * utilisateur doit avoir deux rôles au moins ).
 * 4 - A l'aide d'un simple print_r, afficher les rôles de chaque utilisateur.
 * 5 - FIN !
 */

$server = 'localhost';
$database = 'exo-204';
$user = 'root';
$pass = '';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $exception) {
    echo "data base connexion error : " . $exception->getMessage();
    return null;
}

$search = $conn->prepare("
    SELECT * FROM user_role INNER JOIN user ON user.id = user_role.user_fk INNER JOIN role ON role.id = user_role.role_fk
");

$search->execute();

print_r($search->fetchAll());

