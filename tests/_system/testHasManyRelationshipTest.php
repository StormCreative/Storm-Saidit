<?php
use Codeception\Util\Stub;

class TestHasManyRelationshipTest extends \Codeception\TestCase\Test
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
                                       'associations' => 'test_assoc');

        $this->assoc_image = array('id' => 1, 
                                       'table' => 'test',
                                       'associations' => 'test_assoc:image');
    }

    public function testInstantianWithOptions()
    {
        $has_many = new Has_many($this->assoc_no_image);

        $this->assertNotNull($has_many->primary_key_value);
        $this->assertNotNull($has_many->table);
        $this->assertNotNull($has_many->associations);
    }

    public function testGetMethodWithImageAssoc()
    {
        $has_many = new Has_many($this->assoc_image);

        $results = $has_many->get();
        
        $this->assertNotNull( $results['test_assoc'][0]['image'] );
    }

    public function testGetMethodYieldsResults()
    {
        $has_many = new Has_many($this->assoc_no_image);

        $results = $has_many->get();

        $this->assertNotNull($results);
        $this->assertTrue($results != false);
        $this->assertTrue(is_array($results));
    }

}
