<?php
if(isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['comment'])) {
    try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=api.uniassist.hu;dbname=CoffeeShop', 'CoffeeShop', '92-rhGz^D26%',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        // Define your SQL query before using it
        $sqlInsert = "INSERT INTO commentek (fullname, email, comment) VALUES (:fullname, :email, :comment)";
        $stmt = $dbh->prepare($sqlInsert);
        $stmt->execute(array(':fullname' =>  $_POST['fullname'], ':email' => $_POST['email'], ':comment' => $_POST['comment']));
        if($count = $stmt->rowCount()) {
            $newid = $dbh->lastInsertId();
            $uzenet = "A megjegyzést sikeres elküldte.<br>Azonosítója: {$newid}";                     
            $ujra = false;
        } else {
            $uzenet = "A megjegyzést nem sikerült elküldeni.";
            $ujra = true;
        }
    }
    catch (PDOException $e) {
        $uzenet = "Hiba: ".$e->getMessage();
        $ujra = true;
    }
}
else {
    $ujra = true;
}
?>