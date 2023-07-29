## Simple Mapping Project

Sync data between api and database.

## Installation

add packages:
```bash
composer install
```

database initialize:
```bash
php artisan migrate
php artisan db:seed
```

run server:
```bash
php artisan serve
```

basic auth 
```
username: test@test.com
pass: password
```

## Usage

config/mappers/sample.yml
```yaml
config:
    url: "https://"
    fields:
        id:
            type: int
            key: id
        title:
            type: string
            key: name
        content:
            type: html
            key: body
        abilities:
            type: array
            key: permissions
        created_at:
            type: date
            key: generated_at
```

controller.php
```php
$data = ApiManager::init('teams')
                ->fetch()   // you can setContent instead
                ->extractWithStrategy(new JsonStructure()) //  can use extractWithFactory('json') instead
                ->mapping(new TeamsMappingStrategy())
                ->getData();
```
