<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ArticlesFixture
 */
class ArticlesFixture extends TestFixture
{
    public $import = ['model' => 'Articles', 'records' => true];
    // public $import = ['table' => 'articles', 'connection' => 'test', 'records'=> true];
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    // public $fields = [
    //     'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
    //     'title' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
    //     'body' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
    //     'category_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => 1, 'comment' => '', 'autoIncrement' => false, 'precision' => null],
    //     'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
    //     'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
    //     '_constraints' => [
    //         'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
    //     ],
    //     '_options' => [
    //         'engine' => 'InnoDB',
    //         'collation' => 'utf8_general_ci'
    //     ],
    // ];
    // // @codingStandardsIgnoreEnd
    // /**
    //  * Init method
    //  *
    //  * @return void
    //  */
    // public function init()
    // {
    //     $this->records = [
    //         [
    //             'id' => 1,
    //             'title' => 'Lorem ipsum dolor sit amet',
    //             'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
    //             'category_id' => 1,
    //             'created' => '2021-03-29 15:46:00',
    //             'modified' => '2021-03-29 15:46:00',
    //         ],
    //         [
    //             'id' => 2,
    //             'title' => 'Article 2 title',
    //             'body' => 'Article 2 body.',
    //             'category_id' => 4,
    //             'created' => '2021-03-29 15:46:00',
    //             'modified' => '2021-03-29 15:46:00',
    //         ],
    //     ];
    //     parent::init();
    // }
}
