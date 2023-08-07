<?php

return [
    'actions' => 'Действия',
    'more_than' => 'более',
    'date' => 'Дата',
    'to' => 'до',

    'customer' => [
        'new_customer' => 'Новый Клиент',
        'customers' => 'Клиенты',
        'customer_number' => 'Номер Клиента',
        'create_new_customer' => 'Создать Нового Клиента',
        'add_customer' => 'Добавить Клиента',
        'edit_customer' => 'Редактировать Клиента',
        'customer_profile' => 'Профиль Клиента',
        'customer_details' => 'Данные Клиента',
        'customer_orders' => 'Заказы Клиента',
        'alerts' => [
            'customer_successfully_created' => 'Новый клиент был успешно создан!',
            'customer_successfully_updated' => 'Данные клиента были успешно сохранены!',
        ],
    ],

    'courier' => [
        'new_courier' => 'Новый Курьер',
        'couriers' => 'Курьеры',
        'courier_number' => 'Номер Курьера',
        'create_new_courier' => 'Создать Нового Курьера',
        'add_courier' => 'Добавить Курьера',
        'edit_courier' => 'Редактировать Курьера',
        'courier_profile' => 'Профиль Курьера',
        'courier_details' => 'Данные Курьера',
        'courier_orders' => 'Заказы Курьера',
        'alerts' => [
            'courier_successfully_created' => 'Новый курьер был успешно создан!',
            'courier_successfully_updated' => 'Данные курьера были успешно сохранены!',
        ],
    ],

    'user' => [
        'first_name' => 'Имя',
        'last_name' => 'Фамилия',
        'id_number' => 'Номер Т.З',
        'city' => 'Город',
        'country' => 'Страна',
        'address' => 'Адрес',
        'zip' => 'Индекс',
        'email' => 'Эл. Почта',
        'phone' => 'Телефон',
        'mobile' => 'Мобильный',
        'created_at' => 'Добавлен',
        'status' => 'Статус',
        'remarks' => 'Примечания',
        'profile' => 'Профиль',
        'car_number' => 'Номер Машины',
        'statuses' => [
            'active' => 'активный',
            'inactive' => 'неактивный',
        ],

    ],

    'order' => [
        'orders' => 'Заказы',
        'recipient' => 'Получатель',
        'customer' => 'Заказчик',
        'courier' => 'Курьер',
        'general_details' => 'Общая Информация',
        'recipient_details' => 'Данные Получателя',
        'contact_details' => 'Контактная Информация',
        'payment_details' => 'Платежная Информация',
        'additional_details' => 'Дополнительная Информация',
        'order_details' => 'Данные Заказа',
        'add_order' => 'Добавить Заказ',
        'edit_order' => 'Редактировать Заказ',
        'new_order' => 'Новый Заказ',
        'price' => 'Цена',
        'barcode' => 'Баркод',
        'create_new_order' => 'Создать Новый Заказ',
        'customer_details' => 'Данные Заказчика',
        'prepayment' => 'Предоплата',
        'payment' => 'Оплата',
        'box' => 'коробка',
        'statuses' => [
            'call' => 'Заказ Принят',
            'supply' => 'Картон Доставлен',
            'pickup' => 'Посылка Принята',
            'arrived' => 'Доставлено На Склад',
            'absorbed' => 'Посылка Оформлена',
            'waiting' => 'Ожидание Контейнера',
            'packaged' => 'Посылка Погружена',
            'taxes' => 'Таможенное Оформление',
            'transfer' => 'Посылка В Пути',
            'delivered' => 'Посылка Доставлена',
        ],

    ],

    'alert_titles' => [
        'success' => 'Подтверждение!',
        'error' => 'Ошибка!',
        'warning' => 'Предупреждение!',
    ],

    'alerts' => [
        'operation_failed' => 'Данное действие по технической ошибке было не выполнено!',
    ],
];
