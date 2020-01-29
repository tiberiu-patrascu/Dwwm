<?php

require_once '../../Debug.php';
require_once '../../Loader.php';

$username = 'Tib';

$test = new Models\AccountManager;

$test->getUser($username);

d($test);