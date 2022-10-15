<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CompanySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => 'ООО Газрегион',
            'type_of_ownership' => 'Частная собственность',
            'economic_activity' => 'Работы по сборке и монтажу сборных конструкций',
            'ogrn' => '',
            'email' => 'info@ssk-gaz.ru',
            'user_id' => 1
        ]);
    }
}
