<?php
$commonDependencies = require __DIR__ . DIRECTORY_SEPARATOR . 'common.php';

$phpunitDependencies = [
];

$phpunitLocalDependenciesPath = __DIR__ . DIRECTORY_SEPARATOR . 'phpunit.local.php';
$phpunitLocalDependencies = file_exists($phpunitLocalDependenciesPath) ? require $phpunitLocalDependenciesPath : [];

return array_merge($commonDependencies, $phpunitDependencies, $phpunitLocalDependencies);