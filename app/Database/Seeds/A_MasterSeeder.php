<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class A_MasterSeeder extends Seeder
{
    public function run()
    {
        $this->call('TabelUser');
        $this->call('TabelProducts');
    }
}
