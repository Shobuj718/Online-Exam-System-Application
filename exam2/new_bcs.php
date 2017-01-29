<?php include 'inc/header.php'; ?>

<?php 
	Session::checkSession();
	if(isset($_GET['k'])){
		$number1 = (int) $_GET['k'];
	}elseif(isset($_GET['k=10'])){
		$number1 = (int) $_GET['k=10'];
		//header("Location:final.php");
	}
	else{
		header("Location:exam.php");
	}
	$total = $exm->getTotalNewBcsRaws();
	$question = $exm->getQuesByNumberNewBcs($number1);


?>
<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$process = $pro->processDataNewBcs($_POST);
	}

?>

<div class="main">
<h1>Total Question 20

<?php //for($x=1; $x<=5; $x++){ echo "$x";  //$question['quesNo']; ?> 

<?php //echo "1"; ?>
	
</h1>
	<div class="test">
		<form method="post" action="">
		<table> 
			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $question['quesNo']; ?>: <?php echo $question['ques']; ?></h3>
				</td>
			</tr>

			<?php 
				$answer = $exm->getAnswerNewBcs($number1);
				if($answer){
					while($result = $answer->fetch_assoc()){
			?>
					<tr>
						<td>
						 <input type="radio" name="ans" value="<?php echo $result['id']; ?>"/><?php echo $result['ans']; ?>
						</td>
					</tr>

			<?php } } ?>

			<tr>
			  <td>
				<input type="submit" name="submit" value="Next"/>
				<input type="hidden" name="number" value="<?php echo $number1; ?>" />
			</td>
			</tr>
			
		</table>
		</form>
</div>
<?php  //} ?>
 </div>
<?php include 'inc/footer.php'; ?>