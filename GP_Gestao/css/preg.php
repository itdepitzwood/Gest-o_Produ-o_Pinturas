<!DOCTYPE html>
<html>
<body>

<?php
$str = "Welcome to W3Schools";
$pattern = "/w3schools/i";
preg_match($pattern, $str, $matches, PREG_OFFSET_CAPTURE);
print_r($matches);
?> 

</body>
</html>