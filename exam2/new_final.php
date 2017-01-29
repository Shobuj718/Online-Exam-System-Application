<?php
	include 'inc/header.php';
?>

<?php
	//Session::checkSession();
?>
<?php
	Session::checkSession();
	$question = $exm->getQuestionNew();
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
		<a href="new_bank_viewans.php">View Answer</a>
		<a href="new_bank.php?p=<?php echo $question['quesNo']; ?>">Start Again</a>
		<a href="starttest.php">Back</a>
	</div>
	
</div>


<?php
	include 'inc/footer.php';
?>