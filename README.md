# Result Management System (RMS)
Rms is a simple web application built under the laravel framework and vuejs. It is used to register students, their courses and process their result and calculate the cgpa

# Requirements
PHP 7+ and Composer are required.

# Installation
After cloning the repository, Run:
Composer update
Copy .env.example to a new file .env
Edit database configuration in .env, change
   DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=


Run php artisan migrate
Run php artisan Rms:install
Run npm install

# Usage
Run php artisan serve to run on the default port 8000 or php artisan serve --port=*** to run on your preferred port.
Run npm run dev to run the vue.js
Next,you login as default user with credentials in the config/default.php file
	Identification no : “130202003”
	Password: “secret”
After login, create students, departments, courses, course registration for students. Your management Begins!

# Contributing
All contributions are welcomed and can be made in form of pull requests

# Security Vulnerabilities
If you discover a security vulnerability within OMS, please send an e-mail to Fadayini Timothy at timothy33.tf@gmail.com 

# License
OMS is open-sourced software licensed under the MIT license.


