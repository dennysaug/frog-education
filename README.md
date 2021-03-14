 Technical Test - Frog Education 
 
 [Tested & ran on Linux]

AdminLTE3 - Laravel 6 with docker (nginx, php, mysql)

To run with docker
    
    docker-compose up --build

You need run migration and seeder

    docker exec -it frog_php bash
    su <YOUR-USER ON LINUX>
    php artisan migrate --seed

Panel URL
    
    http://localhost/sysadmin/dashboard
    login: dennysaug@gmail.com
    password: root
