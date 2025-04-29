# Laravel xml platform

## steps to run it

### 0 - requirements
- php version>=8.4
- composer version>2.8
- git version>=2.8
- node version>=22
- mysql version>=8

### 1 - install the project
```shell
git clone https://github.com/karimaouaouda/laravel-xml.git --depth=1
cd laravel-xml # access to project dir
```

### 2 - install the dependencies
````shell
composer install
npm install
````

### 3 - run the project and that's it !
````shell
start php artisan serve # start dev server
start php artisan queue:work # start queue server to execute the jobs (for notifications)
start npm run dev # in case u want to update some views (optional)
````

### 4 - access the website
````shell
start chrome http://localhost:8000
````
