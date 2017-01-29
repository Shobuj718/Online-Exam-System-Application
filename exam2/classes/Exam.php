<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

	class Exam{
		private $db;
		private $fm;
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function addQuestion($data){
			$quesNo = mysqli_real_escape_string($this->db->link,$data['quesNo']);
			$ques   = mysqli_real_escape_string($this->db->link,$data['ques']);
			$ans = array();
			$ans[1] = $data['ans1'];
			$ans[2] = $data['ans2'];
			$ans[3] = $data['ans3'];
			$ans[4] = $data['ans4'];
			$rightAns = $data['rightAns'];
			$query = "INSERT INTO new_tbl_ques(quesNo,ques) VALUES('$quesNo','$ques')";
			$insert_row = $this->db->insert($query);
			if($insert_row){
				foreach ($ans as $key => $ansName) {
					if($ansName != ''){
						if($rightAns == $key){
							$rquery = "INSERT INTO new_tbl_ans(quesNo,rightAns,ans) VALUES('$quesNo','1','$ansName')";
						}
						else{
							$rquery = "INSERT INTO new_tbl_ans(quesNo,rightAns,ans) VALUES('$quesNo','0','$ansName')";
						}
						$insertrow = $this->db->insert($rquery);
						if($insertrow){
							continue;
						}
						else{
							die("error..");
						}
					}
				}
				$msg = "<span class='success'>Question Added Succussfull...</span>";
				return $msg;
			}

		}


		public function addBcsQuestion($data){
			$quesNo = mysqli_real_escape_string($this->db->link,$data['quesNo']);
			$ques   = mysqli_real_escape_string($this->db->link,$data['ques']);
			$ans = array();
			$ans[1] = $data['ans1'];
			$ans[2] = $data['ans2'];
			$ans[3] = $data['ans3'];
			$ans[4] = $data['ans4'];
			$rightAns = $data['rightAns'];
			$query = "INSERT INTO new_bcs_tbl_ques(quesNo,ques) VALUES('$quesNo','$ques')";
			$insert_row = $this->db->insert($query);
			if($insert_row){
				foreach ($ans as $key => $ansName) {
					if($ansName != ''){
						if($rightAns == $key){
							$rquery = "INSERT INTO new_bcs_tbl_ans(quesNo,rightAns,ans) VALUES('$quesNo','1','$ansName')";
						}
						else{
							$rquery = "INSERT INTO new_bcs_tbl_ans(quesNo,rightAns,ans) VALUES('$quesNo','0','$ansName')";
						}
						$insertrow = $this->db->insert($rquery);
						if($insertrow){
							continue;
						}
						else{
							die("error..");
						}
					}
				}
				$msg = "<span class='success'>Question Added Succussfull.</span>";
				return $msg;
			}

		}


		public function addbankQuestion($data){
			$quesNo = mysqli_real_escape_string($this->db->link,$data['quesNo']);
			$ques   = mysqli_real_escape_string($this->db->link,$data['ques']);
			$ans = array();
			$ans[1] = $data['ans1'];
			$ans[2] = $data['ans2'];
			$ans[3] = $data['ans3'];
			$ans[4] = $data['ans4'];
			$rightAns = $data['rightAns'];
			$query = "INSERT INTO new_bank_tbl_ques(quesNo,ques) VALUES('$quesNo','$ques')";
			$insert_row = $this->db->insert($query);
			if($insert_row){
				foreach ($ans as $key => $ansName) {
					if($ansName != ''){
						if($rightAns == $key){
							$rquery = "INSERT INTO new_bank_tbl_ans(quesNo,rightAns,ans) VALUES('$quesNo','1','$ansName')";
						}
						else{
							$rquery = "INSERT INTO new_bank_tbl_ans(quesNo,rightAns,ans) VALUES('$quesNo','0','$ansName')";
						}
						$insertrow = $this->db->insert($rquery);
						if($insertrow){
							continue;
						}
						else{
							die("error..");
						}
					}
				}
				$msg = "<span class='success'>Question Added Succussfull.</span>";
				return $msg;
			}

		}



		public function getQueByOrder(){
			//$query     = "select * from tbl_ques where quesNo =' $number'";
			$query = "SELECT * FROM tbl_ques ORDER BY quesNo ASC";
			$result = $this->db->select($query);
			return $result;
		}

		public function getQueByOrderBcs(){
			//$query     = "select * from tbl_ques where quesNo =' $number'";
			$query = "SELECT * FROM bcs_tbl_ques ORDER BY quesNo ASC";
			$result = $this->db->select($query);
			return $result;
		}

		public function getQueByOrderBcstest(){
			//$query     = "select * from tbl_ques where quesNo =' $number'";
			$query = "SELECT * FROM tbl_ques ORDER BY quesNo ASC";
			$result = $this->db->select($query);
			return $result;
		}

		public function getQueByOrderBcstest1(){
			//$query     = "select * from tbl_ques where quesNo =' $number'";
			$query = "SELECT * FROM new_tbl_ques ORDER BY quesNo ASC";
			$result = $this->db->select($query);
			return $result;
		}

		public function getQueByOrderBank(){
			//$query     = "select * from tbl_ques where quesNo =' $number'";
			$query = "SELECT * FROM bank_tbl_ques ORDER BY quesNo ASC";
			$result = $this->db->select($query);
			return $result;
		}

		public function getQueByOrderNewBcs(){
			//$query     = "select * from tbl_ques where quesNo =' $number'";
			$query = "SELECT * FROM new_bcs_tbl_ques ORDER BY quesNo ASC";
			$result = $this->db->select($query);
			return $result;
		}

		public function getQueByOrderNewBank(){
			//$query     = "select * from tbl_ques where quesNo =' $number'";
			$query = "SELECT * FROM new_bank_tbl_ques ORDER BY quesNo ASC";
			$result = $this->db->select($query);
			return $result;
		}

		

		public function getQueByOrder1(){
			$query     = "select * from tbl_ques where quesNo between 11 and 20";
			//$query = "SELECT * FROM tbl_ques ORDER BY quesNo ASC";
			$result = $this->db->select($query);
			return $result;
		}

		public function delQuestion($quesNo){
			$tables = array("tbl_ques","tbl_ans");
			foreach ($tables as $table) {
				$delquery = "DELETE FROM $table WHERE quesNo = '$quesNo'";
				$deldata  = $this->db->delete($delquery);
			}
			if($deldata){
				$msg = "<span class='success'>Data Deleted Succesfully..</span>";
				return $msg;
			}
			else{
				$msg = "<span class='error'>Data Not Deleted !</span>";
				return $msg;
			}
		}   

		public function getTotalRaws(){
			$query     = "SELECT * FROM new_tbl_ques";
			$getResult = $this->db->select($query);
			$total     = $getResult->num_rows;
			return $total;

		}

		public function getTotalRawstest(){
			$query     = "SELECT * FROM tbl_ques";
			$getResult = $this->db->select($query);
			$total     = $getResult->num_rows;
			return $total;

		}

		public function getTotalRawstest1(){
			$query     = "SELECT * FROM new_tbl_ques";
			$getResult = $this->db->select($query);
			$total     = $getResult->num_rows;
			return $total;

		}

		public function getTotalBcsRaws(){
			$query     = "SELECT * FROM new_bcs_tbl_ques";
			$getResult = $this->db->select($query);
			$total     = $getResult->num_rows;
			return $total;

		}

		public function getTotalNewBcsRaws(){
			$query     = "SELECT * FROM new_bcs_tbl_ques";
			$getResult = $this->db->select($query);
			$total     = $getResult->num_rows;
			return $total;

		}

		public function getTotalBankRaws(){
			$query     = "SELECT * FROM new_bank_tbl_ques";
			$getResult = $this->db->select($query);
			$total     = $getResult->num_rows;
			return $total;

		}

		public function getTotalNewBcsRaws1(){
			$query     = "SELECT * FROM new_bcs_tbl_ques";
			$getResult = $this->db->select($query);
			$total     = $getResult->num_rows;
			return $total;

		}

		public function getTotalNewBankRaws(){
			$query     = "SELECT * FROM new_bank_tbl_ques";
			$getResult = $this->db->select($query);
			$total     = $getResult->num_rows;
			return $total;

		}

		public function getTotalNewTestRaws(){
			$query     = "SELECT * FROM new_tbl_ques";
			$getResult = $this->db->select($query);
			$total     = $getResult->num_rows;
			return $total;

		}


		public function getQuestion(){
			$query     = "select * from tbl_ques";
			$getdata   = $this->db->select($query);
			$getResult = $getdata->fetch_assoc();
			return $getResult;
		}

		public function getQuestionNew(){
			$query     = "select * from new_bank_tbl_ques";
			$getdata   = $this->db->select($query);
			$getResult = $getdata->fetch_assoc();
			return $getResult;
		}

		public function getQuestionNewTest(){
			$query     = "select * from new_tbl_ques";
			$getdata   = $this->db->select($query);
			$getResult = $getdata->fetch_assoc();
			return $getResult;
		}

		public function getQuestionNewBcs(){
			$query     = "select * from new_bcs_tbl_ques";
			$getdata   = $this->db->select($query);
			$getResult = $getdata->fetch_assoc();
			return $getResult;
		}

		public function getQuesByNumber($number){
			$query     = "select * from tbl_ques where quesNo =' $number'";
			$getdata   = $this->db->select($query);
			$getResult = $getdata->fetch_assoc();
			return $getResult;

		}

		public function getQuesByNumberBcs($number){
			$query     = "select * from bcs_tbl_ques where quesNo =' $number'";
			$getdata   = $this->db->select($query);
			$getResult = $getdata->fetch_assoc();
			return $getResult;

		}

		public function getQuesByNumberNewBcs($number){
			$query     = "select * from new_bcs_tbl_ques where quesNo =' $number'";
			$getdata   = $this->db->select($query);
			$getResult = $getdata->fetch_assoc();
			return $getResult;

		}

		public function getQuesByNumberBank($number){
			$query     = "select * from bank_tbl_ques where quesNo =' $number'";
			$getdata   = $this->db->select($query);
			$getResult = $getdata->fetch_assoc();
			return $getResult;

		}

		public function getQuesByNumberNewBank($number){
			$query     = "select * from new_bank_tbl_ques where quesNo =' $number'";
			$getdata   = $this->db->select($query);
			$getResult = $getdata->fetch_assoc();
			return $getResult;
		}

		public function getQuesByNumberNewTest($number){
			$query     = "select * from new_tbl_ques where quesNo =' $number'";
			$getdata   = $this->db->select($query);
			$getResult = $getdata->fetch_assoc();
			return $getResult;
		}

		public function getAnswer($number){
			$query     = "select * from tbl_ans where quesNo = '$number'";
			$getdata   = $this->db->select($query);
			//$getResult = $getdata->fetch_assoc();
			return $getdata;
		}

		public function getAnswer2($number){
			$query     = "select * from new_tbl_ans where quesNo = '$number'";
			$getdata   = $this->db->select($query);
			//$getResult = $getdata->fetch_assoc();
			return $getdata;
		}

		public function getAnswerBcs($number){
			$query     = "select * from bcs_tbl_ans where quesNo = '$number'";
			$getdata   = $this->db->select($query);
			//$getResult = $getdata->fetch_assoc();
			return $getdata;
		}

		public function getAnswerNewBcs($number){
			$query     = "select * from new_bcs_tbl_ans where quesNo = '$number'";
			$getdata   = $this->db->select($query);
			//$getResult = $getdata->fetch_assoc();
			return $getdata;
		}

		public function getAnswerBank($number){
			$query     = "select * from bank_tbl_ans where quesNo = '$number'";
			$getdata   = $this->db->select($query);
			//$getResult = $getdata->fetch_assoc();
			return $getdata;
		}

		public function getAnswerNewBcs1($number){
			$query     = "select * from new_bcs_tbl_ans where quesNo = '$number'";
			$getdata   = $this->db->select($query);
			//$getResult = $getdata->fetch_assoc();
			return $getdata;
		}

		public function getAnswerNewBank($number){
			$query     = "select * from new_bank_tbl_ans where quesNo = '$number'";
			$getdata   = $this->db->select($query);
			//$getResult = $getdata->fetch_assoc();
			return $getdata;
		}

		public function getAnswerNewBcs11($number){
			$query     = "select * from new_bcs_tbl_ans where quesNo = '$number'";
			$getdata   = $this->db->select($query);
			//$getResult = $getdata->fetch_assoc();
			return $getdata;
		}

		public function getAnswerNewTest($number){
			$query     = "select * from new_tbl_ans where quesNo = '$number'";
			$getdata   = $this->db->select($query);
			//$getResult = $getdata->fetch_assoc();
			return $getdata;
		}

		public function getAnswer1(){
			$query     = "select * from tbl_ans where id between 53 and 104";
			$getdata   = $this->db->select($query);
			//$getResult = $getdata->fetch_assoc();
			return $getdata;
		}

	}


?>