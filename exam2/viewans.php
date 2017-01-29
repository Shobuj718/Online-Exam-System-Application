<?php include 'inc/header.php'; ?>

<?php 
	Session::checkSession();
	$total = $exm->getTotalRawstest();
?>


<div class="main">
<h1>All Question & Ans:- <?php //echo $total; ?></h1>

<h3><div align="right"  ><a href="starttest.php">Start Again</div></a>

<a href="final2.php">Back</a></h3>

	<div class="test">

		<table> 
		<?php
			$getQeus = $exm->getQueByOrderBcstest();
			if($getQeus){
				while($question = $getQeus->fetch_assoc()){
					//if($question == '5')
			
		?>
			<tr>
				<td colspan="2">
				<?php if($question['quesNo'] == '51'){
					exit();
				} 

				?>
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
						 	if($result['quesNo'] == '51'){
						 		exit();
						 	}
						 	elseif($result['rightAns'] == '1'){
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

 </div>
<?php include 'inc/footer.php'; ?>