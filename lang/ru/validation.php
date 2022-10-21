<?php

return [
    'required' => 'Поле :attribute обязательно к заполнению.',
    'email' => 'Некоректный :attribute ',
    'regex' => 'Неверный формат :attribute',
    'unique' => 'Данный :attribute уже зарегистрирован',
    'confirmed' => 'Поля :attribute не совпадают',
    'min' => [
        'string' => 'Поле :attribute должно быть как минимум :min символов.',
    ],
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
        'economic_activity' => 'Вид экономической деятельности',
        'password' => 'Пароль'
    ],
];