<?php
class Plural{

    public $min;
    public $max;
    public $results;

    public function __construct($start, $end, $step) {
    $results = [];

    for ($i = $start; $i <= $end; $i += $step) {
        $number = $i;
        $current_value = $number;
        $max_value = $current_value;
        $iterations = 0;

        while ($current_value != 1) {
            $current_value = $current_value % 2 == 0 ? $current_value / 2 : 3 * $current_value + 1;
            $max_value = max($max_value, $current_value);
            $iterations++;
        }

        $results[] = [
            'number' => $number,
            'max_value' => $max_value,
            'iterations' => $iterations
        ];
    }

    $this->results = $results;
    $this->find_maxmin_iterations($results);
	$printer = new Printer($this->results, $this->min, $this->max);
    $printer->printResults();
}

public function find_maxmin_iterations($results) {
    $max_iterations = 0;
    $max_iterations_number = array();
    $min_iterations = PHP_INT_MAX;
    $min_iterations_number = array();

    foreach ($results as $result) {
        if ($result['iterations'] > $max_iterations) {
            $max_iterations = $result['iterations'];
            $max_iterations_number = $result;
        }
        if ($result['iterations'] < $min_iterations) {
            $min_iterations = $result['iterations'];
            $min_iterations_number = $result;
        }
    }

    $this->max = $max_iterations_number;
    $this->min = $min_iterations_number;
}


}

class Printer extends Plural{
	
	public $results;
	public $min;
	public $max;
	
	
	public function __construct($res,$mi,$ma){
		$this->results = $res;
		$this->min = $mi;
		$this->max = $ma;
		
	}
	
	public function printResults(){
    echo "<h3>Results:</h3>";
    echo "<table border='1'>";
    echo "<tr><th>Number</th><th>Max Value</th><th>Iterations</th></tr>";
    foreach ($this->results as $result) {
        echo "<tr><td>{$result['number']}</td><td>{$result['max_value']}</td><td>{$result['iterations']}</td></tr>";
    }
    echo "</table>";

    echo "<h3>Number with Maximum Iterations:</h3>";
    echo "Number: {$this->max['number']}<br>";
    echo "Iterations: {$this->max['iterations']}<br>";
    echo "Max Value: {$this->max['max_value']}<br>";

    echo "<h3>Number with Minimum Iterations:</h3>";
    echo "Number: {$this->min['number']}<br>";
    echo "Iterations: {$this->min['iterations']}<br>";
    echo "Max Value: {$this->min['max_value']}<br>";

    echo "<div style='height: 800px; width: 500px;'>";

    $it = max(array_column($this->results, 'iterations'));
    $w = 1000 / count($this->results);
    $w = $w . 'px';

    foreach ($this->results as $result) {
        $num = $result['number'];
        $count = $result['iterations'];
        $h = ($count / $it) * 100;
        $h = $h . '%';
    
        echo "<div class='bar' style='background-color: blue; height: $w; width:$h ; ' onmouseover='showinfo(this)' onmouseout='hideinfo(this)'>
        <div class='textinfo' style='display: none; transform: translateX(+500px);text-align: center; position: absolute;'>
            Number: $num<br> Iteration: $count
        </div>
        </div>";
    }
    echo '</div>';

}
}

class Singular{

    public $sequence;
    public $maxValue;
    public $countIterations;

    function __construct($number){

        $this->calculateSequence($number);
    
        echo "Sequence for $number: ";
        echo "<br>";
        echo implode("<br>", $this->sequence);
        echo "<br>";
        echo "Max Value: $this->maxValue\n";
        echo "Count of Iterations: $this->countIterations\n";
    }

    public function calculateSequence($number) {
        $sequence = array();
        $sequence[] = $number;
        
        while ($number != 1) {
            if ($number % 2 == 0) {
                $number = $number / 2;
            } else {
                $number = 3 * $number + 1;
            }
            $sequence[] = $number;
        }
        
        $this->sequence = $sequence;
        $this->maxValue = max($sequence);
        $this->countIterations = count($sequence) - 1;
    }

}

?>
    <script>
        function showinfo(element) {
            element.getElementsByClassName('textinfo')[0].style.display = 'block';
        }
        function hideinfo(element) {
            element.getElementsByClassName('textinfo')[0].style.display = 'none';
        }
    </script>
