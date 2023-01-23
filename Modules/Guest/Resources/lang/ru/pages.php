<?php

return [
    'register' => [
        'buttons' => [
            'register' => 'Зарегистрироваться'
        ],
        'labels'  => [
            'user-type' => 'Вы'
        ]
    ],
    'login'    => [
        'buttons' => [
            'login' => 'Войти'
        ]
    ],
    'home'     => [
        'components' => [
            'banner' => [
                'title'    => 'Знакомства онлайн для содержанок и спонсоров',
                'subtitle' => config('app.name') . ' - сайт для поиска любовницы (содержанки) или спонсора в Москве и любом другом городе России, Украины или Беларуси.',
                'buttons'  => [
                    'register' => 'Разместить анкету'
                ]
            ]
        ]
    ]
];
