<!DOCTYPE html>
<html>
    <head>
        <title>Regisztráció</title>
        <meta charset="utf-8">
    </head>
    <body>
        <div class="page-section cta">
            <div class="container">
                <?php if(isset($uzenet)) { ?>
                    <h1><?= $uzenet ?></h1>
                    <?php if($ujra) { ?>
                        <a href="index.php?oldal=comment">Próbálja újra!</a>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </body>  
</html>