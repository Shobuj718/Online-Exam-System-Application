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
		<p><strong>Rules:</strong> Right answer = 1 add your total mark & Wrong ans = 0.25 minus from your total marks.</p><br/>

		<p>This is multiple choice quiz to test your knowledge.</p>
		<ul>
			<li><strong>Number of question: </strong><?php echo $total; ?></li>
			<li><strong>Question type: </strong>Multiple Choice</li><br/>
		</ul>
		<a href="bcs.php?s=<?php echo $question['quesNo']; ?>">BCS</a>
		<a href="bank.php?b=<?php echo $question['quesNo']; ?>">Bank</a>
		<a href="test.php?q=<?php echo $question['quesNo']; ?>">Other</a>
	</div>
	
</div>


<?php
	include 'inc/footer.php';
?>