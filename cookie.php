<?php

$_SESSION['asdas'] = 'asdsa';


$a = [1, 2, 3];

$a['reda'] = 'apple';
$a[1] = 4;
$a['red'] = 'apple';

unset($a['reda']);

echo "<pre>";
print_r($a);
