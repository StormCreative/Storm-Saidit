<?php

$I = new WebGuy($scenario);
$I->wantTo('Test the testing edit page');
$I->amOnPage('admin/testing/edit');

/** First check form cannot be sent if the user doesnt input any values **/
$I->amGoingTo('Submit user form with invalid values');
$I->click('Save');





?>