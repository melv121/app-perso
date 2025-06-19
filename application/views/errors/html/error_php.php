<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Erreur PHP</title>
    <style>
        body { font-family: Arial, sans-serif; background: #fff; color: #333; margin: 2em; }
        .error-box { border: 1px solid #e74c3c; background: #f9eaea; padding: 1em 2em; border-radius: 6px; }
        h1 { color: #e74c3c; }
        .small { color: #888; font-size: 0.9em; }
    </style>
</head>
<body>
    <div class="error-box">
        <h1>Une erreur PHP est survenue</h1>
        <p><strong>Gravité&nbsp;:</strong> <?php echo $severity; ?></p>
        <p><strong>Message&nbsp;:</strong> <?php echo $message; ?></p>
        <p><strong>Fichier&nbsp;:</strong> <?php echo $filepath; ?></p>
        <p><strong>Ligne&nbsp;:</strong> <?php echo $line; ?></p>
        <p class="small">CodeIgniter error_php.php</p>
    </div>
</body>
</html>
