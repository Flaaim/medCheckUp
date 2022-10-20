<?php

return [
    'required' => 'Поле :attribute обязательно к заполнению.',
    'email' => 'Некоректный :attribute ',
    'regex' => 'Неверный формат :attribute',

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    'attributes' => [
        'name' => 'Название',
        'fullname' => 'Фамилия, Инициалы',
        'profession' => 'Профессия',
        'email' => 'Адрес эл. почты',
        'phone' => 'Номер телефона',
        'type_of_ownership' => 'Форма собственности',
        'economic_activity' => 'Вид экономической деятельности'
    ],
];