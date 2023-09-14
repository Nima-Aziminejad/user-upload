#!/usr/bin/php
<?php
$series ='';
for($i=1; $i<101;$i++){
    $output = '';

    if ($i % 3 == 0) {
        $output .= 'foo';
    }

    if ($i % 5 == 0) {
        $output .= 'bar';
    }
    $series .= ($output !== '') ? $output : $i;

    if($i < 100){
        $series .= ', ';
    }

}
echo $series;