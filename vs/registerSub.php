<?php
      require_once '../includes/dbOperations.php';
      $response = array();

      if($_SERVER['REQUEST_METHOD']=='POST'){
        if(

          isset ($_POST['fName']) and
          isset ($_POST['surname']) and
          isset ($_POST['otherName']) and
          isset ($_POST['dob'])and
          isset ($_POST['sex'])and
          isset ($_POST['telNo']) and
          isset ($_POST['office']/* and
          isset ($_POST['password']*/)
          )
          {
            //operate the data further
            $db = new dbOperations();
            if($db->createSub(

              $_POST['fName'],
              $_POST['surname'],
              $_POST['otherName'],
              $_POST['dob'],
              $_POST['sex'],
              $_POST['telNo'],
              $_POST['office']/*,
              $_POST['password']*/))



              {
                $response['error'] = false;
                $response['message']= "User registered successfully";
              }
          }
          else{
            $response['error'] = true;
            $response['message']= "Required fields are mising";}
          }
        else
        {$response['error'] = true;
        $response['message']= "Invalid Request";}


      //  print_r($response);

      echo json_encode($response);


/*        require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
require '/usr/share/php/libphp-phpmailer/class.smtp.php';
$mail = new PHPMailer;
$mail->setFrom('nhis.proj@gmail.com');
$mail->addAddress('danlarteygh@gmail.com');
$mail->Subject = 'Your Temporary NHIS Password';
$mail->Body = 'Hello! use PHPMailer to send email using PHP';
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl';
$mail->Host = 'ssl://smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Port = 465;

//Set your existing gmail address as user name
$mail->Username ='nhis.proj@gmail.com';

//Set the password of your gmail address here
$mail->Password = 'wtfyouherefor';
if(!$mail->send()) {
  echo 'Email is not sent.';
  echo 'Email error: ' . $mail->ErrorInfo;
} else {
  echo 'Email has been sent.';
}*/
?>
