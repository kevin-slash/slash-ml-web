# For current local project
cp .env.example .env
composer install
php artisan vendor:publish
npm install
bower install
