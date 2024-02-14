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

### Install with Docker

Update your vendor packages

    docker-compose run --rm php composer update --prefer-dist 
    docker-compose run --rm php composer install
    docker-compose up -d
Apply migrations

    docker-compose run --rm php yii migrate --no-interaction

You can then access the application through the following URL:

    http://localhost

**NOTES:** 
- Дополнительные фичи WEB морды доступны после авторизации! (admin/admin)