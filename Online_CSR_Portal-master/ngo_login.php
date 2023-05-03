<!DOCTYPE html>
<html>
  <head>
    <title>LOGIN</title>
  </head>
  <link href="login.css" rel="stylesheet" />
    
  <style>
  ul.breadcrumb {
  padding: 10px 16px;
  list-style: none;
  text-align: right;
  /* background-color: #eee; */
  margin-top: 10px;
}
ul.breadcrumb li {
  display: inline;
  font-size: 14px;
  color: #fff;
  
}
ul.breadcrumb li+li:before {
  padding: 8px;
  color: #fff;
  content: "/\00a0";
}
ul.breadcrumb li a {
  color: #fff;
  text-decoration: none;
}
ul.breadcrumb li a:hover {
  color: #113448;
  text-decoration: none;
}

.login{
  padding-bottom: 100px;
}

  </style>
  <body>
    
    <ul class="breadcrumb">
      <li><a href="home.html">Home</a></li>
      <li><a href="select.html">Login</a></li>
      <li id="l">NGO Login</li>
    </ul>
    <div class="container" id="container">
        <div class="overlay-container">
            <div class="overlay">
              <div class="overlay-panel overlay-right">
                <img src="https://c8.alamy.com/comp/2C7453W/bosnian-muslims-receive-aid-from-a-british-ngo-who-had-travelled-from-the-uk-in-convoy-during-the-conflict-in-1994-2C7453W.jpg" alt="">
              </div>
            </div>
          </div>
      <div class="form-container sign-in-container">
        <form  method="post" action="">
          <h1>Log In</h1>
          <div class="social-container">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
          </div>
          <input type="uname" placeholder="Username" name="username" />
          <input type="password" placeholder="Password" name="password" />
          <button name="submit">Login</button>     
          <div class="login">
      <h4>NEW USER? <a href="ngo_registration.php" style="color: rgb(80, 200, 120);text-decoration: none;">Register</a></h4>
      
      </div>  
        </form>
        
      </div>
      
    </div>
    
  </body>
</html>
<?php
$servername = "localhost"; 
$username = "root"; 
$password = "";
$dbname = "csr";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error); }

if(isset($_POST['submit']))
{
  $username=$_POST['username'];
  $password=$_POST['password'];
  $sql="select username,password from NGO where username='$username' && password='$password'";
  $result = mysqli_query($conn,$sql);
  $row  = mysqli_fetch_array($result);
  if(is_array($row)) 
  {
    $_SESSION["username"] = $row['username'];
    $_SESSION["password"] = $row['password'];
    echo "Logged in successfully";
    } 
    else {
      echo "<br/><br /><br />";
    echo "Invalid Username or Password!";
    }
    if(isset($_SESSION["username"])) 
    {
      header("Location:index.php");
      }
}




?>