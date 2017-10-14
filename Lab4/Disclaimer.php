<?php
session_start();
?>
<?php
$warming = "";
if (isset($_POST['start'])) {
    if (isset($_POST['terms'])) {
        $_SESSION['terms'] = $_POST['terms'];
        Header("Location: CustomerInfo.php");
        exit();
    } else {
        $warming = "You must agree the terms and conditions!";
    }
}
?>


<div class="container">
    <H1>Terms and Conditions</H1><br>
    <img src="./Lab4Contents/img/img.bmp" alt="terms and conditions"><br><br>
    <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="Post">
        <span><?php echo $warming ?><br></span>

        <input type="checkbox" name="terms" value="t&c"> I have read and agree with the terms and conditions<br>
        <input type="submit" class="button" name="start" value="Start"/>
    </form>
</div>
<?php include("./Lab4Common/Header.php"); ?>
<?php include("./Lab4Common/Footer.php"); ?>
<?php include("./Lab4Common/Functions.php"); ?>
