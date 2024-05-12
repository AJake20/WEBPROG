<?php
    // Check if form is submitted
    if(isset($_POST['submit'])){
        $file = $_FILES['fileToUpload'];

        // Get file details
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        // Check for errors
        if($fileError === 0){
            // Generate a unique file name
            $fileDestination = 'uploads/' . uniqid('', true) . '_' . $fileName;

            // Move the uploaded file to the destination
            move_uploaded_file($fileTmpName, $fileDestination);
            // Create a new PDO instance
            $pdo = new PDO('mysql:host=api.uniassist.hu;dbname=CoffeeShop', 'CoffeeShop', '92-rhGz^D26%',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $sqlInsert = "INSERT INTO images kepneve VALUES :kepneve";
            $stmt = $dbh->prepare($sqlInsert);
            $stmt->execute(array(':kepneve' => $fileTmpName));
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
        }
    }
    else {
        // One or more required POST parameters are not set, handle the error
        $uzenet = "A kép feltöltése nem sikerült.";
        $ujra = true;
        echo json_encode(array('uzenet' => $uzenet, 'ujra' => $ujra));
    }
?>
