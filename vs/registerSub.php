<?php
      require_once '../includes/dbOperations.php';
      $response = array();

      if($_SERVER['REQUEST_METHOD']=='POST'){
        if(
          isset ($_POST['password']) and
          isset ($_POST['fname']) and
          isset ($_POST['surname']) and
          isset ($_POST['otherName']) and
          isset ($_POST['dob']) and
          isset ($_POST['telNo']) and
          isset ($_POST['office'])
          )
          {
            //operate the data further
            $db = new dbOperations();
            if($db->createSub(
              $_POST['password'],
              $_POST['fname'],
              $_POST['surname'],
              $_POST['otherName'],
              $_POST['dob'],
              $_POST['telNo'],
              $_POST['office'])
              )
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


      echo json_encode($response);
