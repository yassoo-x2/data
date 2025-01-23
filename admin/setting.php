<?php
$dsn = 'mysql:host=localhost;dbname=data';
$user = 'root';
$pass = '';
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
);
try {
    $con = new PDO($dsn, $user, $pass, $option);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'F connect' . $e->getMessage();
}

// Check if the table exists
$tableName = 'login';
$stmt = $con->query("SHOW TABLES LIKE '$tableName'");
$tableExists = ($stmt->rowCount() > 0);

if (!$tableExists) {
    // Create the table
    $createTableQuery = "
        CREATE TABLE $tableName (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            phone VARCHAR(20) NOT NULL,
            groupID INT,
            Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ";

    $con->exec($createTableQuery);
}

// Insert the default amdin
$username = 'yassinadmin';
$password = '112233';
$groupID = 1;

// Check if the username already exists
$checkQuery = "SELECT COUNT(*) FROM $tableName WHERE username = :username";
$stmt = $con->prepare($checkQuery);
$stmt->bindParam(':username', $username);
$stmt->execute();
$userExists = $stmt->fetchColumn() > 0;

if (!$userExists) {
// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$insertQuery = "
    INSERT INTO $tableName (username, password, email, phone, groupID)
    VALUES (:username, :password, '', '', :groupID)
";

$stmt = $con->prepare($insertQuery);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $hashedPassword);
$stmt->bindParam(':groupID', $groupID);

$stmt->execute();
}




