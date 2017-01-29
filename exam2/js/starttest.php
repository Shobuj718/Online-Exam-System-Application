<?php
	include 'inc/header.php';
?>

<?php
	Session::checkSession();
	$question = $exm->getQuestion();
	$total    = $exm->getTotalRaws();
?>

<div class="main">
	<h1>Welcome to Online Exam</h1>
	<div class="starttest">
		<h2>Test Your Knowledge</h2>
		<p>This is multiple choice quiz to test your knowledge</p>
		<ul>
			<li><strong>Number of question: </strong><?php echo $total; ?></li>
			<li><strong>Question type: </strong>Multiple Choice</li>
		</ul>
		<a href="test.php?q=<?php echo $question['quesNo']; ?>">Start Test</a>
	</div>
	
</div>


<?php
	include 'inc/footer.php';
?>