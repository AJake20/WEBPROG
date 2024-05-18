<?php
try {
    $dbh = new PDO('mysql:host=api.uniassist.hu;dbname=CoffeeShop', 'CoffeeShop', '92-rhGz^D26%',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $comment = $_POST['comment'];

        $stmt = $dbh->prepare("INSERT INTO comments (fullname, email, comment) VALUES (:fullname, :email, :comment)");
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':comment', $comment);

        if ($stmt->execute()) {
            echo "Megjegyzés sikeresen elküldve!";
        } else {
            echo "Hiba: a megjegyzés elküldése sikertelen!";
        }
    }
} 
catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$dbh = null;
?>