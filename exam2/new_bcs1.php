<?php include 'inc/header.php'; ?>

<?php 
	Session::checkSession();
	if(isset($_GET['n'])){
		$num = (int) $_GET['n'];
	}elseif(isset($_GET['n=10'])){
		$num = (int) $_GET['n=10'];
		//header("Location:final.php");
	}
	else{
		header("Location:exam.php");
	}
	$total = $exm->getTotalNewBcsRaws();	
	$question = $exm->getQuesByNumberNewBcs($num);


?>
<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$process = $pro->processDataNewBank1($_POST);
	}

?>

<div class="main">
<h1>Total Question 50

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
				$answer = $exm->getAnswerNewBcs1($num);
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
				<input type="hidden" name="number" value="<?php echo $num; ?>" />
			</td>
			</tr>
			
		</table>
		</form>
</div>
<?php  //} ?>
 </div>
<?php include 'inc/footer.php'; ?>