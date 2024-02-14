<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic Project Template</h1>
    <br>
</p>

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      forms/              contains forms (DTO) classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources

INSTALLATION
------------


**NOTES:**
- Дополнительные фичи WEB доступны после авторизации! (admin/admin)
- Фильтрация статей через стандартные средства Yii (доступные фильтры title, authorFilter, categoryFilter): http://localhost/api/articles?filter[categoryFilter][like]=Lev
- REST запросы по стандартам Yii2: http://localhost/api/articles http://localhost/api/articles1 e.t.c (доступны только список и просмотр конкретной записи. Связанные поля описаны в extraFields())
- использование Repository/Service/DTO - в данном примере считаю избыточным overhead, да и на принципы Yii2 это ложится не очень хорошо. Тут только словами объяснить могу.

### Install with Docker

Update your vendor packages

    docker-compose run --rm php composer update --prefer-dist 
    docker-compose run --rm php composer install
    docker-compose up -d
Apply migrations

    docker-compose run --rm php yii migrate --no-interaction

You can then access the application through the following URL:

    http://localhost
 