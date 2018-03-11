<<?php
      class dbOperations{
        private $con;
        function __construct(){
          require_once dirname(__FILE__).'/dbConnect.php';
          $db= new dbConnect();
          $this->con= $db->connect();

        }
        /*CRUD -> C -> CREATE  */
        function createSub($password,$name,$dob,$telNo,$office){
          $stmt = $this->con->prepare("INSERT INTO `subscriber` ( `password`, `name`, `dob`, `telNo`, `office`) VALUES ( ?, ?, ?, ?, ?)");
          $stmt->bind_param("sssss",$password, $name, $dob, $telNo, $office );
          if($stmt->execute()){
            return true;
          }
          else{
            return false;
          }
  }


      }
 ?>
