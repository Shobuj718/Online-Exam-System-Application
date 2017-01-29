<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

	class Process{
		private $db;
		private $fm;
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function processData($data){
			$selectedAns = $this->fm->validation($data['ans']);
			$number      = $this->fm->validation($data['number']);
			$selectedAns = mysqli_real_escape_string($this->db->link,$selectedAns);
			$number      = mysqli_real_escape_string($this->db->link,$number);
			$next        = $number+1;

			if(!isset($_SESSION['score'])){
				$_SESSION['score'] = '0';	
			}

			$total = $this->getTotal1();
			$right = $this->rightAns1($number);
			$rong = $this->rongAns1($number);

			if($right == $selectedAns){
				$_SESSION['score'] += 1;
			}
			else{
				$_SESSION['score'] -= 0.25;
			}
			//elseif($rong == $selectedAns){
				//$_SESSION['score'] = $_SESSION['score'] - '0.25';
			//}
			if($number == '50'){
				header("Location:final2.php");
				exit();
			}
			elseif($number == '60'){
				header("Location:final2.php");
				exit();
			}
			else{
				header("Location:test.php?q=".$next);
			}
		}

		public function processDataBcs($data){
			$selectedAns = $this->fm->validation($data['ans']);
			$number      = $this->fm->validation($data['number']);
			$selectedAns = mysqli_real_escape_string($this->db->link,$selectedAns);
			$number      = mysqli_real_escape_string($this->db->link,$number);
			$next        = $number+1;

			if(!isset($_SESSION['score'])){
				$_SESSION['score'] = '0';	
			}

			$total = $this->getTotalBcs();
			$right = $this->rightAnsBcs($number);
			$rong = $this->rongAnsBcs($number);

			if($right == $selectedAns){
				$_SESSION['score'] += 1;
			}
			else{
				$_SESSION['score'] -= 0.25;
			}
			//elseif($rong == $selectedAns){
				//$_SESSION['score'] = $_SESSION['score'] - '0.25';
			//}
			if($number == '50'){
				header("Location:bcs_final.php");
				exit();
			}
			elseif($number == '80'){
				header("Location:bcs_final.php");
				exit();
			}
			else{
				header("Location:bcs.php?s=".$next);
			}
		}

		public function processDataNewBcs($data){
			$selectedAns = $this->fm->validation($data['ans']);
			$number      = $this->fm->validation($data['number']);
			$selectedAns = mysqli_real_escape_string($this->db->link,$selectedAns);
			$number      = mysqli_real_escape_string($this->db->link,$number);
			$next        = $number+1;

			if(!isset($_SESSION['score'])){
				$_SESSION['score'] = '0';	
			}

			$total = $this->getTotalBcs1();
			$right = $this->rightAnsBcs1($number);
			$rong = $this->rongAnsBcs1($number);

			if($right == $selectedAns){
				$_SESSION['score'] += 1;
			}
			else{
				$_SESSION['score'] -= 0.25;
			}
			//elseif($rong == $selectedAns){
				//$_SESSION['score'] = $_SESSION['score'] - '0.25';
			//}
			if($number == '50'){
				header("Location:bcs_final.php");
				exit();
			}
			if($number == '60'){
				header("Location:bcs_final.php");
				exit();
			}
			else{
				header("Location:new_bcs.php?k=".$next);
			}
		}

		public function processDataBank($data){
			$selectedAns = $this->fm->validation($data['ans']);
			$number      = $this->fm->validation($data['number']);
			$selectedAns = mysqli_real_escape_string($this->db->link,$selectedAns);
			$number      = mysqli_real_escape_string($this->db->link,$number);
			$next        = $number+1;

			if(!isset($_SESSION['score'])){
				$_SESSION['score'] = '0';	
			}

			$total = $this->getTotalBank1();
			$right = $this->rightAnsBank1($number);
			$rong = $this->rongAnsBank1($number);

			if($right == $selectedAns){
				$_SESSION['score'] += 1;
			}
			else{
				$_SESSION['score'] -= 0.25;
			}
			//elseif($rong == $selectedAns){
				//$_SESSION['score'] = $_SESSION['score'] - '0.25';
			//}
			if($number == '50'){
				header("Location:final.php");
				exit();
			}
			elseif($number == '60'){
				header("Location:final.php");
				exit();
			}
			else{
				header("Location:bank.php?b=".$next);
			}
		}

		public function processDataNewBank($data){
			$selectedAns = $this->fm->validation($data['ans']);
			$number      = $this->fm->validation($data['number']);
			$selectedAns = mysqli_real_escape_string($this->db->link,$selectedAns);
			$number      = mysqli_real_escape_string($this->db->link,$number);
			$next        = $number+1;

			if(!isset($_SESSION['score'])){
				$_SESSION['score'] = '0';	
			}

			$total = $this->getTotalBank();
			$right = $this->rightAnsBank($number);
			$rong = $this->rongAnsBank($number);

			if($right == $selectedAns){
				$_SESSION['score'] += 1;
			}
			else{
				$_SESSION['score'] -= 0.25;
			}
			//elseif($rong == $selectedAns){
				//$_SESSION['score'] = $_SESSION['score'] - '0.25';
			//}
			if($number == '50'){
				header("Location:new_final.php");
				exit();
			}
			elseif($number == '60'){
				header("Location:final.php");
				exit();
			}
			else{
				header("Location:new_bank.php?p=".$next);
			}
		}

		public function processDataNewTest($data){
			$selectedAns = $this->fm->validation($data['ans']);
			$number      = $this->fm->validation($data['number']);
			$selectedAns = mysqli_real_escape_string($this->db->link,$selectedAns);
			$number      = mysqli_real_escape_string($this->db->link,$number);
			$next        = $number+1;

			if(!isset($_SESSION['score'])){
				$_SESSION['score'] = '0';	
			}

			$total = $this->getTotalNewTest();
			$right = $this->rightAnsNewTest($number);
			$rong = $this->rongAnsNewTest($number);

			if($right == $selectedAns){
				$_SESSION['score'] += 1;
			}
			else{
				$_SESSION['score'] -= 0.25;
			}
			//elseif($rong == $selectedAns){
				//$_SESSION['score'] = $_SESSION['score'] - '0.25';
			//}
			if($number == '50'){
				header("Location:new_test_final.php");
				exit();
			}
			elseif($number == '60'){
				header("Location:new_test_final.php");
				exit();
			}
			else{
				header("Location:new_test.php?m=".$next);
			}
		}

		public function processDataNewBank1($data){
			$selectedAns = $this->fm->validation($data['ans']);
			$number      = $this->fm->validation($data['number']);
			$selectedAns = mysqli_real_escape_string($this->db->link,$selectedAns);
			$number      = mysqli_real_escape_string($this->db->link,$number);
			$next        = $number+1;

			if(!isset($_SESSION['score'])){
				$_SESSION['score'] = '0';	
			}

			$total = $this->getTotalBcs1();
			$right = $this->rightAnsBcs1($number);
			$rong = $this->rongAnsBcs1($number);

			if($right == $selectedAns){
				$_SESSION['score'] += 1;
			}
			else{
				$_SESSION['score'] -= 0.25;
			}
			//elseif($rong == $selectedAns){
				//$_SESSION['score'] = $_SESSION['score'] - '0.25';
			//}
			if($number == '50'){
				header("Location:new_bcs_final.php");
				exit();
			}
			elseif($number == '60'){
				header("Location:new_bcs_final.php");
				exit();
			}
			else{
				header("Location:new_bcs1.php?n=".$next);
			}
		}

		private function getTotal(){
			$query = "select * from tbl_ques ";
			$getdata = $this->db->select($query);
			$total   = $getdata->num_rows;
			return $total;
		}

		private function rightAns($number){
			$query = "select * from tbl_ans where quesNo = '$number' and rightAns = '1' ";
			$getdata = $this->db->select($query)->fetch_assoc();
			$getResult = $getdata['id'];
			return $getResult;
		}

		private function rongAns($number){
			$query = "select * from tbl_ans where quesNo = '$number' and rightAns = '0' ";
			$getdata = $this->db->select($query)->fetch_assoc();
			$getResult = $getdata['id'];
			return $getResult;
		}

		private function getTotal1(){
			$query = "select * from tbl_ques ";
			$getdata = $this->db->select($query);
			$total   = $getdata->num_rows;
			return $total;
		}

		private function rightAns1($number){
			$query = "select * from tbl_ans where quesNo = '$number' and rightAns = '1' ";
			$getdata = $this->db->select($query);//->fetch_assoc();
			//$getResult = $getdata['id'];
			return $getdata;
		}

		private function rongAns1($number){
			$query = "select * from tbl_ans where quesNo = '$number' and rightAns = '0' ";
			$getdata = $this->db->select($query);//->fetch_assoc();
			//$getResult = $getdata['id'];
			return $getdata;
		}

		private function getTotalBcs1(){
			$query = "select * from new_bcs_tbl_ques ";
			$getdata = $this->db->select($query);
			$total   = $getdata->num_rows;
			return $total;
		}

		private function rightAnsBcs1($number){
			$query = "select * from new_bcs_tbl_ans where quesNo = '$number' and rightAns = '1' ";
			$getdata = $this->db->select($query)->fetch_assoc();
			$getResult = $getdata['id'];
			return $getResult;
		}

		private function rongAnsBcs1($number){
			$query = "select * from new_bcs_tbl_ans where quesNo = '$number' and rightAns = '0' ";
			$getdata = $this->db->select($query)->fetch_assoc();
			$getResult = $getdata['id'];
			return $getResult;
		}

		private function getTotalBcs(){
			$query = "select * from bcs_tbl_ques ";
			$getdata = $this->db->select($query);
			$total   = $getdata->num_rows;
			return $total;
		}

		private function rightAnsBcs($number){
			$query = "select * from bcs_tbl_ans where quesNo = '$number' and rightAns = '1' ";
			$getdata = $this->db->select($query)->fetch_assoc();
			$getResult = $getdata['id'];
			return $getResult;
		}

		private function rongAnsBcs($number){
			$query = "select * from bcs_tbl_ans where quesNo = '$number' and rightAns = '0' ";
			$getdata = $this->db->select($query)->fetch_assoc();
			$getResult = $getdata['id'];
			return $getResult;
		}

		private function getTotalBank1(){
			$query = "select * from bank_tbl_ques ";
			$getdata = $this->db->select($query);
			$total   = $getdata->num_rows;
			return $total;
		}

		private function rightAnsBank1($number){
			$query = "select * from bank_tbl_ans where quesNo = '$number' and rightAns = '1' ";
			$getdata = $this->db->select($query)->fetch_assoc();
			$getResult = $getdata['id'];
			return $getResult;
		}

		private function rongAnsBank1($number){
			$query = "select * from bank_tbl_ans where quesNo = '$number' and rightAns = '0' ";
			$getdata = $this->db->select($query)->fetch_assoc();
			$getResult = $getdata['id'];
			return $getResult;
		}


		private function getTotalBank(){
			$query = "select * from new_bank_tbl_ques ";
			$getdata = $this->db->select($query);
			$total   = $getdata->num_rows;
			return $total;
		}

		private function getTotalNewTest(){
			$query = "select * from new_tbl_ques ";
			$getdata = $this->db->select($query);
			$total   = $getdata->num_rows;
			return $total;
		}

		private function rightAnsBank($number){
			$query = "select * from new_bank_tbl_ans where quesNo = '$number' and rightAns = '1' ";
			$getdata = $this->db->select($query)->fetch_assoc();
			$getResult = $getdata['id'];
			return $getResult;
		}

		private function rightAnsNewTest($number){
			$query = "select * from new_tbl_ans where quesNo = '$number' and rightAns = '1' ";
			$getdata = $this->db->select($query)->fetch_assoc();
			$getResult = $getdata['id'];
			return $getResult;
		}

		private function rongAnsBank($number){
			$query = "select * from new_bank_tbl_ans where quesNo = '$number' and rightAns = '0' ";
			$getdata = $this->db->select($query)->fetch_assoc();
			$getResult = $getdata['id'];
			return $getResult;
		}

		private function rongAnsNewTest($number){
			$query = "select * from new_tbl_ans where quesNo = '$number' and rightAns = '0' ";
			$getdata = $this->db->select($query)->fetch_assoc();
			$getResult = $getdata['id'];
			return $getResult;
		}


	}

?>