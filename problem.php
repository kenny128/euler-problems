<?php 
	session_start();
	
	function lcm($a, $b) {
		// finds lowest common multiple of 2 input integer
		$c = $a*$b/gcd($a, $b);
		return $a*$b/gcd($a, $b);
	}

	function gcd ($a, $b) {
		// finds greatest common divisor
	    return $b ? gcd($b, $a % $b) : $a;
	}

	function p1 ($input) {
		$x = $input - 1;
		$three = floor($x / 3) ;
		$five = floor($x / 5) ;
		$fifteen = floor($x / 15);
		return (($three+1)*($three/2)*3) + (($five+1)*($five/2)*5) - (($fifteen+1)*($fifteen/2)*15);
	}

	function isPrime($n) {
		if ($n == 1) {
			return false;
		} elseif ($n == 2) {
			return  true;
		} elseif ($n % 2 == 0) {
			return false;
		}

		for ($x = 3; $x <= ceil(sqrt($n)); $x = $x + 2) {
        	if($n % $x == 0) return false;
	    }

	    return true;
	}

	function p3 ($input) {
		$x = $input;
		if ($input == 1 || $input == 0) return "<p id='red'> ERROR: No answer found </p>";
		$y = 2;
		while(1) {
			while ($x % $y == 0) {
				if ($x / $y == 1) {
					return $y;
				} else {
					$x = $x / $y;
				}
			}
			if ($y == 2) {
				$y++;
			} else {
				$y = $y + 2;
			}
			while (!isPrime($y)) {
				$y = $y + 2;
			}
		}
	}


	function p5 ($input) {
		$answer = 1;
		for ($x = 1; $x <= $input; $x++) {
			$answer = lcm($answer, $x);
		} 
		return $answer;
	}

	function addDB($a, $b , $c) {
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

		$sql = " INSERT INTO track (problem_id, test_number, test_answer, total_runs)
    VALUES ($a, $b , $c, 1)
        ON DUPLICATE KEY UPDATE total_runs = total_runs + 1;";
		$result = $conn->query($sql);
		//echo "<script type='text/javascript'>alert(' ProblemID: ". $a . " Test number: " . $b . " Test answer: " . $c ."');</script>";
	}

	$_SESSION['id'] = $_POST['problem_id'];
	$_SESSION['input'] = $_POST['test_number'];

	if (is_numeric($_POST['test_number'])) {

		// Do problem
		if ($_POST['problem_id'] == 1) {
			// Problem 1
			$_SESSION['output'] = p1($_POST['test_number']);
			addDB($_POST['problem_id'], $_POST['test_number'] , $_SESSION['output']);
		} elseif ($_POST['problem_id'] == 3) {
			// Problem 3
			$_SESSION['output'] = p3($_POST['test_number']);
			addDB($_POST['problem_id'], $_POST['test_number'] , $_SESSION['output']);
		} elseif ($_POST['problem_id'] == 5) {
			// Problem 5
			$_SESSION['output'] = p5($_POST['test_number']);
			addDB($_POST['problem_id'], $_POST['test_number'] , $_SESSION['output']);
		} else {
			// Incorrect Problem ID
			$_SESSION['output'] = "<p id='red'> ERROR:  Incorrect problem ID</p>";
		}
	} else {
		$_SESSION['output'] = "<p id='red'> ERROR: Input is not numeric or is empty</p>";
	}
	
	header("location: index.php"); 

?>
