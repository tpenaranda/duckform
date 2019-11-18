<?php

use Illuminate\Database\Seeder;
use TPenaranda\Duckform\Facade\Duckform;
use TPenaranda\Duckform\Models\Form;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Duckform::factory(Form::class, 3)->states('with-questions')->create();
    }
}
