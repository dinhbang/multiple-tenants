<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 * CreateTestUsers seed.
 */
class CreateTestUsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        $table = $this->table('users');
        $data[] = [
            'username'      => 'dinhbang19',
            'password'      => (new DefaultPasswordHasher)->hash('123ABC'),
            'password_salt' => sha1('rereHLY#$'),
            'email'         => 'dinhbang19@gmail.com',
            'first_name'    => 'Bang',
            'last_name'     => 'Truong',
            'created'       => date('Y-m-d H:i:s'),
        ];
        $table->insert($data)->save();
    }
}
