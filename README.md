# lawfirmX

####################################
		HOW TO SETUP
####################################


* There are two folders
1. lawfirmx (Frontend) built using Vue.js
2. admin (Backend) built using Laravel

########## lawfirmx ###########################
* Clone or download the lawfirmx.
* run npm install
* After installation run "npm run dev" (To start the server locally).
* Open the folder and
* Navigate to src/services/API.js
* Change the baseURL path if deployed online.


########## admin ###################
* Clone or download the admin.
* Run composer install or update
* NB: for local installation your local server (Xampp or Wampp) should be started.
* Navigate to .env file, change the Database information and Mail information.
* Navigate to app/Http/Controllers/ClientController
* Change 'http://127.0.0.1:8000' to your desired path if deployed to the server.
* Navigate to public folder, there you will see an sql folder which contains the SQL file.
* Go to phpmyadmin and create a database "lawfirm".
* Import the sql file into the database or run "php artisan migrate" to migrate all tables into the database.
* Run "php artisan serve" (To start the server locally).
