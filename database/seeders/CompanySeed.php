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
            ['name' => 'ООО Газрегион',
            'type_of_ownership' => 'Частная собственность',
            'economic_activity' => 'Работы по сборке и монтажу сборных конструкций',
            'phone' => '(495) 000-0000',
            'email' => 'info@ssk-gaz.ru',
            'fullname' => 'Григорьев А.И.',
            'profession' => 'Ведущий специалист по ОТ',
            'user_id' => 16,
            'status' => '0'],
            ['name' => 'АО Ленгазспецстрой',
            'type_of_ownership' => 'Акционерное общество',
            'economic_activity' => 'Работы по сборке и монтажу сборных конструкций',
            'phone' => '(495) 000-0000',
            'email' => 'lgss@lgss.ru',
            'fullname' => 'Григорьев А.И.',
            'profession' => 'Ведущий специалист по ОТ',
            'user_id' => 16,
            'status' => '0'],
        ]);
    }
}
