<?php
      class dbOperations{
        private $con;
        function __construct(){
          require_once dirname(__FILE__).'/dbConnect.php';
          $db= new dbConnect();
          $this->con= $db->connect();

        }
        /*CRUD -> C -> CREATE  */
      function createSub($fname, $surname, $otherName/*,$password, $dob,$telNo,$office*/){
          $stmt = $this->con->prepare("INSERT INTO `subscriber` (  `fname`, `surname`, `otherName`/*, `password`, `dob`, `telNo`, `office`, `sex`*/) VALUES ( ?, ?, ?/*, ?, ?, ?, ?, ?*/)");
        $stmt->bind_param("sss", $fname, $surname, $otherName /*, $password,$dob, $telNo, $office, $sex*/ );
          if($stmt->execute()){
            return true;
          }
          else{
            return false;
              }
  }
      }
 ?>
