<?php

return [
    'actions' => 'Действия',
    'more_than' => 'более',
    'date' => 'Дата',
    'to' => 'до',
    'no_files' => 'нет доступных документов',
    'welcome' => 'Добро пожаловать, ',

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
            'customer_successfully_deleted' => 'Данные клиента были успешно удалены!',
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
            'courier_successfully_deleted' => 'Данные курьера были успешно удалены!',
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
        'general_details' => 'Общие Данные',
        'recipient_details' => 'Данные Получателя',
        'customer_details' => 'Данные Заказчика',
        'courier_details' => 'Данные Курьера',
        'contact_details' => 'Контактная Информация',
        'payment_details' => 'Информация Платежа',
        'additional_details' => 'Дополнительная Информация',
        'order_number' => 'Номер Заказа',
        'order_details' => 'Информация Заказа',
        'order_status' => 'Статус Заказа',
        'add_order' => 'Добавить Заказ',
        'edit_order' => 'Редактировать Заказ',
        'new_order' => 'Новый Заказ',
        'price' => 'Цена',
        'barcode' => 'Баркод',
        'documents' => 'Документы',
        'files' => 'Файлы',
        'upload' => 'Загрузка',
        'create_new_order' => 'Создать Новый Заказ',
        'customer_details' => 'Данные Заказчика',
        'prepayment' => 'Предоплата',
        'payment' => 'Оплата',
        'box' => 'коробка',
        'no_orders' => 'Нет доступных заказов!',
        'orders_by_status' => 'Статусы',
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
        'alerts' => [
            'order_successfully_created' => 'Новый заказ был успешно создан!',
            'order_successfully_updated' => 'Данные заказа были успешно сохранены!',
            'order_successfully_deleted' => 'Данные заказа были успешно сохранены!',
        ],

    ],

    'payment' => [
        'income' => 'Доход',
        'total_income' => 'Общий Доход'
    ],


    'alert_titles' => [
        'success' => 'Подтверждение!',
        'error' => 'Ошибка!',
        'warning' => 'Предупреждение!',
    ],

    'alerts' => [
        'operation_failed' => 'Данное действие по технической ошибке было не выполнено!',
        'fields_are_required' => 'поля обязательны для заполнения',
        'file_successfully_deleted' => 'Документ был успешно удален!',
        'operation_failed' => 'Данное действие невозможно!',
        "customer_has_orders" => 'У клиента есть активные заказы.',
        "courier_has_orders" => 'У курьера есть активные заказы.',
    ],
];
