<?php

namespace CacheGenerator;

use CacheGenerator\DependencyInjection\CacheGeneratorExtension;
use CacheGenerator\DependencyInjection\Compiler\CacheGeneratorCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;

require_once __DIR__."/../vendor/autoload.php";

//Create The Container Builder
$container = new ContainerBuilder();

//Generate The extension That Will Parse Any Configuration File
$cacheGeneratorExtention = new CacheGeneratorExtension();
$container->registerExtension($cacheGeneratorExtention);

//Add the Compiler Pass That Will Add All The Logical Information Needed
$cacheGeneratorCompilerPass = new CacheGeneratorCompilerPass();
$container->addCompilerPass($cacheGeneratorCompilerPass);

//Compile The Container
$container->compile();

//Work With The Result :-)