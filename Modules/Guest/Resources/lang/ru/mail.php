<?php

return [
    'email-verify' => [
        'subject' => 'Регистрация на сайте ' . config('app.name'),
        'title'   => 'Спасибо за регистрацию на ' . config('app.name'),
        'labels'  => [
            'password' => 'Новый пароль для Вашей учётной записи: :password'
        ]
    ]
];
