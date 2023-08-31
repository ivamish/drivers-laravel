<x-layout.main>

    <main class="container vh-100">

        <h1 class="mt-5">Просмотр заказа</h1>
        <div class="row mt-5 h-100">

            <div class="col-md">

                <h3 class="text-danger">{{$address}}</h3>

                <div id="map" style="width: 600px; height: 400px"></div>
            </div>

        </div>

    </main>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=6ff5e6ee-39d5-403d-8222-d4e116d41928&lang=ru_RU" type="text/javascript"></script>
    <script type="text/javascript">
        // Функция ymaps.ready() будет вызвана, когда
        // загрузятся все компоненты API, а также когда будет готово DOM-дерево.
        ymaps.ready(init);
        function init(){
            // Создание карты.
            var myMap = new ymaps.Map("map", {
                // Координаты центра карты.
                // Порядок по умолчанию: «широта, долгота».
                // Чтобы не определять координаты центра карты вручную,
                // воспользуйтесь инструментом Определение координат.
                center: [55.76, 37.64],
                // Уровень масштабирования. Допустимые значения:
                // от 0 (весь мир) до 19.
                zoom: 7
            });
            var multiRoute = new ymaps.multiRouter.MultiRoute({
                // Точки маршрута. Точки могут быть заданы как координатами, так и адресом.
                referencePoints: [
                    [52.218658, 104.278075],
                    [52.2627588, 104.3505665]// улица Льва Толстого.
                ]
            }, {
                // Автоматически устанавливать границы карты так,
                // чтобы маршрут был виден целиком.
                boundsAutoApply: true
            });

            // Добавление маршрута на карту.
            myMap.geoObjects.add(multiRoute);
        }
    </script>
</x-layout.main>
