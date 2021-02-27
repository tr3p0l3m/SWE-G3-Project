<?php 
class books{
    private $conn;
    private $table_name = "books";

    public $BookID;
    public $title;
    public $category;
    public $author;
    public $book_image;
    public $book_status;

    public function __construct($db){
        $this->conn = $db;
    }

    function allbooks(){
        $query = "SELECT
                    *
                FROM
                books";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    
    }

    function Overduebooks(){
        //Select all Query
        $query =  "SELECT 
                    *
                FROM
                    borrowed_books
                RIGHT JOIN books ON borrowed_books.BookID = books.BookID 
                WHERE CURDATE() > borrowed_books.Expected_ReturnDate";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }

    function message(){
        //Select all Query
        $query =  "SELECT 
                    *
                FROM
                    messages
                RIGHT JOIN books ON messages.BookID = books.BookID 
                WHERE CURDATE() > borrowed_books.Expected_ReturnDate";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }


    function DayBooks(){
        //Select all Query
        $query = "SELECT
                    *
                FROM
                    borrowed_books 
                WHERE               
                Expected_ReturnDate = CURDATE()";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }
    function BorrowedBooks(){
        //Select all Query
        $query = "SELECT * FROM borrowed_books";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }

    function DayBooksDisplay(){
        //Select all Query
        $query =  "SELECT 
                    *
                FROM
                    borrowed_books
                RIGHT JOIN books ON borrowed_books.BookID = books.BookID 
                WHERE borrowed_books.Expected_ReturnDate= CURDATE()";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }

    function getStudentDetails(){
        $query =  "SELECT
                    *
                FROM
                    borrowed_books
                RIGHT JOIN books ON borrowed_books.BookID = books.BookID 
                WHERE borrowed_books.Expected_ReturnDate= CURDATE()";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }


    function getStudentBooks(){
        $UserID = $_SESSION['UserID'];
        $query =  "SELECT Borrowed_books.BookID, Borrowed_books.Expected_ReturnDate, Borrowed_books.Date_Borrowed, Books.Title,
        Books.Category, Books.Author, Books.Book_Status, Books.Book_image
        FROM Borrowed_books
        RIGHT JOIN Books
        ON Borrowed_books.BookID = Books.BookID
        WHERE Borrowed_books.UserID = '$UserID'";
         // prepare query statement
         $stmt = $this->conn->prepare($query);
         // execute query
         $stmt->execute();
         return $stmt;

    }
    function getDates(){
        $UserID = $_SESSION['UserID'];
        $query = "SELECT
                *
            FROM
            borrowed_books WHERE UserID =".$UserID."";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;  
    }

    function InsertBook(){
        // query to insert record
        $query = "INSERT INTO `books`(`Title`, `Category`, `Author`, `Quantity`, `Book_status`) 
        VALUES ('$this->title','$this->category','$this->author','$this->quantity','$this->book_status')";

        // prepare query
        $stmt = $this->conn->prepare($query);
        
        // execute query
        if($stmt->execute()){
            $this->BookID = $this->conn->lastInsertId();
            return true;
        }else{
            return false;
        }
    }

    function displayBook($bookid){
        $query = "SELECT
                *
            FROM
            Books WHERE BookID =".$bookid."";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;  
    }



}

?>
