# Installation

Ensure you have docker installed on your machine. If on Linux docker will work natively, if no Windows install Docker Desktop through WSL2.

cd into the project dir and run

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```
This will install sail, composer dependencies through a mini container.

Then run the following command to create the network and containers
```bash
./vendor/bin/sail up -d
```
If for some reason in windows machine this does not work immediately restart your shell.

Create an .env file from the .env.example.
If you use sail default configuration should be:
```bash
APP_URL=http://spotawheel.test

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=spotawheel
DB_USERNAME=sail
DB_PASSWORD=password

// if you use debugger
SAIL_XDEBUG_MODE=develop,debug 
```

Generate app key
```bash
./vendor/bin/sail artisan key:generate
```

With your sql editor of choice (or though command line) create a schema named `spotawheel` and
run the migrations with seeds
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
