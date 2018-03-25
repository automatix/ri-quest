<?php
use App\Services\Dummy\BarService;
use App\Services\Dummy\BarServiceInterface;
use App\Services\Dummy\FooBService;
use App\Services\Dummy\FooServiceInterface;

$commonDependencies = [
    FooServiceInterface::class => DI\autowire(FooBService::class),
    BarServiceInterface::class => DI\autowire(BarService::class),
];

$commonLocalDependenciesPath = __DIR__ . DIRECTORY_SEPARATOR . 'common.local.php';
$commonLocalDependencies = file_exists($commonLocalDependenciesPath) ? require $commonLocalDependenciesPath : [];

$mergedDefinitions = array_merge($commonDependencies, $commonLocalDependencies);

return $mergedDefinitions;