<?php
use Migrations\AbstractSeed;

/**
 * Articles seed.
 */
class ArticlesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'Test Data 1',
                'body' => 'Test TEST tEsT',
                'category_id' => '1',
                'created' => '2021-04-10 09:00:00',
                'modified' => '2021-04-10 09:00:00',
            ],
            [
                'title' => 'Test Data 2',
                'body' => 'Test2 TEST2 tEsT2',
                'category_id' => '1',
                'created' => '2021-04-10 10:00:00',
                'modified' => '2021-04-10 10:00:00',
            ],
            [
                'title' => 'Test Data 3',
                'body' => 'Test3 TEST3 tEsT3',
                'category_id' => '2',
                'created' => '2021-04-10 13:00:00',
                'modified' => '2021-04-10 13:00:00',
            ]
        ];

        $table = $this->table('articles');
        $table->insert($data)->save();
    }
}
