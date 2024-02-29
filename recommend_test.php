<?php

require_once("recommend.php");
require_once("test.php");


$re = new Recommend();
print_r($re->getRecommendations($ArraY, "john"));

?>