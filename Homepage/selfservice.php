
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
define('ROOT_PATH', dirname(__DIR__) . '/./');
include(ROOT_PATH.'database.php');
include(ROOT_PATH.'books.php');
 require_once("homepageHeader.php");

 session_start();
 $_SESSION['UserID'] = 1;
 $userid = $_SESSION['UserID'];



 $database = new Database();
 $db = $database->getConnection();
 $conn = $db;

 $bookid = $_GET['bid'];
 if(isset($_GET['bid'])){
    $book = new books($db);
    $title;
    $category;
    $author;
    $book_image;
    $book_status;
    $stmt = $book->displayBook($bookid);



    if($stmt->rowCount() > 0){
      while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $title = $result['Title'];
        $category= $result['Category'];
        $author= $result["Author"];
        $book_image= $result["Book_image"];
        $book_status= $result["Book_Status"];
        $book_summary= $result["book_summary"];

        echo'
        <br><br><br><br>
        <div class="container">
        <div class="row">

        <div class="col-md-4">
        <img src = "';echo $book_image; echo'" alt="book-image"/>

        </div>

        <div class="col-md-6" style="color:grey">
        <h1>'; echo $title; echo'</h1>
        <p style="color:grey">'; echo $author; echo'</p>
        <p style="color:grey">'; echo $book_summary;  echo'
        
        </p>
        <br>

        <br>';
        if($book_status=="on-shelf"){
          echo' <button class="button"><a href="borrow_book.php?bid='; echo $bookid; echo'">Borrow</a></button> ';
      } else {
        echo'<div class="button" style="background-color: red">Book borrowed</div> ';
      }
       //use session id and bookid to check borrowed table before echoing
      $checkquery="SELECT * FROM `Borrowed_books` WHERE UserID = '$userid' AND BookID = '$bookid'";
      $stmt0 = $conn->prepare($checkquery);
      $stmt0->execute();
      $check=$stmt0->rowCount();
      if($check ==1){
        echo'<button class="button"><a href="renew_book.php?bid='; echo $bookid; echo'">Renew</a></button>'; 
      } else{
        echo'<div class="button" style="background-color: red">Cannot renew</div> ';

      }
        
        

        echo'
        </div>

        <div class="col-md-2">
        </div>

        </div>
        </div>
        ';


      }
    }
 }


?>




<?php 
 require_once("homepageFooter.php");
?>