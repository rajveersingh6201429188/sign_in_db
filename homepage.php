<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home  Page</title>
</head>
<body>
    

<h1> polling .</h1>
<?php
echo 'u have  in 15 seconds';
echo '<br> give your vote';
header('Refresh: 15; url=welcome.php');

exit;
?>



</body>
</html>