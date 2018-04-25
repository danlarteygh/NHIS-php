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
          isset ($_POST['office'])
          /*and
          isset ($_POST['password']) */
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
              $_POST['office'])) /*,
              $_POST['password'],

               */

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
?>
