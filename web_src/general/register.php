<?php
$pageName = "Registration page";

require "../includes/functions.php";
require "../includes/head.php";

?>
<body>
<?php
     require "../includes/navbar.php";
?>
    <br>

    <div class="add">
        <div id="welcome-text">Register</div>
        <div id="basicContainer">
            
        <!-- Registration Form -->
        <form action="../../data_src/api/admin/create.php" method="post" style= "text-align: left">
            <label for="username"><b>Username: </b></label>
            <input type="text" placeholder="Enter Username" name="username" id="username" required>

            <label for="password"><b>Password: </b></label>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>

            <input type ="submit" value="Register">
        </form>
        </div>
    </div>

    </body>
</html>