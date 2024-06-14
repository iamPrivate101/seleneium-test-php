<?php

namespace Facebook\WebDriver;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

require_once('vendor/autoload.php');

$host = 'http://localhost:4444/wd/hub';

$capabilities = DesiredCapabilities::firefox();

$driver = RemoteWebDriver::create($host, $capabilities);

$driver->get('https://proregal-dev.mantraideas.com/');
echo "The title is " . $driver->getTitle();

try {
    echo "The current URL is '" . $driver->getCurrentURL() . "'\n";

    // Wait for the popup close button to be clickable
    $popUp = $driver->wait()->until(
        WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::className('btn-close-white'))
    );

    // Click on the popup close button
    $popUp->click();


    // Wait for the "Highlights" link to be clickable using a CSS selector
    $highlightsLink = $driver->wait()->until(
        WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('ul.navbar-nav.nav-gap a.nav-link[href="https://proregal-dev.mantraideas.com/highlights"]'))
    );

    // Click on the "Highlights" link
    $highlightsLink->click();


    // Wait for the popup close button to be clickable
    $popUp = $driver->wait()->until(
        WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::className('btn-close-white'))
    );

    // Click on the popup close button
    $popUp->click();


    echo "The current URL is '" . $driver->getCurrentURL() . "'\n";

    $emailInput = $driver->findElement(WebDriverBy::className('form-search'));
    $emailInput->sendKeys('seleniumtest@gmail.com');

    // Wait for the "Subscribe" button to be clickable and click it
    $subscribeButton = $driver->wait()->until(
        WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::xpath('//button[contains(text(), "Subscribe")]'))
    );
    $subscribeButton->click();

    echo "Subscriber Added\n";

    echo "Current Page Title: " . $driver->getTitle() . "\n";
} finally {
    $driver->quit();
}
