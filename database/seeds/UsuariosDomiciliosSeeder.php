<?php

use Illuminate\Database\Seeder;

class UsuariosDomiciliosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\UsuarioDomicilio::class, 10)->create();
    }
}
