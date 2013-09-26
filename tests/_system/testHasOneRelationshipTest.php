<?php
use Codeception\Util\Stub;

class TestHasOneRelationshipTest extends \Codeception\TestCase\Test
{
   /**
    * @var \CodeGuy
    */
    protected $codeGuy;

    protected $assoc_no_image = array();

    protected $assoc_image = array();

    public function __Construct()
    {
        $this->assoc_no_image = array('id' => 1, 
                                       'table' => 'test',
                                       'associations' => 'has_one');

        $this->assoc_image = array('id' => 1, 
                                       'table' => 'test',
                                       'associations' => 'has_one:image');
    }

    public function testHasOneInstantiates()
    {
        $has_one = new Has_one($this->assoc_no_image);

        $this->assertNotNull($has_one);
    }

    public function testBuildUpJoins()
    {
        $has_one = new Has_one($this->assoc_no_image);

        $joins = $has_one->build_relationship();

        $this->assertTrue($joins != false);
        $this->assertTrue(count($joins) > 0);
    }

    public function testGetHasOneColumns()
    {
        $has_one = new Has_one($this->assoc_no_image);

        $has_one->get_has_one_columns(DB_SUFFIX.'_has_one');

        $this->assertTrue(count($has_one->columns) > 0);
    }

    public function testGet()
    {
        $has_one = new Has_one($this->assoc_no_image);

        $result = $has_one->get();

        $this->assertTrue($result['joins'] == 'LEFT JOIN pegisis_has_one ON pegisis_test.has_one_id = pegisis_has_one.id');
        $this->assertTrue(count($result)>0);
        $this->assertTrue(count($result['joins'])>0);
        $this->assertTrue(count($result['columns'])>0);
    }
    
}