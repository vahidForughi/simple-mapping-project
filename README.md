## Simple Mapping Project

Sync data between api and database.

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
