# How to run project

- open git bash

## Run server-side

- access backend folder

```bash
    cd backend/
```

- install composer

```bash
    composer install
```

- generate key .env

```bash
    cp .env.example .env && php artisan key:generate
```

- run server-side

```bash
    php artisan ser
```

## Run client-side

- access client folder

```bash
    cd client/
```

- install node_modules and run client-side

```bash
    npm install && npm run dev
```
