<?php

global $errors;
//the make payment function
	if (isset($_POST['pay'])){
	pay();
	}


	function pay(){
		global $errors;

		$url = 'https://client.teamcyst.com/api_call.php';

		$id    =  ($_POST['idnumber']);
		$price    =  ($_POST['price']);
		$sender    =  ($_POST['sender']);
		$network    =  ($_POST['network']);
		//$price="0.1";
		//$network = "tigo";
		//$sender ="0279801278";

		//make sure form is filled properly
		if (empty($id)) {
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
		echo $json_data;

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data); // $data is the request payload
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

		$server_output = curl_exec ($ch);
		$obj = json_decode($server_output, TRUE);


		echo $server_output;


		curl_close($ch);}





?>
