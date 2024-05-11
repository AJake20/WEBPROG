<!DOCTYPE html>
<html>
<head>
    <title>Belépés</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="page-section cta">
    <div class="page-section cta">
        <div class="container">
            <h2>Belépés</h2>
            <form method="POST" action="belep.php">
                <div class="form-group">
                    <label for="felhasznalo">Felhasználónév:</label>
                    <input type="text" class="form-control" name="felhasznalo" id="felhasznalo" required>
                </div>
                
                <div class="form-group">
                    <label for="jelszo">Jelszó:</label>
                    <input type="password" class="form-control" name="jelszo" id="jelszo" required>
                </div>
                
                <input type="submit" class="btn btn-primary" value="Belépés">
            </form>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $felhasznalo = $_POST["felhasznalo"];
    $jelszo = $_POST["jelszo"];
    
    // TODO: Add your login logic here
    
    if ($felhasznalo == "admin" && $jelszo == "password") {
        // Successful login, redirect to home page
        header("Location: index.php");
        exit();
    } else {
        // Invalid credentials, display error message
        echo "Hibás felhasználónév vagy jelszó!";
    }
}
?>