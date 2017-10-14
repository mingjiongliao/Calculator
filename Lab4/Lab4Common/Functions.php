<?php

function ValidatePrincipal($amount1) {
    if (is_numeric($amount1) and $amount1 > 0) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function ValidateRate($amount2) {
    if (is_numeric($amount2) and $amount2 >= 0) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function ValidateYears($years) {
    if ($years >= 1 and $years <= 20) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function ValidateName($name) {
    if (!empty($name)) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function ValidatePostalCode($postalCode) {
    $postalCodeRegex = "/[a-z][0-9][a-z]\s*[0-9][a-z][0-9]/i";
    if (preg_match($postalCodeRegex, $postalCode)) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function ValidatePhone($phone) {
    $PhoneNumberRegex = "/[2-9][0-9][0-9][2-9][0-9][0-9][0-9][0-9][0-9][0-9]/i";
    if (preg_match($PhoneNumberRegex, $phone)) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function ValidateEmail($email) {
    $EmailAddressRegex = "/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/";
    if (preg_match($EmailAddressRegex, $email)) {
        return TRUE;
    } else {
        return FALSE;
    }
}
?>