<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Euler Problem Solver</title>
		<link type="text/css" rel="stylesheet" href="style.css" />
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>

	<body>

		<div class="container">
			<div class="jumbotron">
				<h1>Euler Problem Solver</h1>
				<p>This website is a solver to a few Euler Problems.</p> 
			</div>
			<div class="row">
				<div class="col-sm-4">
					<h3>Problem 3: Largest Prime Factor</h3>
					<p>The prime factors of 13195 are 5, 7, 13 and 29.</p>
					<p>What is the largest prime factor of the number 600851475143 ?</p>
				</div>
				<div class="col-sm-4">
					<h3>Problem 5: Smallest Multiple</h3>
					<p>2520 is the smallest number that can be divided by each of the numbers from 1 to 10 without any remainder.</p>
					<p>What is the smallest positive number that is evenly divisible by all of the numbers from 1 to 20?</p>
				</div>
				<div class="col-sm-4">
					<h3>Problem 1: Multiples of 3 and 5 </h3>        
					<p>If we list all the natural numbers below 10 that are multiples of 3 or 5, we get 3, 5, 6 and 9. The sum of these multiples is 23.</p>
					<p>Find the sum of all the multiples of 3 or 5 below 1000.</p>
				</div>
			</div>
			<hr class="bs-docs-separator">
			<div class="row">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#solver" aria-controls="solver" role="tab" data-toggle="tab">Solver</a></li>
					<li role="presentation"><a href="#dbresult" aria-controls="dbresult" role="tab" data-toggle="tab">Database Results</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="solver">
						<br>
						<form method='POST' action='problem.php' role="form">
							<div class="form-group">
							    <label class="control-label" for="problem_id"> Problem Number: </label>
									<select class="form-control" name="problem_id">
										<option value="3">3</option>
										<option value="5">5</option>
										<option value="1">1</option>
									</select>
							</div>
							<div class="form-group">
							    <label class="control-label" for="test_number"> Test number:
								</label>
							      <input type="text" name="test_number" class="form-control" placeholder=
							    	<?php 
										echo "'(Max Integer: " . PHP_INT_MAX . ")'";
									?>
								>
							</div>
							<div class="form-group"> 
								<button type="submit" class="btn btn-default" class="form-control">Submit</button>
							</div>
						</form>
						<hr class="bs-docs-separator">
						<div id="results">
							<h2> Results 
							</h2>
							<p>
								Problem ID: 
								<?php 
									
									echo $_SESSION['id'];
								?>
							</p>
							<p> 
								Test Number: 
								<?php 
									
									echo $_SESSION['input'];
								?>
							</p>
							<p> 
								Answer: 
								<?php 
									
									echo $_SESSION['output'];
								?>
							</p>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="dbresult">
						<table class="table">
						    <thead>
						      <tr>
						        <th>problem_id</th>
						        <th>test_number</th>
						        <th>test_answer</th>
						        <th>total_runs</th>
						      </tr>
						    </thead>
						    <tbody>
								<?php
									$servername = "localhost";
									$username = "root";
									$password = "";
									$dbname = "problem";

									// Create connection
										$conn = new mysqli($servername, $username, $password, $dbname);
									// Check connection
									if ($conn->connect_error) {
										die("Connection failed: " . $conn->connect_error);
									} 

									$sql = "SELECT problem_id, test_number, test_answer, total_runs FROM track";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
										echo $result->num_rows . " results";
										// output data of each row
										while($row = $result->fetch_assoc()) {
											echo "<tr><th>". $row["problem_id"]. "</th><th>". $row["test_number"]. " </th><th> ". $row["test_answer"]. " </th><th>". $row["total_runs"] . "</th></tr>";
										}
									} else {
										echo "0 results";
									}

									$conn->close();
								?>  
						    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<script src="js/jquery-2.2.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

	</body>
</html>
