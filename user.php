<?php
class User{
    // database connection and table name
    private $conn;
    private $table_name = "students";

    // object properties
    public $UserID;
    public $fname;
    public $login;
    public $lname;
    public $email;
    public $role;
    public $password;
    public $cpassword;
    public $dob;
    public $gender;
    public $errUser;
    public $errEmail;
    public $errPass;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // signup user
    function signup(){
        if($this->emailAlreadyExist()){
            $this->errEmail = true;
            return false;
        }
        if ($this->password != $this->cpassword){
            $this->errPass = true;
            return false;
        }
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    fname=:fname, lname=:lname, dob=:dob, gender=:gender, email=:email, password=:password, role=:role";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->fname=htmlspecialchars(strip_tags($this->fname));
        $this->lname=htmlspecialchars(strip_tags($this->lname));
        $this->gender=htmlspecialchars(strip_tags($this->gender));
        $this->dob=htmlspecialchars(strip_tags($this->dob));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->role=htmlspecialchars(strip_tags($this->role));
        $this->password=htmlspecialchars(strip_tags($this->password));

        // bind values
        $stmt->bindParam(":fname", $this->fname);
        $stmt->bindParam(":lname", $this->lname);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":dob", $this->dob);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":role", $this->role);
        $stmt->bindParam(":password", $this->password);

        // execute query
        if($stmt->execute()){
            $this->UserID = $this->conn->lastInsertId();
            return true;
        }else{
            return false;
        }
    }
    // login user
    function login(){
        //Select all Query
        $query = "SELECT
                    `UserID`,`fname`, `lname`, `email`, `role`, `password`
                FROM
                    " . $this->table_name . " 
                WHERE
                    email='".$this->login."' AND password='".$this->password."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }
    function user(){
        //Select all Query
        $query = "SELECT `UserID`, `email`, `password`,`role`,`created`,
                    FROM  . $this->table_name . ";

         // prepare query statement
         $stmt = $this->conn->prepare($query);
         // execute query
         $stmt->execute();
         return $stmt;

    }
    function allusers(){
        //Select all Query
        $query = "SELECT
                    *
                FROM
                    " . $this->table_name;
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }
    //Validation Functions
    
    function emailAlreadyExist(){
        $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                email='".$this->email."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}
?>