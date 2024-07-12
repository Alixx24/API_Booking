FROM laravel 

COPY . .

EXPOSE 8000

CMD ["php-fpm"]