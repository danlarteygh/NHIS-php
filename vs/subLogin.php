<?php
      require_once '../includes/dbOperations.php';
      $response = array();

      if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['id']) and isset($_POST['telNo'])){
      		$db = new dbOperations();

      		if($db->subLogin($_POST['id'], $_POST['telNo'])){
      			$user = $db->getSubByID($_POST['id']);
      			$response['error'] = false;
      			$response['id'] = $user['id'];
      			$response['fName'] = $user['fName'];
      			$response['surname'] = $user['surname'];
            $response['otherName'] = $user['otherName'];
      			$response['telNo'] = $user['telNo'];
      			$response['dob'] = $user['dob'];
            $response['office'] = $user['office'];
      			$response['sex'] = $user['sex'];
      		}else{
      			$response['error'] = true;
      			$response['message'] = "Invalid membership ID or Telephone Number";
      		}

      	}else{
      		$response['error'] = true;
      		$response['message'] = "Required fields are missing";
      	}
      }

      echo json_encode($response);
