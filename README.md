<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Article Project</h1>
    <br>
</p>

Инструкция по установке:
------------------------

Установка пакетов при помощи композера:

```
docker-compose run --rm backend composer install
```

Инициализация приложения:

```
docker-compose run --rm backend php init
```

В файле common\config\main-local.php настроить подключение к базе данных:

```
'dsn' => 'mysql:host=mysql;dbname=article_project',
'username' => 'user',
'password' => '12345',
```

Запустить приложение:

```
docker-compose up -d
```

Применить миграции:

```
docker-compose run --rm backend php yii migrate
```

Заполнить таблицы тестовыми данными:

```
docker-compose run --rm backend php yii data/generate
```