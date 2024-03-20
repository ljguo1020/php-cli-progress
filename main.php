<?php

require './ljguo/utils/Progress.php';
use ljguo\utils\Progress;


$arr = new Progress(range(1, 100), 'progress', 'green');

foreach($arr as $i) {
    usleep(200000);
}


