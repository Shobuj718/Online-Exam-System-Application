<?php //include 'inc/header.php'; ?>

<?php 
	//Session::checkSession();
	/*if(isset($_GET['q'])){
		$number = (int) $_GET['q'];
	}
	else{
		header("Location:exam.php");
	}
	$total = $exm->getTotalRaws();
	$question = $exm->getQuesByNumber($number);*/


?>

<?php 

/*	class Process{
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

			$total = $this->getTotal();
			$right = $this->rightAns($number);
			if($right == $selectedAns){
				$_SESSION['score']++;
			}
			else{
				$_SESSION['score']--;
			}
			if($number == '10'){
				header("Location:final2.php");
				exit();
			}
			else{
				header("Location:test.php?q=".$next);
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
		/*
		public function getQuesByNumber($number){
			$query     = "select * from tbl_ques ";
			$getdata   = $this->db->select($query);
			$getResult = $getdata->fetch_assoc();
			return $getResult;

		}*/
	//}*/


?>

<?php
	include 'inc/header.php';
?>

<?php
	Session::checkSession();
	$question = $exm->getQuestionNewTest();
	$total    = $exm->getTotalRaws();
?>

<div class="main">
	<h1>You are done !</h1>
	<div class="starttest">
		<p>You have just completed the test.</p>
		<p>Final Score : 
		<?php  
			if(isset($_SESSION['score'])){
				if($_SESSION['score'] <'17'){
					echo $_SESSION['score'];
					echo "<br/><p>You are fail. Your grade is <span style='color:red'><strong>F</strong></span></p>";
				}
				elseif($_SESSION['score'] >='17' & $_SESSION['score'] <'25'){
					echo $_SESSION['score'];
					echo "<br/><p>Your grade is <strong>C</strong></p>";
				}
				elseif($_SESSION['score'] >='25' & $_SESSION['score'] <'30'){
					echo $_SESSION['score'];
					echo "<br/><p>Your grade is <strong>B</strong></p>";
				}
				elseif($_SESSION['score'] >='30' & $_SESSION['score'] <'35'){
					echo $_SESSION['score'];
					echo "<br/><p>Your grade is <strong>A-</strong></p>";
				}
				elseif($_SESSION['score'] >='35' & $_SESSION['score'] <'40'){
					echo $_SESSION['score'];
					echo "<br/><p><span style='color:green'>Congratulation </span>Your grade is <span style='color:blue'><strong>A</strong></span></p>";
				}
				elseif($_SESSION['score'] >='40' & $_SESSION['score'] <='50'){
					echo $_SESSION['score'];
					echo "<br/><p><span style='color:green'>Congratulation </span>Your grade is <span style='color:green'><strong>A+</strong></span></p>";
				}
				else{
					echo $_SESSION['score'];
					//echo "<br/> <p>No Result Found.</p>"
				}
				unset($_SESSION['score']);
			}
		?>
		</p>
		<a href="viewans.php">View Answer</a>
		<a href="starttest.php">Start Again</a>
		<a href="new_test.php?m=<?php echo $question['quesNo']; ?>">New Test</a>
	</div>
	
</div>


<?php
	include 'inc/footer.php';
?>