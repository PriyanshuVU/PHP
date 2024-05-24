<?php

function calculate_next($x) {
    return $x % 2 == 0 ? $x / 2 : 3 * $x + 1;
}

function calculate_range($start, $end) {
    $results = [];

    for ($i = $start; $i <= $end; $i++) {
        $number = $i;
        $current_value = $number;
        $max_value = $current_value;
        $iterations = 0;

        while ($current_value != 1) {
            $current_value = calculate_next($current_value);
            $max_value = max($max_value, $current_value);
            $iterations++;
        }

        $results[] = [
            'number' => $number,
            'max_value' => $max_value,
            'iterations' => $iterations
        ];
    }

    return $results;
}

function find_max_iterations($results) {
    $max_iterations = 0;
    $max_iterations_number = null;

    foreach ($results as $result) {
        if ($result['iterations'] > $max_iterations) {
            $max_iterations = $result['iterations'];
            $max_iterations_number = $result;
        }
    }

    return $max_iterations_number;
}

function find_min_iterations($results) {
    $min_iterations = PHP_INT_MAX;
    $min_iterations_number = null;

    foreach ($results as $result) {
        if ($result['iterations'] < $min_iterations) {
            $min_iterations = $result['iterations'];
            $min_iterations_number = $result;
        }
    }

    return $min_iterations_number;
}
?>
