<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="box">
        <h2>Logout</h2>
        <form method="post" action="logout.php">
            <button type="submit" name="logout">Logout</button>
        </form>
    </div>
</header>

<h1>Welcome</h1>

<?php
include('quiz_page.php');
?>

</body>
</html>
