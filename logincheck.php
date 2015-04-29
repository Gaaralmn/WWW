<html>
    <head>
        <title>Login</title>
    </head>
</html>
<?php  
    if(isset($_POST["submit"]) && $_POST["submit"] == "Login")  
    {  
        $user = $_POST["username"];  
        $psw = $_POST["password"];  
        if($user == "" || $psw == "") {  
            echo "<script>alert('Please enter username and password to Login!'); history.go(-1);</script>";  
        }  
        else {  
            $conn = new mysqli("127.0.0.1","root","root", "myPinterest");    
            if ($conn->connect_error) die("Couldn't connect to database!".$conn->connect_error);
            $query = "select user_name,password from users where user_name = '$_POST[username]' and password = '$_POST[password]'"; 
            $result = $conn->query($query);  
            if(!$result) die ($conn->error);  
            $rows = $result->num_rows;
            if ($rows > 0) {
            	echo "Successfully Login!";
            } else {
            	echo "<script>alert('Username or Password is incerrect!'); history.go(-1);</script>";
            } 
            $result->close();
            $conn->close();
        }  
    }  
    else {  
        echo "<script>alert('Please enter username and password to Login！'); history.go(-1);</script>";  
    }  
  
?>  