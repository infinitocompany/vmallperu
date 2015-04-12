<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
     "http://www.w3.org/TR/html4/strict.dtd">
<?php
function rpHash($value) { 
    $hash = 5381; 
    $value = strtoupper($value); 
    for($i = 0; $i < strlen($value); $i++) { 
        $hash = (leftShift32($hash, 5) + $hash) + ord(substr($value, $i)); 
    } 
    return $hash; 
} 
// Perform a 32bit left shift 
function leftShift32($number, $steps) { 
    // convert to binary (string) 
    $binary = decbin($number); 
    // left-pad with 0's if necessary 
    $binary = str_pad($binary, 32, "0", STR_PAD_LEFT); 
    // left shift manually 
    $binary = $binary.str_repeat("0", $steps); 
    // get the last 32 bits 
    $binary = substr($binary, strlen($binary) - 32); 
    // if it's a positive number return it 
    // otherwise return the 2's complement 
    return ($binary{0} == "0" ? bindec($binary) : 
        -(pow(2, 31) - bindec(substr($binary, 1)))); 
} 
?>
<html>
<head>
<title>jQuery Real Person Submission</title>
<style type="text/css">
.accepted { padding: 0.5em; border: 2px solid green; }
.rejected { padding: 0.5em; border: 2px solid red; }
</style>
</head>
<body>
<h1>jQuery Real Person Submission</h1>
<?php
if (rpHash($_POST['defaultReal']) == $_POST['defaultRealHash']) {
?>
<p class="accepted">You have entered the "real person" value correctly and the form has been processed.</p>
<?php
} else {
?>
<p class="rejected">You have NOT entered the "real person" value correctly and the form has been rejected.</p>
<?php
}
?>
</body>
</html>
