
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>

.button {
  background-color: #ff3d00;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 20px;
}

body{
    /* background-color: rgb(15 22 39); */
}
</style>
<?php 
 require_once("homepageHeader.php");
?>
<br><br><br><br>
<div class="container">
<div class="row">

<div class="col-md-4">
<img src = "images_Novel/nancy-drew.jpg" alt="book-image"/>

</div>

<div class="col-md-6" style="color:grey">
<h1>City of Bones</h1>
<p style="color:grey">Emelia Clare</p>
<p style="color:grey">
City of Bones is the first urban fantasy book in author 
Cassandra Clare's New York Times bestselling series 
The Mortal Instruments. The novel is set in modern-day 
New York City and has been released in several languages, 
including Bulgarian, Hebrew, Polish and Japanese
</p>
<br>

<br>


<button class="button">Borrow</button>
<button class="button">Renew</button>
</div>

<div class="col-md-2">
</div>

</div>
</div>



<?php 
 require_once("homepageFooter.php");
?>