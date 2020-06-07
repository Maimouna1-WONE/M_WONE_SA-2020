<?php
    require_once "db/connexion.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Ajax</title>
    
</head>
<body>
    <?php include_once "pages/nav.php" ?>

    <div class="container" id="container">

        <div class="row" id="form">
        
        </div>

    <h2 class="mt-5">Les ventes d'aujourd'hui</h2>
        <div class="row mt-5" id="table">
        
        </div>

    </div>
    

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>