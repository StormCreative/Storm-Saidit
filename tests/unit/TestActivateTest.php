<?php
use Codeception\Util\Stub;

class TestActivateTest extends \Codeception\TestCase\Test
{
   /**
    * @var \CodeGuy
    */
    protected $codeGuy;

    public function testSettingAttributes()
    {
        $model = new Test_model( array('title' => 'test title') );

        $this->assertTrue(count($model->attributes) == 1);
    }

    public function testMagicSetMethod()
    {
        $model = new Test_model();

        $model->name = 'test name';

        $this->assertNotEmpty($model->attributes['name']);
        $this->assertTrue($model->attributes['name'] == 'test name');
    }

    public function testMagicGetMethod()
    {
        $model = new Test_model();

        $this->assertFalse($model->name);

        $model->name = 'test name';

        $this->assertNotEmpty($model->name);
        $this->assertTrue($model->name == 'test name');
    }

    public function testSetWhereMethod()
    {
        $model = new Test_model();

        $output = $model->where('test.title LIKE :title');

        $this->assertNotNull($output);

        $this->assertNotEmpty($model->where_conditions);
        $this->assertTrue($model->where_conditions == array(DB_SUFFIX.'_test.title LIKE :title'));
    }

    public function testSetWhereMethodChaining()
    {
        $model = new Test_model();

        $model->where('test.title LIKE :title')->where('test.id = :id');

        $this->assertTrue( $model->where_conditions == array(DB_SUFFIX.'_test.title LIKE :title', DB_SUFFIX.'_test.id = :id'));
    }

    public function testBuildWhereClauseMethod()
    {
        $model = new Test_model();

        $result = $model->build_where_clause();

        $this->assertFalse( $result );

        $model->where('test.title LIKE :title')->where('test.id = :id');

        $result = $model->build_where_clause();

        $this->assertTrue( $result == DB_SUFFIX.'_test.title LIKE :title AND '.DB_SUFFIX.'_test.id = :id' );
    }

    public function testCleanTableMethod()
    {
        $model = new Test_model();

        $table = $model->clean_table();

        $this->assertTrue( $table == 'test' );
    }

    public function testFullTableMethod()
    {
        $model = new Test_model();
        $table = $model->full_table();

        $this->assertTrue( $table == DB_SUFFIX.'_test' );
    }

    public function testTableMethod()
    {
        $model = new Test_model();

        $table = $model->table();

        $this->assertNotEmpty($table);
    }

    public function testSetUpCourseColumns()
    {
        $model = new Test_model();

        $model->set_up_source_columns();

        $this->assertTrue( count($model->columns) > 0 );
    }

    public function testFindMethodSimple()
    {
        $model = new Test_model();

        $result = $model->find(1);
        
        $this->assertNotNull($result);
        $this->assertTrue(is_object($result));
    }

    public function testHasManyAssociation()
    {
        $model = new Test_model();

        $result = $model->find(1);
        
        $this->assertNotNull( $model->test_assoc );
        $this->assertTrue(is_array($model->test_assoc));
    }

    public function testHasOneAssociation()
    {
        $model = new Test_model();

        $result = $model->find(1);

        $this->assertNotNull($result->has_one_title);
    }

    public function testAllMethod()
    {
        $model = new Test_model();

        $result = $model->all();

        $this->assertTrue($result != false);
        $this->assertTrue(is_array($result));
    }


    public function testAllMethodWithWhere()
    {
        $model = new Test_model();

        $model->where('test.title = :title');

        $results = $model->all(array('title' => 'Hello number 1'));

        $this->assertNotNull($results);
        $this->assertTrue(is_array($results));
        $this->assertTrue(count($results) == 1);
        $this->assertTrue($results[0]['title'] == 'Hello number 1');
    }

    public function testAllMethodWithFalseWhere()
    {
        $model = new Test_model();

        $model->where('test.title = :title');

        $results = $model->all(array('title' => 'Hello number 2'));

        $this->assertNotNull($results);
        $this->assertTrue($results == false);
    }

    public function testSaveMethodWithAttributesPassedtoMethod()
    {
        $model = new Test_model();
        
        $output = $model->save( array('title' => 'Banana') );

        $this->assertTrue($output != false);

        $model = new Test_model();

        $model->find($output);

        $this->assertNotNull($model->id);
        $this->assertTrue($model->id == $output);

        $output = $model->delete();
        $this->assertTrue($output);
    }

    public function testSaveMethodWithAttributesPassedToConstructor()
    {
        $model = new Test_model(array('title' => 'Test banana'));

        $output = $model->save();

        $this->assertTrue($output != false);

        $model = new Test_model();

        $model->find($output);

        $this->assertNotNull($model->id);
        $this->assertTrue($model->id == $output);

        $output = $model->delete();
        $this->assertTrue($output);
    }

    public function testDynamicFind()
    {
        $model = new Test_model();

        $output = $model->find_where_title(array('title' => 'Hello number 1'));

        $this->assertNotNull($output);
        $this->assertTrue($model->id == 1);
    }

    public function testDynamicFindLike()
    {
        $model = new Test_model();

        $output = $model->find_where_title_like(array('title' => "%Hello%"));

        $this->assertNotNull($output);

        $this->assertTrue($model->id == 1);
    }

    public function testDynamicFindById()
    {
        $model = new Test_model();

        $output = $model->find_where_id(array('id' => 1));

        $this->assertTrue($model->id == 1);
        $this->assertNotNull($output);
    }

    public function testDeleteMethod()
    {
        $model = new Test_model(array('title' => 'Test banana'));

        $output = $model->save();

        $output = $model->delete();

        $this->assertTrue($output);
    }

}