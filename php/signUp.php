<?php

include_once 'header.php';


?>
<div class="mainText">
    <h2>Sign Up</h2>
    <form action="../includes/signUp.inc.php" method="POST" class="form">
        <input type="text" name="name" placeholder="Please enter Your Name">
        <input type="email" name="email" placeholder="Please enter Your Email">
        <input type="text" name="Uid" placeholder="Please enter Your user Name">
        <input type="password" name="pwd" placeholder="Please enter Your password">
        <input type="password" name="pwdrepeat" placeholder="Please repeat the password">
        <button type="submit" name="submit" class="SubBtn">Sign Up</button>
    </form>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>fill all fileds</p>";
        } else if ($_GET["error"] == "invalidUid") {
            echo "<p>choose a proper username!</p>";
        } else if ($_GET["error"] == "passwordMustMatch") {
            echo "<p>choose a password That Match!</p>";
        } else if ($_GET["error"] == "stmtfailed") {
            echo "<p>Something went Wrong try Again!</p>";
        } else if ($_GET["error"] == "none") {
            echo "<p>You Have SignUp :)</p>";
        } else if ($_GET["error" == "invalidEmail"]) {
            echo "<p>choose a proper Email!</p>";
        }
    };
    ?>
</div>



<?php

include_once 'footer.php';


?>