<?php
if(isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['comment'])) {
    try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=coffeeshopusers', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            // Ha nem létezik, akkor regisztráljuk
        $sqlInsert = "insert into commentek(id, fullname, email, comment)
                          values(0, :fullname, :email, :comment)";
        $stmt = $dbh->prepare($sqlInsert); 
        $stmt->execute(array(':fullname' => $_POST['fullname'], ':email' => $_POST['email'],
                                 ':comment' => $_POST['comment'])); 
         if($count = $stmt->rowCount()) {
            $newid = $dbh->lastInsertId();
            $uzenet = "Megjegyzés elküldése sikeres.<br>Azonosítója: {$newid}";                     
            $ujra = false;
        }
        else {
            $uzenet = "Az elküldés nem sikerült.";
            $ujra = true;
        }
    }
    catch (PDOException $e) {
        $uzenet = "Hiba: ".$e->getMessage();
        $ujra = true;
    }      
}

else {
    header("Location: .");
}
?>