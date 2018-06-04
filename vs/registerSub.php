<?php
      require_once '../includes/dbOperations.php';
      $response = array();

    /*  function pay(){
        global $errors;

        $url = 'https://client.teamcyst.com/api_call.php';

    //    $id    =  ($_POST['idnumber']);
        $price    =  ($_POST['price']);
        $sender    =  ($_POST['telNo2']);
        $network    =  ($_POST['network']);
        //$price="0.1";
        //$network = "tigo";
        //$sender ="0279801278";

        //make sure form is filled properly
    /*    if (empty($id)) {
               array_push($errors, "ID number is required");
        }
        if (empty($price)) {
               array_push($errors, "Amount is required");
        }
        if (empty($sender)) {
               array_push($errors, "Please Input your mobile number");
        }

        switch ( $network){
          case "tigo":
          $option ="rttt";
          $receipient_number="0279801278";
          break;

          case "mtn":
          $option ="rmtm";
          $receipient_number="0550515464";
          break;

          case "airtel":
          $option ="ratt";
          break;


        }


        //constant values

        //$option="rttt";//.substr($network,0,1);
         $apikey="f09c643722fad2dd5d45368ada11ffdabeb47bc8";



        $data=array(
          "price"=>$price,
          "network"=>$network,
          "receipient_number" =>$receipient_number,
          "sender"=>$sender,
          "option"=>$option,
          "apikey"=>$apikey

        );


        $additional_headers = array(
          'Content-Type: application/json'
        );

        $json_data = json_encode($data);
      //  echo $json_data;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data); // $data is the request payload
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

        $server_output = curl_exec ($ch);
        $obj = json_decode($server_output, TRUE);


    //    echo $server_output;


        curl_close($ch);
      }*/

      if($_SERVER['REQUEST_METHOD']=='POST'){
        if(

          isset ($_POST['fName']) and
          isset ($_POST['surname']) and
          isset ($_POST['otherName']) and
          isset ($_POST['dob'])and
          isset ($_POST['sex'])and
          isset ($_POST['telNo'])and
          isset ($_POST['office'])and
          isset ($_POST['pregnant'])and
          isset ($_POST['ssnitNo']/*)and
          isset ($_POST['network'])and
          isset ($_POST['telNo2'])and
          isset ($_POST['price']/* and
          isset ($_POST['password']*/)
          )
          {
            //operate the data further
            $db = new dbOperations();
            $result = $db->createSub(

              $_POST['fName'],
              $_POST['surname'],
              $_POST['otherName'],
              $_POST['dob'],
              $_POST['sex'],
              $_POST['telNo'],
              $_POST['office'],
              $_POST['pregnant'],
              $_POST['ssnitNo']/*,
              $_POST['network'],
              $_POST['telNo2'],
              $_POST['price']/*,
            $_POST['password']*/);

            if ($result==1)
            {
              //pay();
                $response['error'] = false;
                $response['message']= "User registered successfully";
              }
              elseif($result == 2){
			$response['error'] = true;
			$response['message'] = "Some error occurred please try again";
		}
    elseif($result == 0){
			$response['error'] = true;
			$response['message'] = "It seems you are already registered";
		}
          }
          else {
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
