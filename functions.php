<?php

require __DIR__ . '/vendor/autoload.php';

$api = new \Yandex\Geo\Api();

$places = [];

class Place 
{
    public $latitude;
    public $longitude;
}

if (isset($_POST['address'])) {
    $api->setQuery($_POST['address']);

    // Настройка фильтров
    $api
        ->setLimit(5) // кол-во результатов
        ->setLang(\Yandex\Geo\Api::LANG_US) // локаль ответа
        ->load();

    $response = $api->getResponse();

// Список найденных точек
    $collection = $response->getList();
    foreach ($collection as $item) {
        $lat = $item->getLatitude(); // широта
        $long = $item->getLongitude(); // долгота
        $newPlace = new Place();
        $newPlace->latitude = $lat;
        $newPlace->longitude = $long;
        $places[] = $newPlace;
    }
    
}


?>

