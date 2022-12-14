<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PsychoFactorsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('psychofactors')->insert([
            [
                'alias' => 'Деятельность, связанная с управлением транспортными средствами...',
                'title' => 'Деятельность, связанная с управлением транспортными средствами или управлением движением транспортных средств по профессиям и должностям согласно перечню работ, профессий, должностей, непосредственно связанных с управлением транспортными средствами или управлением движением транспортных средств'
            ],
            [
                'alias' => 'Деятельность, связанная с производством, транспортировкой, хранением и применением взрывчатых материалов и веществ.',
                'title' => 'Деятельность, связанная с производством, транспортировкой, хранением и применением взрывчатых материалов и веществ.'
            ],
            [
                'alias' => 'Деятельность в области использования атомной энергии...',
                'title' => 'Деятельность в области использования атомной энергии, осуществляемая работниками объектов использования атомной энергии при наличии у них разрешений, выдаваемых органами Федеральной службы по экологическому, технологическому и атомному надзору'
            ],
            [
                'alias' => 'Деятельность, связанная с оборотом оружия.',
                'title' => 'Деятельность, связанная с оборотом оружия.'
            ],
            [
                'alias' => 'Деятельность, связанная с проведением аварийно-спасательных работ...',
                'title' => 'Деятельность, связанная с проведением аварийно-спасательных работ, а также с работой, выполняемой пожарной охраной при тушении пожаров.'
            ],
            [
                'alias' => 'Деятельность, непосредственно связанная с управлением подъемными механизмами (кранами)',
                'title' => 'Деятельность, непосредственно связанная с управлением подъемными механизмами (кранами), подлежащими учету в органах Федеральной службы по экологическому, технологическому и атомному надзору'
            ],
            [
                'alias' => 'Деятельность по непосредственному забору, очистке и распределению воды питьевых нужд...',
                'title' => 'Деятельность по непосредственному забору, очистке и распределению воды питьевых нужд систем централизованного водоснабжения'
            ],
            [
                'alias' => 'Педагогическая деятельность в организациях, осуществляющих образовательную деятельность.',
                'title' => 'Педагогическая деятельность в организациях, осуществляющих образовательную деятельность.'
            ],
            [
                'alias' => 'Деятельность по присмотру и уходу за детьми.',
                'title' => 'Деятельность по присмотру и уходу за детьм'
            ],
            [
                'alias' => 'Деятельность, связанная с работами с использованием сведений, составляющими государственную тайну.',
                'title' => 'Деятельность, связанная с работами с использованием сведений, составляющими государственную тайну.'
            ],
            [
                'alias' => 'Деятельность в сфере электроэнергетики...',
                'title' => 'Деятельность в сфере электроэнергетики, связанная с организацией и осуществлением монтажа, наладки, технического обслуживания, ремонта, управления режимом работы электроустановок'
            ],
            [
                'alias' => 'Деятельность в сфере теплоснабжения...',
                'title' => 'Деятельность в сфере теплоснабжения, связанная с организацией и осуществлением монтажа, наладки, технического обслуживания, ремонта, управления режимом работы объектов теплоснабжения'
            ],
            [
                'alias' => 'Деятельность, непосредственно связанная с обслуживанием оборудования, работающего под избыточным давлением более 0,07 МПа...',
                'title' => 'Деятельность, непосредственно связанная с обслуживанием оборудования, работающего под избыточным давлением более 0,07 МПа и подлежащего учету в органах Федеральной службы по экологическому, технологическому и атомному надзору'
            ],
            [
                'alias' => 'Деятельность, непосредственно связанная с диспетчеризацией производственных процессов в химической (нефтехимической) промышленности...',
                'title' => 'Деятельность, непосредственно связанная с диспетчеризацией производственных процессов в химической (нефтехимической) промышленности, включая деятельность операторов производственного оборудования в химической (нефтехимической) промышленности (при производстве химических веществ 1 и 2 классов опасности).'
            ],
            [
                'alias' => 'Деятельность, связанная с добычей угля подземным способоми...',
                'title' => 'Деятельность, связанная с добычей угля подземным способом'
            ],
            [
                'alias' => 'Деятельность, связанная с эксплуатацией, ремонтом скважин и установок при переработке высокосернистой нефти...',
                'title' => 'Деятельность, связанная с эксплуатацией, ремонтом скважин и установок при переработке высокосернистой нефти, очистке нефти и газа от сероводорода, очистке нефтеналивных судов, цистерн, резервуаров, добычей и обработкой озокерита, экстракционноозокеритовым производством'
            ],
            [
                'alias' => 'Деятельность, непосредственно связанная с контактами с возбудителями инфекционных заболеваний...',
                'title' => 'Деятельность, непосредственно связанная с контактами с возбудителями инфекционных заболеваний - патогенными микроорганизмами I и II группы патогенности, возбудителями особо опасных инфекций, а также с биологическими токсинами (микробного, растительного и животного происхождения) или с доступом к указанным субстанциям'
            ],
        ]);
    }
}
