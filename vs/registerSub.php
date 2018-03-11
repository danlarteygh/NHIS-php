<?php
      require_once '../includes/dbOperations.php';
      $response = array();

      if($_SERVER['REQUEST_METHOD']=='POST'){
        if(
          isset ($_POST['password']) and
          isset ($_POST['name']) and
          isset ($_POST['dob']) and
          isset ($_POST['telNo']) and
          isset ($_POST['office'])
          )
          {
            //operate the data further
            $db = new dbOperations();
            if($db->createSub(
              $_POST['password'],
              $_POST['name'],
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
