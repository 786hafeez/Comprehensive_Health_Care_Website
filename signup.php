<?php

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  if (isset($_POST['register'])) {
  $Username = $_POST['Username'];
  $Email = $_POST['Email'];
  $Password = $_POST['Password'];

  // Perform any necessary validation on the form data here

  // Connect to the database
  $servername = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'tutorial';

  $conn = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
  }

  // Prepare and bind the SQL statement
  $stmt = $conn->prepare('INSERT INTO users (Username, Email, Password) VALUES (?, ?, ?)');
  $stmt->bind_param('sss', $Username, $Email, $Password);

  // Execute the statement
  if ($stmt->execute()) {
    header("Location: index.html");
    exit;
  } else {
    echo 'Error occurred while registering. Please try again.';
  }

 

  // Close the statement and the database connection
  $stmt->close();
  $conn->close();
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP </title>
    <style>
        legend{
            display:block;
            padding-left: 3px;
            padding-right: 4px;
            border: none;
        }
    </style>
    <script>
        function validate(){
            var un=document.getElementById("un");
            var uname=un.name;
            var pwd=document.getElementById("pwd");
            var paswd=pwd.value;
            var cpwd=document.getElementById("cpwd");
            var cpass=cpwd.value;
            var em=document.getElementById("em");
            var email=em.value;
            var m=document.getElementById("ph");
            var mobil=m.value;
            var unre=/^[a-zA-Z]+[0-9a-zA-Z._]*$/
            var ere=/^[a-zA-Z]+([\.]?\w+)*@\w+([\._]?\w+)*(\.\w{2,3})+$/
            var mre=/^[6-9][0-9]{9}$/
            var pwdre=/^(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=])
            if(unre.test(uname)) {
            if(ere.test(email)){
                if(pwdre.test(pass)){
                    if(cpass==pass){
                        if(mre.test(mobile)){
                            alert("done");
                            return  true;
                        }
                        else{
                        alert("invalid");
                        m.style.border="green solid 4px";
                        m,placeholder="invalid";
                        cpwd.value='';
                        cpwd.placeholder="invalid";
                        return false;
            }
        }
        else{
                        alert("invalid");
                        pwd.style.border="blue solid 4px";
                        pwd.placeholder="invalid";
                        pwd.value='';
                        pwd.placeholder="invalid";
                        return false;
            }
        }
        else{
                        alert("invalid");
                        em.style.border="green solid 4px";
                        em.placeholder="invalid";
                        em.value='';
                        em.placeholder="invalid";
                        return false;
            }
    }
    else{
                        alert("invalid");
                        un.style.border="green solid 4px";
                        un.placeholder="invalid";
                        un.value='';
                        un.placeholder="invalid";
                        return false;
            }
        }
    </script>
</head>
<body bgcolor="pink">
<center>
    <h1>SIGN UP</h1>
<form>
<fieldset style="width:400px">
    <legend>REGISTRATION FORM</legend>
    <table>
        <tr>
        <input type="text" id="un"  placeholder="USERNAME "required maxlength="20">
        </tr>
        <br><br>
        <tr>
        <input type="email" id="e" placeholder="EMAIL"required>
        </tr>
        <br><br>
        <tr>
        <input type="password" id="pwd" placeholder="PASSWORD"required maxlength="10">
        </tr>
        <br><br>
        <tr>
        <input type="password" id="cpwd" placeholder="CONFIRM"required maxlength="10">
        </tr>
        <br><br>
        <tr>
        <input type="text" id="ph" placeholder="MOBILE"required maxlength="10">
        </tr>
        <br><br>
        <tr>
            <label >GENDER:</label>
            <select  id="gender" required>
            <option value="select">select one </option>
            <option value="male">male</option>
            <option value="female">female</option>
            <option value="others">others</option>
           </select>
            </tr>
            <br><br>
            <tr><input type="submit" onclick="return validate()" value="SIGN UP" formaction="welcome.html">
            <tr><th>Already have an account?<a href="signin.html">SIGN IN </a></tr></th>

            </tr>
        </table>
    </fieldset>
</form>
</center>     
</body>
</html>
