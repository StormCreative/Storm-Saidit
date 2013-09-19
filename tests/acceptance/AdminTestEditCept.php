<?php

$I = new WebGuy($scenario);
$I->wantTo('Test the test edit page');
$I->amOnPage('admin/test/edit');

/** First check form cannot be sent if the user doesnt input any values **/
$I->amGoingTo('Submit user form with invalid values');
$I->click('Save');

$I->see("Upload can not be empty");
            $I->see("Title can not be empty");
            $I->see("Msg can not be empty");
            

$I->amGoingTo("Submit test form without a upload");
                                        $I->click("Save");
                                        $I->fillField ( "test[title]", "Acceptance Test" );
                        $I->fillField ( "test[msg]", "Acceptance Test" );
                        $I->amGoingTo("Submit test form without a title");
                                        $I->click("Save");
                                        $I->fillField ( "test[upload]", "Acceptance Test" );
                        $I->fillField ( "test[msg]", "Acceptance Test" );
                        $I->amGoingTo("Submit test form without a msg");
                                        $I->click("Save");
                                        $I->fillField ( "test[upload]", "Acceptance Test" );
                        $I->fillField ( "test[title]", "Acceptance Test" );
                        

?>