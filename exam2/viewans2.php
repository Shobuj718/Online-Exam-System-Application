<?php include 'inc/header.php'; ?>

<?php 
	Session::checkSession();
	$total = $exm->getTotalRaws();
?>

<?php 
	Session::checkSession();
	if(isset($_GET['q'])){
		$number = (int) $_GET['q'];
	}elseif(isset($_GET['q=11'])){
		$number = (int) $_GET['q=11'];
		//header("Location:final.php");
	}
	else{
		header("Location:exam.php");
	}
	$total = $exm->getTotalRaws();
	//$question = $exm->getQuesByNumber($number);


?>


<div class="main">
<h1>All Question & Ans:- <?php //echo $total; ?></h1>





	<div class="test">

		<table> 
		<?php
			$getQeus = $exm->getQueByOrder1();
			if($getQeus){
				while($question = $getQeus->fetch_assoc()){
					//if($question == '5')
			
		?>
			<tr>
				<td colspan="2">
				<?php //if($question['quesNo'] == '11'){
					//exit();
				//} 

				?>
				 <h3>Que <?php echo $question['quesNo']; ?>: <?php echo $question['ques']; ?></h3>
				</td>
			</tr>
			<?php //} //else { ?>
			<?php  
				//exit();
			?>

			<?php 
				$number = $question['quesNo'];
				$answer = $exm->getAnswer($number);
				if($answer){
					while($result = $answer->fetch_assoc()){
			?>
					<tr>
						<td>
						 <input type="radio" />
						 <?php 
						 	//if($result['quesNo'] == '11'){
						 	//	exit();
						 	//}
						 	if($result['rightAns'] == '1'){
						 		echo "<span style='color:green'>".$result['ans']."</span>";
						 	}
						 	else{
						 		echo $result['ans']; 
						 	}
						 ?>
						</td>
					</tr>

			<?php } } ?>

		<?php } } ?>

		
		</table>
		
</div>
<a href="test.php?q=11">Start Again</a><div align="right"><a href="starttest.php">Back</a></div></h3>
 </div>
<?php include 'inc/footer.php'; ?>