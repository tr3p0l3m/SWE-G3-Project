<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HomePage</title> 
    <link rel="stylesheet" href="homepageHeaderstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <nav>
      <div class="menu-icon">
<span class="fas fa-bars"></span></div>
<div class="logo" style="margin-left:-10px">
BiblioTeca</div>
<div class="nav-items">
<li><a href="homepage.php">HOME</a></li>
<li><a href="mybooks.php">My Books</a></li>
<li><a href="#">Novels</a></li>
<li><a href="#">Textbooks</a></li>
<li><a href="#">Journals</a></li>
<li><a href="#">Magazines</a></li>
<?php
session_start();
if(isset($_SESSION['fname'])){
  echo '
  <li><a href="logout.php">Log out</a></li>';
}else{
  echo '
  <li><a href="loginpage.php">Log in</a></li>';
}

?>
</div>
<div class="search-icon">
<span class="fas fa-search"></span></div>
<div class="cancel-icon">
<span class="fas fa-times"></span></div>
<form action="#">
        <input type="search" class="search-data" placeholder="Search" required>
        <button type="submit" class="fas fa-search"></button>
      </form>
</nav>
    
<script>
    const menuBtn = document.querySelector(".menu-icon span");
    const searchBtn = document.querySelector(".search-icon");
    const cancelBtn = document.querySelector(".cancel-icon");
    const items = document.querySelector(".nav-items");
    const form = document.querySelector("form");
    menuBtn.onclick = ()=>{
      items.classList.add("active");
      menuBtn.classList.add("hide");
      searchBtn.classList.add("hide");
      cancelBtn.classList.add("show");
    }
    cancelBtn.onclick = ()=>{
      items.classList.remove("active");
      menuBtn.classList.remove("hide");
      searchBtn.classList.remove("hide");
      cancelBtn.classList.remove("show");
      form.classList.remove("active");
      cancelBtn.style.color = "#ff3d00";
    }
    searchBtn.onclick = ()=>{
      form.classList.add("active");
      searchBtn.classList.add("hide");
      cancelBtn.classList.add("show");
    }
  </script>

  </body>
</html>