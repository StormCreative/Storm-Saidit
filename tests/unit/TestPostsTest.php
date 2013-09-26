<?php
use Codeception\Util\Stub;

class TestPostTest extends \Codeception\TestCase\Test
{
   /**
    * @var \CodeGuy
    */
    protected $codeGuy;

    public function testHasOneInstantiates()
    {
    	$this->codeGuy->seeInDatabase('users', array('id' => 1));

    	$this->assertTrue(1==1);
    }


}