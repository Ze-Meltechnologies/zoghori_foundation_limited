<?php
include ('header.php');
?>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: rgb(227, 168, 144);
    }
    form {
        border: 3px solid #f1f1f1;
    }

   input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

   button {
        background-color: rgb(5, 23, 62);
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        opacity: 0.8;
    }

    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #1c0659;
    }
/*
    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    img.avatar {
        width: 25%;
        border-radius: 20%;
    }
*/
    .container {
        padding: 16px;
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
        .cancelbtn {
            width: 100%;
        }
    }
</style>
<!--</head>
<body>-->


<?php
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
$con = mysqli_connect("localhost","root","","register");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

/*session_start();*/
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
    // removes backslashes
    $username = stripslashes($_REQUEST['username']);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($con,$username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    //Checking is user existing in the database or not
    $query = "SELECT * FROM `users` WHERE username='$username'
and password='".md5($password)."'";
    $result = mysqli_query($con,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    if($rows===1){
        $_SESSION['username'] = $username;
      /*  // Redirect user to index.php
        header("Location: index.php");*/
    }else{
        echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
    }
}
else{
?>

<form action="#" method="POST">
   <!-- <div class="imgcontainer">
        <img src="./assets/user.png" alt="Avatar" class="avatar">
    </div>-->

    <div class="container">
        <p>sign in to start your session</p>
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit">Login</button>
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember Me
        </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="reset" class="cancelbtn">Cancel</button>
        <span class="psw"><a href="#">Forgot password?</a></span>
    </div>
</form>
<br>


<!-- FOOTER
================================================== -->
<footer>
    <div class="footer-section">
        <p><strong>  &COPY; ZOGHORI FOUNDATION LIMITED &TRADE; 2020. ALL RIGHTS
                RESERVED &TRADE;
                DESIGNED BY: <a
                        href="#">MELTECHNOLOGIES LTD</a> </strong> </p>
    </div>
</footer>
<?php
}
?>
<!--
</body>-->

