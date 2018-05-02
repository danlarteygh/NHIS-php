<?php
include ('payment.php')

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TelMed Free Bootstrap HTML5 Template</title>
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
   
   
    <!-- =======================================================
    Theme Name: TelMed
    Theme URL: https://bootstrapmade.com/TelMed-free-medical-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
<form action="trypayment.php" method="post">
    <input type="text" name="idnumber" placeholder="idnumber"/><br>
    <input type="text" name="price" placeholder="price"/><br>
    <input type="text" name="sender" placeholder="sender"/><br>
    <input type="text" name="network" placeholder="network"/><br>
    <button type="submit" name="pay">Press</button>
</form>
</body>

</html>
