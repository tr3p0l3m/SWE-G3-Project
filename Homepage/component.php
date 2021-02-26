<?php 


$dbserver= "localhost";
$dbuser= "root";
$dbpassword = "";
$dbname = "SEG3";

//connect to database
$con = mysqli_connect($dbserver, $dbuser, $dbpassword, $dbname);

//if condition to return message if connection failed
if (!$con) {
	  die("Connection failed : " . mysqli_connect_error());
}


// get product from the database
function getData($tablename){

    global $con;

    $sql = "SELECT * FROM $tablename";

    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0) {
        return $result;
    } 
}
    function component($booktitle, $bookauthor, $bookimg, $bookid){
        // using a here doc to save html string in a variable and print it out later
        $element = "
        
        <div class=\"col-md-3 col-sm-6 my-3 my-md-10\">
                    <form action=\"homepage.php\" method=\"post\" onsubmit=\"return false;\">
                        <div class=\"card shadow\">
                            <div>
                                <img src=\"$bookimg\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                            </div>
                            <div class=\"card-body\">
                                <h5 class=\"card-title\">$booktitle</h5>
                                
                                    <h6>
                                    <span class=\"price\">$bookauthor</span>
                                </h6>
                                <button id=\"btn$bookid\" type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\" onclick=\"bookInfo('$bookid', this.id)\"><a href=\"selfservice.php?bid=$bookid\">More Info</a></button>
                                <input type='hidden' name='BookID' value='$bookid'>
                            </div>
                        </div>
                    </form>
                </div>
        "; 
        //printing the here doc
        echo $element;
    }
?>