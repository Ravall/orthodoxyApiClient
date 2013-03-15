<?php
require __DIR__. '/Api.php';
use OrthodoxyClient\Api as Api;
$api = new Api('http://api.sancta.ru/');
$result = $api->getEventInfo(29);
var_dump($result);