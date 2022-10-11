sh bin/clear.sh
export APP_ENV=testing
php artisan migrate:fresh
php -d memory_limit=2048M artisan db:seed
