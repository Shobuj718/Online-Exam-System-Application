<?php include 'inc/header.php'; ?>

<?php 
	Session::checkSession();
	if(isset($_GET['q'])){
		$number = (int) $_GET['q'];
	}elseif(isset($_GET['q=21'])){
		$number = (int) $_GET['q=21'];
		//header("Location:final.php");
	}
	else{
		header("Location:exam.php");
	}
	$total = $exm->getTotalRaws();
	$question = $exm->getQuesByNumber($number);


?>
<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$process = $pro->processData($_POST);
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
				 <h3> <?php  
for ($x = 1; $x <= 10; $x++) {
  echo "Que: $x";

?></h3>   <h3><?php echo $question['ques']; ?></h3>
					<?php //$x++; } ?>
				</td>
			</tr>

			<?php 
				$answer = $exm->getAnswer($number);
				if($answer){
					while($result = $answer->fetch_assoc()){
			?>
					<tr>
						<td>
						 <input type="radio" name="ans" value="<?php echo $result['id']; ?>"/><?php echo $result['ans']; ?>
						</td>
					</tr>
<?php }//$x++; } ?>
			<?php } } ?>
			<?php //$x++; } ?>


			<tr>
			  <td>
				<input type="submit" name="submit" value="Next"/>
				<input type="hidden" name="number" value="<?php echo $number; ?>" />
			</td>
			</tr>
			
		</table>
		</form>
</div>
<?php  //} ?>
 </div>
<?php include 'inc/footer.php'; ?>