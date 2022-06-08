<?php

// function to calculate the total 
// data for each shape performed
function calculateTotalOfEachshape(array $arrays, string $shape)
{
    $total = 0;
    if (is_array($arrays)) {

        foreach ($arrays as $key => $values) {
            if (!empty($values["id_" . $shape])) {
                $total++;
            }
        }
    }
    return $total;
}

// function to calculate the percentage
// of data for each shape
function percentage(array $arrays, string $shape)
{
    if (is_array($arrays)) {
        $total_all = count($arrays);
    } else {
        $total_all = 0;
    }
    // save the total data for each shape performed
    $total_for_shape = calculateTotalOfEachshape($arrays, $shape);

    if (!empty($total_for_shape) && $total_for_shape !== 0) {
        $result = ($total_for_shape / $total_all) * 100;
        $result = round($result, 2);
    } else {
        $result = 0;
    }
    return $result . "%";
}

// function to calculate area of ​​triangle
// with the formula 1/2 x base x height
function triangle(float $base, float $height)
{
    return ($base * $height) / 2;
}

// function to calculate area of ​​a square
// with the formula s x s
function square(float $side)
{
    return $side * $side;
}

// function to calculate area of ​​circle
// with the formula π x r²
function circle(float $radius)
{
    return 3.14 * ($radius * $radius);
}