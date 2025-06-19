<?php
echo "<h2>Test d'upload d'image</h2>";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['test_image'])) {
    echo "<h3>Informations du fichier reçu:</h3>";
    echo "<pre>";
    print_r($_FILES['test_image']);
    echo "</pre>";
    
    echo "<h3>Configuration PHP:</h3>";
    echo "upload_max_filesize: " . ini_get('upload_max_filesize') . "<br>";
    echo "post_max_size: " . ini_get('post_max_size') . "<br>";
    echo "max_file_uploads: " . ini_get('max_file_uploads') . "<br>";
    echo "memory_limit: " . ini_get('memory_limit') . "<br>";
    
    // Test avec CodeIgniter
    if (file_exists('./system/libraries/Upload.php')) {
        echo "<h3>Test avec CodeIgniter:</h3>";
        
        // Créer le dossier uploads
        if (!is_dir('./uploads/')) {
            mkdir('./uploads/', 0755, true);
        }
        
        // Configuration basique
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
        $config['max_size'] = 10240;
        $config['encrypt_name'] = TRUE;
        
        require_once './system/core/Common.php';
        require_once './system/libraries/Upload.php';
        
        $upload = new CI_Upload();
        $upload->initialize($config);
        
        if ($upload->do_upload('test_image')) {
            $data = $upload->data();
            echo "<span style='color: green;'>✓ Upload réussi!</span><br>";
            echo "Fichier sauvé: " . $data['file_name'] . "<br>";
        } else {
            echo "<span style='color: red;'>✗ Échec upload:</span><br>";
            echo $upload->display_errors();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Test Upload</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <h3>Testez votre upload d'image:</h3>
        <input type="file" name="test_image" accept="image/*" required>
        <br><br>
        <button type="submit">Tester Upload</button>
    </form>
    
    <hr>
    <p><a href="<?= $_SERVER['PHP_SELF'] ?>">Rafraîchir</a> | <a href="/app-perso2/">Retour à l'app</a></p>
</body>
</html>
