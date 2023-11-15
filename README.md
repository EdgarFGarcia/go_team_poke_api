# setup

run the following command first
```
composer install
```

set ```env``` database access to your desired config
run
```
php artisan migrate
```

run php artisan serve if you plan to run it directly
```
php artisan serve
```

or setup in nginx
(here's my nginx wsl2 config)
```
server{
        root /home/frankensteenie/projects/backend/go_team_poke_be/public;
        index index.php;
        server_name poke.test;
        location / {
                try_files $uri $uri/ /index.php?$query_string;
        }
        location ~ \.php$ {
                fastcgi_split_path_info ^(.+\.php)(/.+)$;
                fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
                fastcgi_index index.php;
                include fastcgi_params;
                fastcgi_param                   SCRIPT_FILENAME $document_root$fastcgi_script_name;
                fastcgi_read_timeout            60000;
        }

        error_log       /var/log/nginx/poke-error.log;
        access_log      /var/log/nginx/poke-access.log;
}
```

for
```
server_name poke.test;
```
you need to setup this up in
C:\Windows\System32\drivers\etc\hosts file
127.0.0.1        poke.test

after that, you need to restart nginx

enjoy!
