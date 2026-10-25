<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servidor LAMP - openSUSE 16.0 / 15.6</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background: #0d1117;
            color: #c9d1d9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .card {
            background: #161b22;
            border: 1px solid #30363d;
            border-radius: 12px;
            padding: 30px;
            max-width: 600px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.5);
            text-align: center;
        }
        h1 { color: #73ba25; margin-bottom: 8px; }
        .badge {
            display: inline-block;
            background: #238636;
            color: #fff;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .info {
            text-align: left;
            background: #0d1117;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #30363d;
            margin-top: 20px;
            font-family: monospace;
            font-size: 13px;
        }
        a { color: #58a6ff; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Servidor Web Apache & PHP Activo</h1>
        <div class="badge">openSUSE Leap 15.6 / 16.0</div>
        <p>Desplegado exitosamente mediante Ansible Roles.</p>
        <p>
            <a href="/phpMyAdmin/" target="_blank">Acceder a phpMyAdmin &rarr;</a>
        </p>
        <div class="info">
            <strong>Host:</strong> <?php echo gethostname(); ?><br>
            <strong>PHP Version:</strong> <?php echo phpversion(); ?><br>
            <strong>Server Time:</strong> <?php echo date('Y-m-d H:i:s'); ?><br>
            <strong>Document Root:</strong> <?php echo $_SERVER['DOCUMENT_ROOT']; ?>
        </div>
    </div>
</body>
</html>
