<?php

return [
    'required' => 'Поле :attribute обязательно к заполнению.',
    'email' => 'Некоректный :attribute ',
    'regex' => 'Неверный формат :attribute',
    'unique' => 'Данный :attribute уже зарегистрирован',
    'confirmed' => 'Поля :attribute не совпадают',
    'integer' => 'Поле :attribute должен быть числом.',
    'min' => [
        'string' => 'Поле :attribute должно быть как минимум :min символов.',
    ],
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    'attributes' => [
        'name' => 'название',
        'fullname' => 'фамилия, имя, отчество',
        'profession' => 'профессия',
        'email' => 'адрес эл. почты',
        'phone' => 'номер телефона',
        'type_of_ownership' => 'форма собственности',
        'economic_activity' => 'вид экономической деятельности',
        'password' => 'пароль',
        'date' => 'дата',
        'birthdate' => 'дата рождения',
        'department' => 'структурное подразделение',
        'factors' => 'факторы',
        'number' => 'номер направления'
    ],
];