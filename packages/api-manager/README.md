# Laravel Api Manager

Don`t need any more, Just fill your yaml config and enjoy ...

## Usage


config/mappers/sample.yml
```yaml
config:
    url: "https://"
    data_key: data
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

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
