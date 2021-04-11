<?php
use Migrations\AbstractSeed;

/**
 * Categories seed.
 */
class CategoriesSeed extends AbstractSeed
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
                'name' => 'CakePHP',
                'created' => '2021-04-10 09:00:00',
                'modified' => '2021-04-10 09:00:00',
            ],
            [
                'name' => 'Git',
                'created' => '2021-04-10 09:00:00',
                'modified' => '2021-04-10 09:00:00',
            ],
            [
                'name' => 'MySQL',
                'created' => '2021-04-10 09:00:00',
                'modified' => '2021-04-10 09:00:00',
            ],
            [
                'name' => 'UnitTest',
                'created' => '2021-04-10 09:00:00',
                'modified' => '2021-04-10 09:00:00',
            ],
        ];

        $table = $this->table('categories');
        $table->insert($data)->save();
    }
}
