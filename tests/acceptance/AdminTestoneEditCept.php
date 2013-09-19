<?php

$I = new WebGuy($scenario);
$I->wantTo('Test the testone edit page');
$I->amOnPage('admin/testone/edit');

/** First check form cannot be sent if the user doesnt input any values **/
$I->amGoingTo('Submit user form with invalid values');
$I->click('Save');

$I->see("Upload can not be empty");
            

$I->amGoingTo("Submit testone form without a upload");
                                        $I->click("Save");
                                        

?>