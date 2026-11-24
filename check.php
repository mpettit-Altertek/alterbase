<?php
$mysqli_available = extension_loaded('mysqli') ? 'yes' : 'no';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>alterbase</title>
</head>
<body>
    <h1>alterbase</h1>
    <ul>
        <li>PHP version: <?= htmlspecialchars(PHP_VERSION) ?></li>
        <li>mysqli extension: <?= htmlspecialchars($mysqli_available) ?></li>
    </ul>
</body>
</html>
