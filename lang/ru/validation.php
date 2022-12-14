<?php

return [
    'required' => 'Поле :attribute обязательно к заполнению.',
    'email' => 'Некоректный :attribute ',
    'regex' => 'Неверный формат :attribute',
    'unique' => 'Поле :attribute с таким значением уже есть',
    'confirmed' => 'Поля :attribute не совпадают',
    'integer' => 'Поле :attribute должен быть числом.',
    'min' => [
        'string' => 'Поле :attribute должно быть как минимум :min символов.',
    ],

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'harmfulFactors' => [
            'required' => 'Необходимо загрузить файл'
        ],
        '*.profession' => [
            'required' => 'В загружаемой таблице одно или несколько ячеек не заполнены.',
            'distinct' => 'В загружаемой таблице одинаковые значения',
        ],
        '*.harmfulfactor' => [
            'required' => 'В загружаемой таблице одно или несколько ячеек не заполнены.'
        ]

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
        'number' => 'номер направления',
        'harmfulFactors' => 'файл',
        'harmfulfactor' => 'вредный фактор',
        'clinicName' => 'наименование медучреждения',
        'clinicAddress' => 'адрес',
        'clinicOgrn' => 'код по ОГРН',
        'clinicEmail' => 'адрес эл.почты',
        'clinicPhone' => 'номер телефона',
    ],
];