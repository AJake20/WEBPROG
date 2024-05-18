<?php
// Adatbázis kapcsolat létrehozása
$dbh = new PDO('mysql:host=api.uniassist.hu;dbname=CoffeeShop', 'CoffeeShop', '92-rhGz^D26%');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Feltöltött képek lekérdezése az adatbázisból
$stmt = $dbh->query("SELECT * FROM images");
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);

$uploadStatus = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    try {
        // Képfeltöltés feldolgozása
        $image = $_FILES['image'];
        $uploadDir = 'uploads/';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $fileName = basename($image['name']);
        $uploadFile = $uploadDir . $fileName;
        $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

        // Kép ellenőrzése
        $check = getimagesize($image['tmp_name']);
        if ($check === false) {
            $uploadStatus = '<p style="color: red;">A fájl nem kép.</p>';
        } elseif ($image['size'] > 2000000) {
            $uploadStatus = '<p style="color: red;">A fájl túl nagy.</p>';
        } elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            $uploadStatus = '<p style="color: red;">Csak JPG, JPEG, PNG és GIF fájlokat engedélyezünk.</p>';
        } elseif (file_exists($uploadFile)) {
            $uploadStatus = '<p style="color: red;">A fájl már létezik.</p>';
        } else {
            // Kép mentése és adatbázisba való beszúrása
            if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
                $stmt = $dbh->prepare("INSERT INTO images (file_path) VALUES (:file_path)");
                $stmt->bindParam(':file_path', $uploadFile);

                if ($stmt->execute()) {
                    $uploadStatus = '<p style="color: green;">Kép sikeresen feltöltve!</p>';
                } else {
                    $uploadStatus = '<p style="color: red;">Hiba történt a kép mentésekor az adatbázisban.</p>';
                }
            } else {
                $uploadStatus = '<p style="color: red;">Hiba történt a kép feltöltésekor.</p>';
            }
        }
    } catch (PDOException $e) {
        $uploadStatus = '<p style="color: red;">Adatbázis hiba: ' . $e->getMessage() . '</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Képfeltöltés</title>
    <link rel="stylesheet" href="path_to_your_css_file.css">
</head>
<body>
    <section class="page-section upload-section">
        <div class="container">
            <div class="upload-content">
                <div class="row">
                    <div class="col-lg-10 col-xl-9 mx-auto">
                        <div class="bg-faded rounded p-5">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">Töltsön fel egy képet</span>
                            </h2>
                            <form id="uploadForm" enctype="multipart/form-data" method="post">
                                <div class="mb-3">
                                    <input type="file" class="form-control" name="image" accept="image/*" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Feltöltés</button>
                            </form>
                            <div id="uploadStatus">
                                <?php echo $uploadStatus; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section images-section">
        <div class="container">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="bg-faded rounded p-5">
                    <h2 class="section-heading">Feltöltött Képek</h2>
                    <div class="row">
                        <?php if (!empty($images)): ?>
                            <?php foreach ($images as $image): ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="img-thumbnail">
                                        <img src="<?php echo htmlspecialchars($image['file_path']); ?>" class="img-fluid" alt="Uploaded Image">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Még nem töltöttek fel képeket.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="path_to_your_js_file.js"></script>
</body>
</html>
