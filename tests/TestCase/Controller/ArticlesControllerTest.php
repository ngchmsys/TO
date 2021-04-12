<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ArticlesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\ArticlesController Test Case
 *
 * @uses \App\Controller\ArticlesController
 */
class ArticlesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    public static function DBDataProvider()
    {
        $q = TableRegistry::getTableLocator()->get('Articles');
        return $q;
    }

    public static function setUpBeforeClass()
    {
        $DBData = self::DBDataProvider();
        echo "\n!!!! COUNT: " . $DBData->find('all')->count();
        print_r($DBData->find('all'));
        $entities = $DBData->newEntities($DBData->find('all')->toArray());
        foreach($entities as $e) {
            $DBData->save($e);
            echo "\n!!!! COUNT: " . $DBData->find('all')->count();
        }
    }
    public function setUp()
    {
        parent::setUp();
        // $this->autoFixtures = false;
        // $this->dropTables = false;
        $this->enableCsrfToken();
        $this->Articles = TableRegistry::getTableLocator()->get('Articles');
        echo "\n!!!! COUNT: " . $this->Articles->find('all')->count();
        // print_r($this->Articles->find('all')->all());
        // echo "*************************************\n";
        // // var_dump($this->Articles->find('all')->all()); # tsmyappデータベースから取得したデータ
    }
    /**
     * Fixtures
     *
     *  これを書いていると、DBのテーブルが消去される。
     * 
     * @var array
     */
    public $fixtures = ['app.Articles',];
    // public $fixtures = [];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/articles');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView($id = null)
    {
        $this->get('/articles/view/1');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $data = [
            [
//                'id' => 1,
                'title' => 'My Set Data !!!',
                'body' => 'Lorem ipsum dolo convallis.',
                'category_id' => 1,
                'created' => '2021-03-29 15:46:00',
                'modified' => '2021-03-29 15:46:00',
            ],
            [
//                'id' => 2,
                'title' => 'My Set Data2 !!!',
                'body' => 'ASD rem ipolo convallis.',
                'category_id' => 2,
                'created' => '2021-04-29 15:46:00',
                'modified' => '2021-04-29 15:46:00',
            ],
        ];
        foreach($data as $d) {
            $this->post('/articles/add', $d);
            $this->assertResponseSuccess();
        }

        $q = $this->Articles->find()->where(['title' => $data[1]['title']]);
        print_r($q->find('all')->all());
        echo "*************************************\n";
        $this->assertEquals(1, $q->count());
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $data = [
            'title' => 'My Edited Data !!!',
        ];
        $this->put('/articles/edit/1', $data);
        $this->assertResponseSuccess();
        print_r($this->Articles->find('all')->all());
        echo "*************************************\n";

        $q = $this->Articles->find()->where(['title' => $data['title']]);
        $this->assertEquals(1, $q->count());
        // print_r($q->find('all')->all());
        // echo "*************************************\n";
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $data = [
            [
                'id' => 1,
            ],
            [
                'id' => 2,
            ],
        ];
        foreach($data as $d) {
            $q = $this->Articles->get($d['id']);
            $this->assertEquals(1, $q->count());

            $this->post("/articles/delete/{$d['id']}");
            $this->assertResponseSuccess();

            $q = $this->Articles->get($d['id']);
            $this->assertEquals(0, $q->count());
        }

        // print_r($q->find('all')->all());
        // echo "*************************************\n";
    }

    public function afterTearDown()
    {
        
    }
}
