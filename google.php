<?php

namespace Facebook\WebDriver;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

require_once('vendor/autoload.php');

$host = 'http://localhost:4444/wd/hub';
$capabilities = DesiredCapabilities::firefox();

$driver = RemoteWebDriver::create($host, $capabilities);

$driver->get('https://google.com/');
echo "The title is " . $driver->getTitle();
// var_dump($driver->getTitle());

//to type 
$test = $driver->findElement(WebDriverBy::id('APjFqb'))->sendKeys('test type');
// print_r($test);
// var_dump($test->getText());

//to clear
$driver->findElement(WebDriverBy::id('APjFqb'))->clear();

// Take screenshot
$screenshotPath = './screenshot.png'; // specify the path where you want to save the screenshot
$driver->takeScreenshot($screenshotPath);

// To clear
$driver->findElement(WebDriverBy::name('q'))->clear();


echo "Screenshot saved to " . $screenshotPath;


$driver->quit();


