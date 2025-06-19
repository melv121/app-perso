<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Exception</title>
    <style>
        body { font-family: Arial, sans-serif; background: #fff; color: #333; margin: 2em; }
        .error-box { border: 1px solid #e74c3c; background: #f9eaea; padding: 1em 2em; border-radius: 6px; }
        h1 { color: #e74c3c; }
        .small { color: #888; font-size: 0.9em; }
        pre { background: #f4f4f4; padding: 1em; border-radius: 4px; overflow-x: auto; }
    </style>
</head>
<body>
    <div class="error-box">
        <h1>Exception</h1>
        <p><strong>Message :</strong> <?php echo isset($message) ? $message : 'Exception non spécifiée'; ?></p>
        <?php if (isset($file) && isset($line)): ?>
        <p><strong>Fichier :</strong> <?php echo $file; ?></p>
        <p><strong>Ligne :</strong> <?php echo $line; ?></p>
        <?php endif; ?>
        <?php if (isset($trace)): ?>
        <p><strong>Stack trace :</strong></p>
        <pre><?php echo $trace; ?></pre>
        <?php endif; ?>
        <p class="small">CodeIgniter error_exception.php</p>
    </div>
</body>
</html>
