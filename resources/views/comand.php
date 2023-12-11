php artisan migrate --path=/database/migrations/fileName.php

php artisan serve
npm run dev

php artisan route:cache
php artisan cache:clear
php artisan config:cache
php artisan view:clear
php artisan optimize

php artisan storage:link


php artisan key:generate

php artisan livewire:publish --assets


php artisan optimize:clear
composer dumpautoload -o
or you can do it manualy by deleting your cache in app/bootstrap and storage/cache
and you can set your APP_URL in .env file and livewire.php file inside config/livewire.php


php artisan config:cache
php artisan route:cache
