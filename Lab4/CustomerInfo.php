<?php
session_start();
header('Cache-Control: no-cache');
header('Pragma: no-cache');
?>
<?php include("./Lab4Common/Header.php"); ?>
<?php include("./Lab4Common/Footer.php"); ?>
<?php include("./Lab4Common/Functions.php"); ?>
<?php
if (!isset($_SESSION["terms"])) {
    header("Location: Disclaimer.php");
    exit();
} else {
    $_SESSION["ContactTime[0]"] = $_POST['ContactTime[0]'];
    $_SESSION["PreferredContactMethod"] = $_POST['PreferredContactMethod'];
    $_SESSION["PhoneNumber"] = $_POST['PhoneNumber'];
    $_SESSION["PostCode"] = $_POST['PostCode'];
    $_SESSION["EmailAddress"] = $_POST['EmailAddress'];
    $_SESSION["Name"] = $_POST['Name'];
    extract($_POST);
    $NameError = "";
    $PostCodeError = "";
    $PhoneNumberError = "";
    $EmailAddressError = "";
    $ContactTimeError = "";
    $PreferredContactMethodError = "";
    if (isset($btnSubmit)) {
        if (ValidateName($Name) == false) {
            $NameError = "Name is required";
        } else {
            $NameError = "";
        }
        if (ValidatePostalCode($PostCode) == false) {
            $PostCodeError = "Incorrect post code";
        } else {
            $PostCodeError = "";
        }
        if (ValidatePhone($PhoneNumber) == false) {
            $PhoneNumberError = "Incorrect phone number";
        } else {
            $PhoneNumberError = "";
        }
        if (ValidateEmail($EmailAddress) == false) {
            $EmailAddressError = "Incorrect Email address";
        } else {
            $EmailAddressError = "";
        }
        if (!isset($PreferredContactMethod)) {
            $PreferredContactMethodError = "Please select one of the contact method";
        } else {
            $PreferredContactMethodError = "";
        }
        if ($PreferredContactMethod == "Phone" and ! isset($ContactTime[0])) {
            $ContactTimeError = "When a user select phone as his/her preferred contact method, he/she must select one or more contact times (morning, afternoon and/or evening)";
        } else {
            $ContactTimeError = "";
        }
        }
if (isset($btnSubmit) and !$NameError and !$PostCodeError and !$PhoneNumberError and !$EmailAddressError and !$ContactTimeError and !$PreferredContactMethodError) {
            header("Location:DepositCalculator.php");
            exit();
    }
    
}
?>

<div class = "text-center"><h2>Customer information</h2></div>
<form method = "post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class = "container">
        <div class = "row">
            <table class = "table">
                <tbody>
                    <tr>
                        <td>Name:</td><td><input type = "text" name = "Name"/></td><td class = "text-danger" value = $Name><?php echo $NameError; ?></td>
                    </tr>
                    <tr>
                        <td>Post code:</td><td><input type = "text" name = "PostCode"/></td><td class = "text-danger"><?php echo $PostCodeError; ?></td>
                    </tr>
                    <tr>
                        <td> Phone number:<br>(nnn-nnnn-nnn) </td><td><input type = "text" name = "PhoneNumber"/></td><td class = "text-danger"><?php echo $PhoneNumberError; ?></td>
                    </tr>
                    <tr>
                        <td>Email address:</td><td><input type = "text" name = "EmailAddress"/></td><td class = "text-danger"><?php echo $EmailAddressError; ?></td>
                    </tr>
                    <tr>
                        <td>Preferred contact method:</td> <td><input type = "radio" name = "PreferredContactMethod" value = "Phone" />Phone
                            <input type = "radio" name = "PreferredContactMethod" />Email</td><td class = "text-danger"><?php echo $PreferredContactMethodError; ?></td>
                    </tr>

                    <tr>
                        <td>If phone is selected, when can we contact you?<br>(check all applicable) </td><td><input type = "checkbox" name = "ContactTime[]" value = "Morning">Morning
                            <input type = "checkbox" name = "ContactTime[]" value = "Afternoon">Afternoon<input type = "checkbox" name = "ContactTime[]" value = "Evening">Evening</td><td class = "text-danger"><?php echo $ContactTimeError; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class = "container"> <input type = "submit" name = "btnSubmit" value = "Calculate" class = "btn-lg btn-success"/> <input type = "submit" value = "Clear" class = "btn-lg"/></div>

</form>
</div>


