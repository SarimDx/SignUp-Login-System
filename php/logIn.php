<?php

include_once 'header.php';


?>

<div class="mainText">
    <h2>Login</h2>
    <form action="../includes/logIn.inc.php" method="POST" class="form">
        <input type="text" name="Uid" placeholder="Your Name / Your Email">
        <input type="password" name="password" placeholder="Please enter Your password">
        <button type="submit" name="submit" class="SubBtn">Login</button>
    </form>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>fill all fileds</p>";
        } else if ($_GET["error"] == "wronglogin") {
            echo "<p>choose a login information doesnt exist please check again if  your correct</p>";
        }
    };
    ?>
</div>

<?php

include_once 'footer.php';


?>