<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
          ['title' => 'Admin', 'slug' => 'admin'],
          ['title' => 'customer', 'slug' => 'customer']
        ];

        foreach($role as $data){
          Role::create($data);
        }
    }
}
