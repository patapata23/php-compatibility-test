<?php
function test_function(&$count_value) {
    $count_value = 10;
    return debug_backtrace();
}

$value = 5;
test_function($value);
?>