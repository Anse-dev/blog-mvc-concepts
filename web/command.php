<?php

use Anse\Migration\Migration;

require_once "../vendor/autoload.php";
$migration = new Migration();

$migration->createTable();
