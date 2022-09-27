<?php

 include(public_path()."/finger/paul/zklibrary.php");

//$zk = new ZKLibrary('192.168.0.122', 4370);
$zk = new ZKLibrary('192.168.0.122', 4370, 'TCP');
$zk->connect();
//$zk->disableDevice();

// $zk->setTime(date('Y-m-d H:i:s'));
$zk->testVoice();

// $zk->enableDevice();
// $zk->disconnect();

?>