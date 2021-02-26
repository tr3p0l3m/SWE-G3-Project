<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All books</title>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script><link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=BioRhyme:wght@800&display=swap" rel="stylesheet"> 

    <script language="JavaScript" type="text/javascript">
	function checkDelete(){
		return confirm('Are you sure?');
	}
	</script>
    <style>
        .books{
            padding: 20px;
            border-radius: 10px;
            color: black;
        }
        .normal{
            color: white;
            text-decoration: none;
            background-color: #171c24;
            height: 50px;
            width: 150px;
            border-radius: 10px;
            
        }
    </style>


</head>
<body>
    <?php
    // session_start();
    // if(isset($_SESSION['fname'])){  
    //     include_once('navmenu.php');
    // }
    // else{    
    //     header("Location:loginPage.php");
    require_once("homepageHeader.php");

    ?>
    <h1 style='text-align:center; color:#171c24; font-family: BioRhyme, serif;'>CHOOSE RETURN DATE AND CONFIRM BOOKING:</h1>



<?php 
                        // include database and object files
                        define('ROOT_PATH', dirname(__DIR__) . '/./');
                        include(ROOT_PATH.'database.php');
                        include(ROOT_PATH.'books.php');
                        // get database connection
                        $database = new Database();
                        $db = $database->getConnection();
                        $conn = $db;
                            
                        // prepare user object
                        $bookid = $_GET['bid'];
                        $studentid = $_SESSION['studentID'];

                        
                        if(isset($_GET['bid'])){
                            //For specific Book information
                            
                            $sql= "SELECT
                                        *
                                    FROM
                                        `Books`
                                        WHERE BookID = '$bookid'";
                            $stmty = $conn->prepare($sql);
                            $stmty->execute();
                
                        if($stmty->rowCount() > 0){

                            echo"<script>
                            $(function(){
                                var dtToday = new Date();
                                
                                var month = dtToday.getMonth() + 1;
                                var day = dtToday.getDate();
                                var year = dtToday.getFullYear();
                                var future = dtToday.getDate() + 14; 
                                if(month < 10)
                                    month = '0' + month.toString();
                                if(day < 10)
                                    day = '0' + day.toString();
                                if(future < 10)
                                    future = '0' + future.toString();
                                    
                                
                                var minDate= year + '-' + month + '-' + day;
                                var maxDate= year + '-' + month + '-' + future;
                                
                                $('#txtDate').attr('min', minDate);
                                $('#txtDate').attr('max', maxDate);
                            });
                            </script>
                            ";
                            // Fill the table body with the values
                            echo '<div style="margin-top:50px">';
                            while($result = $stmty->fetch(PDO::FETCH_ASSOC)) {
                                $BookID = $result['BookID'];
                                $title = $result['Title'];       
                                $category = $result["Category"];
                                $author = $result["Author"];
                                $book_status = $result["Book_Status"];
                                $_SESSION['bookid'] = $BookID;
                                
                                

                                echo '<div class="books" style="width:30%; padding-bottom:20px;display:block; margin:0 auto; line-height:35px; background-color:white">';
                                
                                    echo 'Title: ';    echo $title; 
                                    echo '<br>Category: ';    echo $category; 
                                    echo '<br>Author:';    echo $author; 
                                    echo '<br>Book Status: ';    echo $book_status; ?>
                                    
                                    
                                    <br> <div style="color:black">Enter Return Date: </div>
                                    <form action="confirmborrow.php" method="POST"> 
                                    <input type="date" id="txtDate" name="expdate" style="" placeholder="Enter Date" required>
                                    <?php echo '<br><br><button onclick="return checkDelete()" class="normal" type = "submit" name ="confirmborrow" style=""> Confirm Borrow </a></button>  
                                    </form>' ;
                                   
                                
                                
                                echo '</div>';

                            }
                            
                            echo '</div>';
                        }else{
                            echo 'no records';
                        }

                    }

                        
?>


    
</body>
<?php   require_once("homepageFooter.php");
?>
</html>
