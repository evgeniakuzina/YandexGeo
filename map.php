<?php

require('functions.php');

?>

<!DOCTYPE html>
<html>
<head>
    <title>Карта</title>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript">
    </script>
    <script type="text/javascript">
        ymaps.ready(init);
        var myMap, 
            myPlacemark;

        function init(){ 
            myMap = new ymaps.Map("map", {
                center: [<?php echo $_GET['latitude'];?>, <?php echo $_GET['longitude'];?>],
                zoom: 7
            }); 
            
            myPlacemark = new ymaps.Placemark([<?php echo $_GET['latitude'];?>, <?php echo $_GET['longitude'];?>], {
                hintContent: '',
                balloonContent: ''
            });
            
            myMap.geoObjects.add(myPlacemark);
        }
    </script>
</head>
<body>
    <?php foreach ($places as $place) : ?>
        <p><a href="?latitude=<?php echo $place->latitude; ?>&longitude=<?php echo $place->longitude; ?>">
            <?php echo $place->latitude . ', ' . $place->longitude; ?></a></p>
        <?php endforeach; ?> 
    <div id="map" style="width: 1500px; height: 1000px"></div>
</body>
</html>