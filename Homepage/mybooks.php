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
<style>
    .nobooks{
        width:40%; 
        display:block;
        margin: 0 auto;
        margin-top:50px; 
        background-color: #c0392b;
        font-size:20px;
        text-align: center;
        border-radius:10px;
    }
    </style>


</head>

<?php 
define('ROOT_PATH', dirname(__DIR__) . '/./');
include(ROOT_PATH.'database.php');
include(ROOT_PATH.'books.php');
 require_once("homepageHeader.php");
 require_once('component.php');

 

 session_start();
 $database = new Database();
 $db = $database->getConnection();
 $conn = $db;

 $book = new books($db);
 $stmt = $book->getStudentBooks();
 $userid = $_SESSION['UserID'];
 if($stmt->rowCount() > 0){
    echo '
    <div class="container">
    <h3 class="col-md-12 py-3 my-3" style="background: grey; color: white">My books</h3>
    <div class="row text-center">';
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $bookid = $result['BookID'];
      $title = $result['Title'];
      $category= $result['Category'];
      $author= $result["Author"];
      $book_image= $result["Book_image"];
      $book_status= $result["Book_Status"];
      $return_date = $result['Expected_ReturnDate'];

        mybook($title, $author, $book_image, $bookid, $return_date);
    }
    echo'  </div>
    </div>';

 }else{
    echo '<div class="alert alert-danger nobooks">
    <strong>Hello!</strong> You have borrowed no books.</div>';
}


 if(isset($_GET['bid'])){
    $bookid = $_GET['bid'];
    $query = "DELETE  
    FROM
        `Borrowed_books`
    WHERE
    BookID = '$bookid' AND UserID = '$userid'"  ;
    $changestatus = "UPDATE Books SET Book_Status = 'on-shelf' WHERE BookID = '$bookid'";
    $stmt1 = $conn->prepare($changestatus);
    // prepare query statement
    $stmt = $conn->prepare($query);
    // execute query
    $stmt->execute();
    if($stmt->execute() === true){
        $stmt1->execute();
        echo "<script>";
        echo "alert('Done! Book returned sucessfully.');      
            window.location.href='mybooks.php';
            </script>";
            return true;  
    }else{
        echo '<script>'; 
        echo 'alert("Error! Unable to return"); 
            window.location.href="mybooks.php"; 
            </script>';
            return false;
    }		
}



 ?>




<?php 
 require_once("homepageFooter.php");
?>