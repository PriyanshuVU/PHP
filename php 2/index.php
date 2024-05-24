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
        <label for="step">Arithmetic Step:</label>
        <input type="number" id="step" name="step" >
        <button type="submit">Calculate</button>
    </form>

    <?php
    include 'functions.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['start'])) {
        $start = $_POST["start"];
        $end = $_POST["end"];
		$step = $_POST["step"];
		if(!is_null($start) && $end!=null){

        $results = new Plural($start, $end,$step);

		}else{
			$var= new Singular($start);
		}
    }
    ?>
</body>
</html>
