
# Установка и настрока

## Установка и настройка Базы данных
- Устонавливаем и запускаем `mysql` сервер на `docker` 
```bash
docker run --name mysql -d \
    -p 3306:3306 \
    -e MYSQL_ROOT_PASSWORD=password \
    --restart unless-stopped \
    mysql:8 
```
- Подключаемся и создаем БД
```bash
# Подключаемся к контейнеру mysql
docker exec -it mysql bash

mysql -u root -p
# Вводим пароль password

# Создаем БД
CREATE DATABASE app_db;
```
- Прописываем в файле `.env` данные БД
```dotenv
DB_DATABASE=app_db
DB_USERNAME=root
DB_PASSWORD=password
```
> В `.env` Уже прописанные эти данные включая ссылку `http://www.cbr.ru/scripts/XML_daily.asp`
- Запускаем команду 
```bash
php artisan migrate
```
- Запускаем Сервкр
```bash
php artisan serve
```
> Переходим http://127.0.0.1:8001

### Получим резюльтат приблизительно такой
![img](screenshots/Снимок%20экрана%20от%202022-12-17%2022-45-12.png)

### 2. Вывод нужных валют вуказывается на странице `Настройки`
![img](screenshots/Снимок%20экрана%20от%202022-12-17%2022-45-48.png)

### Получаем результат
![img](screenshots/Снимок%20экрана%20от%202022-12-17%2022-46-01.png)

# Функционал который не реализован.
- Интервал обновления содержимого виджета.
- для каждой валюты должно быть ее текущее значение и изменение по отношению к предыдущему дню (показывать либо стрелкой «вверх», «вниз» либо выделять цветом – «красный» - курс упал, «зеленый» - курс вырос);
- AJAX использован только на странице Настройки для отправки запроса по `url`
```javascript
$('#formSetCharCodes').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: '{{ route('setXml') }}',
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success:function (response) {
                    // console.log(response);
                    window.location.replace("{{ route('index') }}");
                }
            });
        });
```


