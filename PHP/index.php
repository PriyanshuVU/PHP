<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3x + 1 Function Calculator</title>
</head>
<body>
    <h2>Calculate 3x + 1 Function</h2>
    <form action="index.php" method="post">
        <label for="start">Start Number:</label>
        <input type="number" id="start" name="start" >
        <label for="end">End Number:</label>
        <input type="number" id="end" name="end" >
        <button type="submit">Calculate</button>
    </form>

    <?php
    include 'functions.php';
	include 'functions2.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $start = $_POST["start"];
        $end = $_POST["end"];
		
		if(!is_null($start) && $end!=null){

        $results = calculate_range($start, $end);

        echo "<h3>Results:</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Number</th><th>Max Value</th><th>Iterations</th></tr>";
        foreach ($results as $result) {
            echo "<tr><td>{$result['number']}</td><td>{$result['max_value']}</td><td>{$result['iterations']}</td></tr>";
        }
        echo "</table>";

        $max_iterations_number = find_max_iterations($results);
        $min_iterations_number = find_min_iterations($results);

        echo "<h3>Number with Maximum Iterations:</h3>";
        echo "Number: {$max_iterations_number['number']}<br>";
        echo "Iterations: {$max_iterations_number['iterations']}<br>";
        echo "Max Value: {$max_iterations_number['max_value']}<br>";

        echo "<h3>Number with Minimum Iterations:</h3>";
        echo "Number: {$min_iterations_number['number']}<br>";
        echo "Iterations: {$min_iterations_number['iterations']}<br>";
        echo "Max Value: {$min_iterations_number['max_value']}<br>";
		}else{
			Find($start);
		}
    }
    ?>
</body>
</html>
