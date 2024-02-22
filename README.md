# docs to test api with use docker (laravel sail)

## 1. add config file

```text
rename .env.example to .env
```

## 2. composer and npm install

```bash
composer i
npm i
```

## 3. run/start docker

```bash
./vendor/bin/sail up -d
```

## 4. make migration (not required - should have with docker)

```bash
./vendor/bin/sail artisan migrate:fresh
```

## 5. url to test API with POST request

```text
http://localhost/api/submit
```

***JSON payload:***

```text
{
    "name": "John Doe",
    "email": "john.doe@example.com",
    "message": "This is a test message."
}
```

## 6. Unit tests

### 6.1 make DB migration

```bash
./vendor/bin/sail artisan migrate:fresh --env=testing
```

### 6.2 run test

```bash
./vendor/bin/sail artisan test --filter SubmissionControllerTest
```
