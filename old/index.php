<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - WebBeadando</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&amp;display=swap">
</head>

<body style="background:linear-gradient(rgba(47, 23, 15, 0.65), rgba(47, 23, 15, 0.65)), url('assets/img/bg.jpg');">
    <h1 class="text-center text-white d-none d-lg-block site-heading"><span class="text-primary site-heading-upper mb-3">WEB-programozás I.&nbsp;</span><span class="site-heading-lower">Coffeeshop</span></h1>
    <nav class="navbar navbar-expand-lg bg-dark py-lg-4 navbar-dark" id="mainNav">
        <div class="container"><a class="navbar-brand text-uppercase d-lg-none text-expanded" href="#">WebBeadando</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navbarResponsive"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active"><a class="nav-link" href="?oldal=index">Főoldal</a></li>
                    <li class="nav-item"><a class="nav-link" href="?oldal=kapcsolat">Kapcsolatok</a></li>
                    <li class="nav-item"><a class="nav-link" href="?oldal=kepek">Képek</a></li>
                    <li class="nav-item"><a class="nav-link" href="?oldal=belepes">Belépés</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- php meghivás -->
    <?php
        $oldalak = array(
            "index" => array('index.html'),
            "kapcsolat" => array('kapcsolat.html'),
            "kepek" => array('kepek.html'),
            "belepes" => array('belep.php'),  
        );
        $keres = $oldalak['index'];
        if (isset($_GET['oldal'])) {
            if (isset($oldalak[$_GET['oldal']])) {
                $keres = $oldalak[$_GET['oldal']];
            }
            else { 
                $keres = $hiba_oldal;
                header("HTTP/1.0 404 Not Found");
            }
        }
        foreach ($keres as $oldal) {
            include($oldal);
        }
        ?>
    
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/current-day.js"></script>
</body>

</html>