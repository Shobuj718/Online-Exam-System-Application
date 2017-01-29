<?php include 'inc/header.php'; ?>

<?php 
	Session::checkSession();
	$total = $exm->getTotalRaws();
?>


<div class="main">
<h1>All Question & Ans: <?php echo $total; ?></h1>
	<div class="test">

		<table> 
		<?php
			$getQeus = $exm->getQueByOrder();
			if($getQeus){
				while($question = $getQeus->fetch_assoc()){
			
		?>
			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $question['quesNo']; ?>: <?php echo $question['ques']; ?></h3>
				</td>
			</tr>

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
		<a href="starttest.php">Start Again</a>
</div>

 </div>
<?php include 'inc/footer.php'; ?>