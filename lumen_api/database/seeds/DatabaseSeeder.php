<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call('UserTableSeeder');
         User::create(array(
            'nama_user'=>'gareng',
            'email'=>'gareng@garengstudio.com',
            'password'=>bcrypt('gareng123'),
        ));

        Model::reguard();
    }
}
