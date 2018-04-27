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
          $stmt = $this->con->prepare("INSERT INTO `subscriber` (  `fname`, `surname`, `otherName`, `dob`, `sex`, `telNo`, `office`/*,`password`*/) VALUES ( ?, ?, ?, ?, ?, ?, ?/*, ?*/)");
        $stmt->bind_param("sssssss", $fname, $surname, $otherName, $dob, $sex, $telNo, $office/*, $password*/ );
          if($stmt->execute()){
            return true;
          }
          else{
            return false;
              }
  }

public function subLogin($id, $telNo){
  //  $password = md5($pass);
    $stmt = $this->con->prepare("SELECT id FROM subscriber WHERE id = ? AND telNo = ?");
    $stmt->bind_param("ss",$id,$telNo);
    $stmt->execute();
    $stmt->store_result();
    return $stmt->num_rows > 0;
  }

  public function getSubByID($id){
    $stmt = $this->con->prepare("SELECT * FROM subscriber WHERE id = ?");
    $stmt->bind_param("s",$id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
  }

       private function isSubExist(){
          $stmt = $this->con->prepare("SELECT id FROM subscriber WHERE telNo = ? OR fName = ? OR surname=? OR dob=? OR otherName=? OR sex=? OR office=? ");
        }
      }


 ?>
