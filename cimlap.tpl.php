<?php
try {
        // Kapcsolódás
        include('./includes/config.inc.php');
        $conn = new PDO("mysql:host=".$database['host'].";dbname=".$database['database'], $database['username'], $database['password']); //Csatlakozas az adatbazishoz
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        if (!$conn) {
            die("Fatal Error: Connection Failed!");
        }
         $sqlInsert = "insert into commentek(ids, fullname, email, comment)
         values(0, :fullname, :email, :comment)";
        $stmt = $dbh->prepare($sqlInsert); 
        $stmt->execute(array(':fullname' => $_POST['fullname'], ':email' => $_POST['email'],
                ':comment' => $_POST['comment'])); 
        if($count = $stmt->rowCount()) {
            $newid = $dbh->lastInsertId();
            $uzenet = "A regisztrációja sikeres.<br>Azonosítója: {$newid}";                     
            $ujra = false;
        }
        else {
            $uzenet = "A regisztráció nem sikerült.";
            $ujra = true;
        }
    }
    catch (PDOException $e) {
        $uzenet = "Hiba: ".$e->getMessage();
        $ujra = true;
    }
?>