<?php 
    
    session_start();

    //require_once('../database.php');
    require_once('component.php');

    $database = getData("Books");
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="bootstrap.css">
<link rel="stylesheet" type="text/css" href="chatbot.css">
<link rel="stylesheet" type="text/css" href="responsive.css">
<link rel="stylesheet" href="styles.css">


<!-- ChatBot -->
<link rel="stylesheet" type="text/css" href="jquery.convform.css">
<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="jquery.convform.js"></script>
<script type="text/javascript" src="chatbot.js"></script>
<?php require_once "homepageHeader.php" ?>
</head>

<body>

<div class="container">
    <h3 class="col-md-12 py-3 my-3" style="background: grey; color: white">Recommended books</h3>
</div>


<div class="container">
    <h3 class="col-md-12 py-3 my-3" style="background: grey; color: white">All books</h3>
    <div class="row text-center">
      <?php
        $result = $database;
        while ($row = mysqli_fetch_assoc($result)){
            component($row['Title'], $row['Author'], $row['Book_image'], $row['BookID']);
        }
      ?>
    </div>
</div>
<?php require_once "chatbot.php" ?>

</body>
</html>

<?php require_once "homepageFooter.php" ?>