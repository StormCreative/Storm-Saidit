<?php

$I = new WebGuy($scenario);
$I->wantTo('Test the testtwo edit page');
$I->amOnPage('admin/testtwo/edit');

/** First check form cannot be sent if the user doesnt input any values **/
$I->amGoingTo('Submit user form with invalid values');
$I->click('Save');

$I->see("Upload can not be empty");
            

$I->amGoingTo("Submit testtwo form without a upload");
                                        $I->click("Save");
                                        

?>