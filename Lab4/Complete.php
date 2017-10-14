<?php

session_start();
if (!isset($_SESSION["Name"])and ! isset($_SESSION["EmailAddress"])) {
    print<<<EOS
    <h1>Thank you, for using our deposit calculator!</h1>
EOS;
}
if (isset($_SESSION["Name"])and isset($_SESSION["EmailAddress"])) {
    $yourname = $_SESSION["Name"];
    $youremail = $_SESSION["EmailAddress"];
    print<<<EOS
<h1>Thank you, $yourname, for using our deposit calculator!</h1>
<h3>An email about the details of our GIC has been sent to $youremail</h3>
EOS;
}


session_destroy();
?>
<?php include("./Lab4Common/Header.php"); ?>
<?php include("./Lab4Common/Footer.php"); ?>
<?php include("./Lab4Cosmmon/Functions.php"); ?>
