
<?php
session_start();
header('Cache-Control: no-cache');
header('Pragma: no-cache');
  if (!isset($_SESSION["Name"]) or !isset($_SESSION["EmailAddress"]) or !isset($_SESSION["PostCode"]) or !isset($_SESSION["PhoneNumber"])
  or !isset($_SESSION["PreferredContactMethod"])  )
//or(!isset($_SESSION["$ContactTime[0])"]) and $_SESSION["PreferredContactMethod"] =="Phone")

  {
  header("Location: CustomerInfo.php");
  exit();
  }

?>
<?php include("./Lab4Common/Header.php"); ?>
<?php include("./Lab4Common/Footer.php"); ?>
<?php include("./Lab4Common/Functions.php"); ?>


<div id="DivContent1" >
    <div class="text-center"><h3>Enter the principal amount, interest rate and number of years to deposit</h3></div>
    <form method = "post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="container">
            <div class="row">
                <table class="table">
                    <tbody>
                        <tr>
                    <div class="col-sm-4"><td>Principal amount:</td></div><div class="col-sm-4"><td><input type = "text" name = "PrincipalAmount" /></td></div><div class="col-sm-4"><td class="text-danger"><?php echo $PrincipalAmountError; ?></td></div>
                    </tr>
                    <tr>
                        <td>Interest rate(%):</td><td><input type = "text" name = "InterestRate" /></td><td class="text-danger"><?php echo $InterestRateError; ?></td>
                    </tr>
                    <tr>
                        <td>Years to deposit:</td><td>
                            <select name = "YearsToDeposit">
                                <option >Select...</option>
                                <option value=20 >20</option>
                                <option value=19 >19</option>
                                <option value=18 >18</option>
                                <option value=17>17</option>
                                <option value=16>16</option>
                                <option value=15>15</option>
                                <option value=14 >14</option>
                                <option value=13>13</option>
                                <option value=12>12</option>
                                <option value=11>11</option>
                                <option value=10>10</option>
                                <option value=9 >9</option>
                                <option value=8 >8</option>
                                <option value=7>7</option>
                                <option value=6>6</option>
                                <option value=5>5</option>
                                <option value=4 >4</option>
                                <option value=3>3</option>
                                <option value=2>2</option>
                                <option value=1>1</option>
                            </select></td><td class="text-danger"><?php echo $YearsToDepositError; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container">   <input type = "submit" name = "btnSubmit" value = "Calculate" class="btn-lg btn-success"/> <input type = "submit" value = "Clear" class="btn-lg"/></div>

    </form>
</div>

<?php
extract($_POST);
$PrincipalAmountError = "";
$InterestRateError = "";
$YearsToDepositError = "";
if (isset($btnSubmit)) {
    if (ValidatePrincipal($PrincipalAmount) == false) {
        $PrincipalAmountError = "Principal Amount must be numeric and greater than zero";
    } else {
        $PrincipalAmountError = "";
    }
    if (ValidateRate($InterestRate) == false) {
        $InterestRateError = "Interest Rate must be numeric and not negative";
    } else {
        $InterestRateError = "";
    }
    if (ValidateYears($YearsToDeposit) == false) {
        $YearsToDepositError = "Number of years to deposit must be a numeric between 1 and 20";
    } else {
        $YearsToDepositError = "";
    }
}
if (isset($btnSubmit) and ! $PrincipalAmountError and ! $InterestRateError and ! $YearsToDepositError) {

    print <<<EOS
<div class="container">
<H3>Following is the result of calculation</H3>
<table class="table table-bordered">
         <tr>
            <td class = "name" >Year </td>
            <td class = "email">Principal at Year Start</td>
            <td class = "phone">Interest for the Year</td>
         </tr>
         <tr>
EOS;
    for ($i = 1; $i <= $YearsToDeposit; $i++) {
        $Interest = ($PrincipalAmount * $InterestRate) / 100;
        printf("<tr><td>$i</td><td>%1\$.2f</td><td>%2\$.2f</td></tr>", $PrincipalAmount, $Interest);
        $PrincipalAmount = $PrincipalAmount + $Interest;
    }
    print <<<EOS
</tr>
</table>
</div>
EOS;
}
?>