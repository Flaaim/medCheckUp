<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function(BreadcrumbTrail $trail){
    $trail->push('Главная', route('home'));
});
Breadcrumbs::for('welcome', function(BreadcrumbTrail $trail){
    $trail->push('Главная', route('welcome'));
});

        #AUTH 
Breadcrumbs::for('login', function(BreadcrumbTrail $trail){
    $trail->parent('welcome');
    $trail->push('Вход', route('login'));
});

Breadcrumbs::for('register', function(BreadcrumbTrail $trail){
    $trail->parent('welcome');
    $trail->push('Регистрация', route('register'));
});
Breadcrumbs::for('password.request', function(BreadcrumbTrail $trail){
    $trail->parent('home');
    $trail->push('Восстановление пароля', route('password.request'));
});
Breadcrumbs::for('password.reset', function(BreadcrumbTrail $trail, $token){
    $trail->parent('home');
    $trail->push('Изменение пароля', route('password.reset', $token));
});
Breadcrumbs::for('password.confirm', function(BreadcrumbTrail $trail){
    $trail->parent('home');
    $trail->push('Подтверждение пароля', route('password.confirm'));
});
Breadcrumbs::for('verification.notice', function(BreadcrumbTrail $trail){
    $trail->parent('home');
    $trail->push('Подтверждение почты', route('verification.notice'));
});


    # Company
Breadcrumbs::for('company.create', function(BreadcrumbTrail $trail){
    $trail->parent('home');
    $trail->push('Создать компанию', route('company.create'));
});

Breadcrumbs::for('company.edit', function(BreadcrumbTrail $trail, $company){
    $trail->parent('home');
    $trail->push('Изменить компанию', route('company.edit', $company));
});
Breadcrumbs::for('company.change', function(BreadcrumbTrail $trail){
    $trail->parent('home');
    $trail->push('Сменить компанию', route('company.change'));
});

    # Direction 

Breadcrumbs::for('direction.create', function(BreadcrumbTrail $trail){
    $trail->parent('home');
    $trail->push('Создать направление', route('direction.create'));
});
Breadcrumbs::for('direction.edit', function(BreadcrumbTrail $trail, $direction){
    $trail->parent('home');
    $trail->push('Изменить направление', route('direction.edit', $direction));
});
Breadcrumbs::for('direction.show_export', function(BreadcrumbTrail $trail, $company){
    $trail->parent('home');
    $trail->push('Экспорт данных', route('direction.show_export', $company));
});

    # Settings

Breadcrumbs::for('settings', function(BreadcrumbTrail $trail){
    $trail->parent('home');
    $trail->push('Настройки', route('settings'));
});
Breadcrumbs::for('harmfulfactors.index', function(BreadcrumbTrail $trail){
    $trail->parent('settings');
    $trail->push('Импорт факторов', route('harmfulfactors.index'));
});

    # 404 
Breadcrumbs::for('fallback', function(BreadcrumbTrail $trail){
    $trail->parent('home');
    $trail->push('Ошибка 404', route('fallback'));
});   