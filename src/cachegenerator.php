<?php

namespace CacheGenerator;

use CacheGenerator\DependencyInjection\CacheGeneratorExtension;
use CacheGenerator\DependencyInjection\Compiler\CacheGeneratorCompilerPass;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Reference;

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__."/../vendor/autoload.php";

$file = __DIR__ .'/../cache/container.php';

//Create The Container Builder
$container = new ContainerBuilder();

//Create Service Definition For Memcached
$container->register('test_cache', 'Doctrine\Common\Cache\MemcachedCache');

//Loadin a YAML configuration file
$loader = new YamlFileLoader($container, new FileLocator(__DIR__."/../Resources/config/"));
$loader->load('cache.yml');

$taggedServices = $container->findTaggedServiceIds('cache_generator');

//Look for Tagged services to Add the Cache
foreach ($taggedServices as $id => $tags) {
    $definition = $container->findDefinition($id);
    $definition->addArgument(new Reference('test_cache'));
}

//Compiling the Container
$container->compile();

//Dumping The Container
$dumper = new PhpDumper($container);
file_put_contents($file, $dumper->dump());



//Generate The extension That Will Parse Any Configuration File
$cacheGeneratorExtention = new CacheGeneratorExtension();
$container->registerExtension($cacheGeneratorExtention);

//Add the Compiler Pass That Will Add All The Logical Information Needed
$cacheGeneratorCompilerPass = new CacheGeneratorCompilerPass();
$container->addCompilerPass($cacheGeneratorCompilerPass);

//Compile The Container
$container->compile();

// TODO write a config with 2 Different Caches
// TODO Define the TreeBuilder
// TODO Implements the Compiler Pass
// TODO Check to see The Results