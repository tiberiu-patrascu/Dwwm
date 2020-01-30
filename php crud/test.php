<?php

require_once 'Debug.php';
require_once 'Loader.php';


$db = DbConnect::getDb();

d($db);

$result = Quiz::selectAll();

d($result);

$result = Quiz::select(1);

d($result);