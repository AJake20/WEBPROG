<?php
try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=api.uniassist.hu;dbname=CoffeeShop', 'CoffeeShop', '92-rhGz^D26%',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        // Felhsználó keresése
        $sqlSelect = "select id, csaladinev, utonev from felhasznalok where bejelentkezes = :bejelentkezes and jelszo = :jelszo";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':bejelentkezes' => $_POST['bejelentkezes'], ':jelszo' => $_POST['jelszo']));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $_SESSION['csn'] = $row['csaladinev']; $_SESSION['un'] = $row['utonev']; $_SESSION['login'] = $_POST['bejelentkezes'];
        }
    }
    catch (PDOException $e) {
        $errormessage = "Hiba: ".$e->getMessage();
    }
?>
