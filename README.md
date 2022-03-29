# Installation

cd into the project dir and run
```bash
./vendor/bin/sail up -d
```

If you use sail default configuration should be:
```bash
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=spotawheel
DB_USERNAME=sail
DB_PASSWORD=password
```


Run the migrations with seeds
```bash
./vendor/bin/sail artisan migrate --seed
```

Set your APP_URL and add it to your hosts file

Run the export csv command specifying startDate endDate fields in Y-m-d H:i:s format else the latest 30 days are used.
```bash
./vendor/bin/sail artisan export:latestPayment <startDate> <endDate>
```


If you do not use sail but have docker enabled on your machine you can use following commands:
```bash
docker-compose up -d
```

and
```bash
docker-compose exec --u sail laravel.test bash
```
to have a shell inside the container and run artisan commands normally from there
