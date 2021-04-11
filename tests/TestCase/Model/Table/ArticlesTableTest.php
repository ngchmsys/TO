<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArticlesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

use Cake\I18n\FrozenTime;
use Cake\Validation\Validator;

/**
 * App\Model\Table\ArticlesTable Test Case
 */
class ArticlesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ArticlesTable
     */
    public $Articles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Articles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Articles') ? [] : ['className' => ArticlesTable::class];
        $this->Articles = TableRegistry::getTableLocator()->get('Articles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Articles);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $validator = $this->Articles->validationDefault(new Validator());
        $this->assertInstanceOf('Cake\Validation\Validator', $validator);
        var_dump($validator);

        // $this->markTestIncomplete('Not implemented yet.');
    }

    public function testFind()
    {
        $query = $this->Articles->find();
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->enableHydration(false)->toArray();
        $expected = [
            [
                'id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'created' => new FrozenTime('2021-03-29 15:46:00'),
                'modified' => new FrozenTime('2021-03-29 15:46:00'),
            ],
            [
                'id' => 2,
                'title' => 'Article 2 title',
                'body' => 'Article 2 body.',
                'created' => new FrozenTime('2021-03-29 15:46:00'),
                'modified' => new FrozenTime('2021-03-29 15:46:00'),
            ],

        ];
        $this->assertEquals($expected, $result);
    }

    public function testGet()
    {
        $id = 2;
        $query = $this->Articles->get($id, [
            'contain' => [],
        ]);
        $this->assertInstanceOf('App\Model\Entity\Article', $query);
        $result = $query->toArray();
        $expected = [
            'id' => 2,
            'title' => 'Article 2 title',
            'body' => 'Article 2 body.',
            'created' => new FrozenTime('2021-03-29 15:46:00'),
            'modified' => new FrozenTime('2021-03-29 15:46:00'),
        ];
        $this->assertEquals($expected, $result);
    }

}
