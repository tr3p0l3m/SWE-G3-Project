
<?php
// include database and object files
define('ROOT_PATH', dirname(__DIR__) . '/./');

include_once(ROOT_PATH. "database.php");
include_once(ROOT_PATH."user.php");


// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$user = new User($db);

//Error messages to be displayed is login credentials are not corrects
$errorlogin = "Incorrect Login credentials";

//Set variables
$user->login = isset($_POST['email']) ? $_POST['email'] : die('error');
$user->password = base64_encode(isset($_POST['password']) ? $_POST['password'] : die('error'));

$stmt = $user->login();
if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    session_start();    
    $_SESSION['fname'] = $row['fname'];
    $_SESSION['lname'] = $row['lname'];
    $_SESSION['UserID'] = $row['UserID'];
    $_SESSION['role'] = $row['role'];

    
    if($row['role'] == 1){
        header("Location: mybooks.php");
    }
    if($row['role'] == 0){
        header('Location: ..\Admin\frontend\index.php');
    }
    
}
else{
    session_start();
    $_SESSION['m_email']= $user->login;
    $_SESSION["error"] = $errorlogin;
    header("location: loginpage.php");
}

?>
