<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Contacto;

class ContactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contacto::factory(15)->create();
    }
}
