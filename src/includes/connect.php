<?php
    try {
        include '../config.php';
    }catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    
    // Connect to the database
    try {
        $pdo = new PDO('mysql:dbname="' . $dbname . '";host="' . $host . '";charset=utf8"', $user, '"""');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Caught exception: ' . $e->getMessage();
    }
?>
