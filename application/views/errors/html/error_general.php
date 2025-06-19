<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Erreur</title>
    <style>
        body { font-family: Arial, sans-serif; background: #fff; color: #333; margin: 2em; }
        .error-box { border: 1px solid #e67e22; background: #fff6e3; padding: 1em 2em; border-radius: 6px; }
        h1 { color: #e67e22; }
        .small { color: #888; font-size: 0.9em; }
    </style>
</head>
<body>
    <div class="error-box">
        <h1>Une erreur est survenue</h1>
        <p><strong><?php echo isset($heading) ? $heading : 'Erreur'; ?></strong></p>
        <p><?php echo isset($message) ? $message : 'Une erreur inattendue est survenue.'; ?></p>
        <p class="small">CodeIgniter error_general.php</p>
    </div>
</body>
</html>
