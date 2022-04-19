<?php
include('connect.php');
    class User {
        public $userName;
        public $password;
        public $repeatpass; 


        function __construct($userName, $password, $repeatpass = ''){
            $this->userName = $userName;
            $this->password = $password;
            $this->passrepeat =$repeatpass;
        }
        public function insertUSer() {
            $stmp = new dataBase('root');
            $conn = $stmp->connect();
            $conn = $conn->prepare("INSERT INTO user(username, password) VALUES (:username, :password)");
            $conn->bindParam(":username", $this->userName);
            $conn->bindParam(":password", $this->password);
            

            if(!$conn->execute()) {
                $conn = NULL;
                header("location:index.php?error=stmtfailed");
                exit();
            }
        }
        public function login() {
            $stmp = new dataBase('root');
            $conn = $stmp->connect();

            $conn = $conn->prepare('SELECT * FROM user WHERE username=:username');
            $conn->bindParam(":username", $this->userName);
            $conn->execute();

            $result = $conn->fetch(PDO::FETCH_ASSOC);
            if($result) {
                if($result['password'] == $this->password) {
                    $_SESSION['user_id'] = $result['id'];
                    $_SESSION['name'] = $result['username'];
                    return true;
                } else {
                    return false;
                }
            return false;
            }
        }
        public function checkUser($userName, $password) {
            $stmp = new dataBase('root');
            $conn = $stmp->connect();
            $conn = $conn->prepare('SELECT id FROM user WHERE username = :userName AND password = :password;');
            $conn->bindParam(":username", $userName);
            $conn->bindParam(":password", $password);

            // header('location:pages/acceil.php');
            if($conn->execute()) {
                $count= $stmt->rowCount();
                print_r($count);
            } else {
                echo "hello";
                // $conn = NULL;
                // header("location:index.php?error=stmtfailed");
                // exit();
            }
        }
        public function emptyInput(){
            $result="";
            if(empty($this->userName)|| empty($this->password) || empty($this->passrepeat)){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }
        public function invalidUser(){
            $result="";
            if(!preg_match("/^[a-zA-Z0-9]*$",$this->userName)){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }
        // private function invalidEmail(){
        //     $result="";
        //     if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
        //         $result = false;
        //     }
        //     else{
        //         $result = true;
        //     }
        // }
        public function pswdMatch(){
            $result="";
            if($this->password != $this->passrepeat){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }
    }
?>