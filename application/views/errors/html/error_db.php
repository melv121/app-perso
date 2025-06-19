<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Erreur Base de Données</title>
    <style>
        body { font-family: Arial, sans-serif; background: #fff; color: #333; margin: 2em; }
        .error-box { border: 1px solid #e74c3c; background: #f9eaea; padding: 1em 2em; border-radius: 6px; }
        h1 { color: #e74c3c; }
        .small { color: #888; font-size: 0.9em; }
        .code { background: #f4f4f4; padding: 1em; border-radius: 4px; margin: 1em 0; font-family: monospace; }
    </style>
</head>
<body>
    <div class="error-box">
        <h1>Erreur de Base de Données</h1>
        <p><strong>Message :</strong> <?php echo isset($message) ? $message : 'Erreur de connexion à la base de données'; ?></p>
        
        <?php if (isset($heading) && $heading): ?>
            <p><strong>Type :</strong> <?= $heading ?></p>
        <?php endif; ?>
        
        <div class="code">
            <strong>Que faire ?</strong><br>
            1. Vérifiez que XAMPP/MySQL est démarré<br>
            2. Vérifiez les paramètres dans application/config/database.php<br>
            3. Créez la base de données 'marketplace_artisanat' si elle n'existe pas<br>
            4. Importez le fichier SQL fourni avec le projet
        </div>
        
        <p class="small">CodeIgniter error_db.php</p>
    </div>
</body>
</html>
