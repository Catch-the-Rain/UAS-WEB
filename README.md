Link: [uasweb.ct.ws](https://uasweb.infinityfreeapp.com/)


Saya sudah coba 4 hostingan tidak ada yang bisa karena tidak ada yang support laravel. untuk tampilan dan fungsi bisa dilihat di pdf. pada pdf saya sudah mencantumkan tampilan dan fungsi website.

# Laravel 8 - Ecommerce application

## Run Locally

Clone the project

```bash
  git clone https://github.com/abdulaziz-m5u/laravel-ecommerce.git project-name
```

Go to the project directory

```bash
  cd project-name
```

-   Copy .env.example file to .env and edit database credentials there

```bash
    composer install
```

```bash
    php artisan key:generate
```

```bash
    php artisan artisan migrate:fresh --seed
```

```bash
    php artisan storage:link
```

#### Login

-   email = admin@example.com
-   password = 123
