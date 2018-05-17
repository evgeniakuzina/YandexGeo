API для работы с сервисом Яндекс.Геокодирование
===============================================

Служба Яндекс.Карт предлагает своим пользователям сервис геокодирования. Он позволяет определять координаты и получать
сведения о географическом объекте по его названию или адресу и наоборот, определять адрес объекта на карте по его
координатам (обратное геокодирование).

Например, по запросу «Москва, ул. Малая Грузинская, д. 27/13» геокодер возвратит географические координаты этого
дома: «37.571309, 55.767190» (долгота, широта). И, наоборот, если в запросе указать географические координаты
дома «37.571309, 55.767190», то геокодер вернет его адрес.

Пример
------

```php
<?php
$api = new \Yandex\Geo\Api();

// Можно искать по точке
$api->setPoint(30.5166187, 50.4452705);

// Или можно икать по адресу
$api->setQuery('Тверская 6');

// Настройка фильтров
$api
    ->setLimit(1) // кол-во результатов
    ->setLang(\Yandex\Geo\Api::LANG_US) // локаль ответа
    ->load();

$response = $api->getResponse();
$response->getFoundCount(); // кол-во найденных адресов
$response->getQuery(); // исходный запрос
$response->getLatitude(); // широта для исходного запроса
$response->getLongitude(); // долгота для исходного запроса

// Список найденных точек
$collection = $response->getList();
foreach ($collection as $item) {
    $item->getAddress(); // вернет адрес
    $item->getLatitude(); // широта
    $item->getLongitude(); // долгота
    $item->getData(); // необработанные данные
}
```