<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
define('ROOT_PATH', dirname(__DIR__) . '/./');
include(ROOT_PATH.'database.php');
include(ROOT_PATH.'books.php');
session_start();
//checks if the variable user is set
if(isset($_SESSION['fname'])){    
    echo '<h5 style="color: white;">Welcome ' . $_SESSION['fname'] . ',</h5>'; 
} 

else{    
    header("Location:loginpage.php");
}  

// get database connection
$database = new Database();
$db = $database->getConnection();
 

// prepare user object
$book = new books($db);
$conn = $db;

$date = date("Y-m-d", strtotime($_POST['expdate']));
$userid = $_SESSION['UserID'];
$bookid = $_SESSION['bookid'];
// $bid = $_POST['BookID'];
$curdate = date("Y-m-d");

if(isset($date)){

    $checkquery="SELECT * FROM `Borrowed_books` WHERE UserID = '$userid' AND BookID = '$bookid'";
    $stmt0 = $conn->prepare($checkquery);
    $stmt0->execute();
    $check=$stmt0->rowCount();
    if($check==1){
        $query = "UPDATE `Borrowed_books` SET Expected_ReturnDate = '$date' WHERE BookID = '$bookid' AND UserID = '$userid'";
    
        // prepare query statement
        $stmt = $conn->prepare($query);
        // execute query
        $stmt->execute();
       
        echo '<script>';
        echo 'swal("Done!", "Date extended.", "success").then(function() {
            window.location = "mybooks.php";
        });
        ;
        </script>';
        return $stmt;


    }else{
        echo '<script>';
        echo 'swal("Sorry!", "Seems like you have not borrowed this boook.", "error").then(function() {
            window.location = "mybooks.php";
        });
        ;
        </script>';
    }

    
    

}?>