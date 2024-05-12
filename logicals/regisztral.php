<?php
if(isset($_POST['csaladinev']) && isset($_POST['utonev']) && isset($_POST['bejelentkezes']) && isset($_POST['jelszo'])) {
    try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=api.uniassist.hu;dbname=CoffeeShop', 'CoffeeShop', '92-rhGz^D26%',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        // Létezik már a felhasználói név?
        $sqlSelect = "select id from felhasznalok where bejelentkezes = :bejelentkezes";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':bejelentkezes' => $_POST['bejelentkezes']));
        if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $uzenet = "A felhasználói név már foglalt!";
            $ujra = true;
        }
        else {
            // Define your SQL query before using it
            $sqlInsert = "INSERT INTO felhasznalok (csaladinev, utonev, bejelentkezes, jelszo) VALUES (:csaladinev, :utonev, :bejelentkezes, :jelszo)";
            $stmt = $dbh->prepare($sqlInsert);
            $stmt->execute(array(':csaladinev' =>  $_POST['csaladinev'], ':utonev' => $_POST['utonev'], ':bejelentkezes' => $_POST['bejelentkezes'], ':jelszo' => $_POST['jelszo']));
            if($count = $stmt->rowCount()) {
                $newid = $dbh->lastInsertId();
                $uzenet = "A regisztrációja sikeres.<br>Azonosítója: {$newid}";                     
                $ujra = false;
            } else {
                $uzenet = "A regisztráció nem sikerült.";
                $ujra = true;
            }
        }
    }
    catch (PDOException $e) {
        $uzenet = "Hiba: ".$e->getMessage();
        $ujra = true;
    }
}
else {
        // One or more required POST parameters are not set, handle the error
        $uzenet = "A regisztráció nem sikerült. Kérjük, adja meg az összes szükséges adatot.";
        $ujra = true;
        echo "csaladinev: " . $_POST['csaladinev'] . "<br>";
        echo "utonev: " . $_POST['utonev'] . "<br>";
        echo "bejelentkezes: " . $_POST['bejelentkezes'] . "<br>";
        echo "jelszo: " . $_POST['jelszo'] . "<br>";
}

// Display the message to the user
echo $uzenet;
?>