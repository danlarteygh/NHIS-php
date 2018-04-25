<?php
      class dbOperations{
        private $con;
        function __construct(){
          require_once dirname(__FILE__).'/dbConnect.php';
          $db= new dbConnect();
          $this->con= $db->connect();

        }
        /*CRUD -> C -> CREATE  */
      public function createSub($fname, $surname, $otherName, $dob, $sex, $telNo,$office/*,$password*/){
         $dob = implode("-", array_reverse(explode(".", $dob)));
          $stmt = $this->con->prepare("INSERT INTO `subscriber` (  `fname`, `surname`, `otherName`, `dob`, `sex`, `telNo`, `office`/*, `password`*/) VALUES ( ?, ?, ?, ?, ?, ?, ?/*, ?*/)");
        $stmt->bind_param("sssssss", $fname, $surname, $otherName, $dob, $sex, $telNo, $office /*, $password*/ );
          if($stmt->execute()){
            return true;
          }
          else{
            return false;
              }
  }
       private function isSubExist(){
          $stmt = $this->con->prepare("SELECT id FROM subscriber WHERE telNo = ? OR fName = ? OR surname=? OR dob=? OR otherName=? OR sex=? OR office=? ");
        }
      }
/*
strtotime()
str_replace(‘/’,’-‘,$d)
*/

 ?>
