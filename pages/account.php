<?php
echo 'Account page';
var_dump($pages['account']);
echo $pages['account'][1];
$pages['account'][1] = 'visible';
echo $pages['account'][1];