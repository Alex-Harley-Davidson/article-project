<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px" alt="logo">
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

В файле `common\config\main-local.php` настроить подключение к базе данных:

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

Функционал API:
---------------

Получение списка статей:

```
GET http://localhost:20080/articles
```

Получение одной статьи, где `<id>` идентификатор статьи:

```
GET http://localhost:20080/articles/<id>
```

Поиск статьи по названию, где `<title>` название статьи:

```
GET http://localhost:20080/search/article-by-title/<title>
```

Поиск статей по автору, где `<authorId>` идентификатор автора:

```
GET http://localhost:20080/search/article-by-author/<authorId>
```

Поиск статей по категории, где `<categoryId>` идентификатор категории:

```
GET http://localhost:20080/search/article-by-category/<categoryId>
```

Получение автора, где `<id>` его идентификатор:

```
GET http://localhost:20080/articles/<id>
```

Получение категории статьи, где `<id>` её идентификатор:

```
GET http://localhost:20080/article-categories/<id>
```