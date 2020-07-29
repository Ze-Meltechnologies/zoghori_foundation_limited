
<div class="w3-container w3-third">
    <h2>SIGN UP FOR AN ACCOUNT:</h2>

    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button>

    <div id="id01" class="modal">
                <span onclick="document.getElementById('id01').style.display='none'" class="close"
                      title="Close Modal">&times;</span>

        <?php
        // Enter your Host, username, password, database below.
        // I left password empty because i do not set password on localhost.
        $con = mysqli_connect("localhost","root","","register");
        // Check connection
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        // If form submitted, insert values into the database.
        if (isset($_REQUEST['username'])){
            // removes backslashes
            $username = stripslashes($_REQUEST['username']);
            //escapes special characters in a string
            $username = mysqli_real_escape_string($con,$username);
            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($con,$email);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con,$password);
            $trn_date = date("Y-m-d H:i:s");
            $query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
            $result = mysqli_query($con,$query);
            if($result){
                echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
            }
        }else{
        ?>
        
        <form class="modal-content" action="#">
            <div class="container">
                <h1 style="text-align: center; text-transform: uppercase;">Sign Up</h1>
                <p style="text-align: center; text-transform: uppercase;"><b>Please fill in this form to create an account.</b></p>
                <hr>
                <label for="Name">Full Name:</label><br>
                <input type="text" id="name" name="username" placeholder="Enter Your Full Names here" required><br>
                <label for="email"><b>Email</b></label>
                <input type="text" id="mail" placeholder="Enter Email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" id="psswd" placeholder="Enter Password" name="password" required>

                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password"  placeholder="Repeat Password" name="psw-repeat" required>

                <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px">
                    Remember me
                </label>

                <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms &
                        Privacy Conditions</a>.</p>

                <div class="clearfix">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'"
                            class="cancelbtn">Cancel</button>
                    <button type="submit" class="signupbtn" id="signup">Sign Up</button>
                </div>
            </div>
            <div class="container sign-in">
                <p>Already have an account? <a href="login.php">Login</a>.</p>
            </div>
        </form>

    </div>


    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <style>
        /* Full-width input fields */
        .modal  input[type=text],.modal input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        /* Add a background color when the inputs get focus */
        .modal input[type=text]:focus,
        .modal input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for all buttons */
         button {
            background-image: linear-gradient(to top left,#ff8a00,#e52e71) !important;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .modal   button:hover {
            opacity: 1;
        }

        /* Extra styles for the cancel button */
        .modal   .cancelbtn {
            padding: 14px 20px;
            background-color: #f44336;
        }

        /* Float cancel and signup buttons and add an equal width */
        .modal   .cancelbtn,
        .modal    .signupbtn {
            float: left;
            width: 50%;
        }

        /* Add padding to container elements */
        .modal     .container {
            padding: 16px;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: #474e5d;
            padding-top: 50px;
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }

        /* Style the horizontal ruler */
        .modal  hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* The Close Button (x) */
        .close {
            position: absolute;
            right: 35px;
            top: 15px;
            font-size: 40px;
            font-weight: bold;
            color: #f1f1f1;
        }

        .close:hover,
        .close:focus {
            color: #f44336;
            cursor: pointer;
        }

        /* Clear floats */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        /* Change styles for cancel button and signup button on extra small screens */
        @media screen and (max-width: 300px) {

            .modal  .cancelbtn,
            .modal   .signupbtn {
                width: 100%;
            }
        }
    </style>
</div>
<?php
}
?>