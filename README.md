# Result Management System (RMS)
Rms is a simple web application built under the laravel framework and vuejs. It is used to register students, their courses and process their result and calculate the cgpa

# Requirements
PHP 7+ and Composer are required.

# Installation
After cloning the repository, Run:
1. Composer update
2. Copy .env.example to a new file .env
3. Edit database configuration in .env, change

   	DB_DATABASE=

	DB_USERNAME=
    	
	DB_PASSWORD=

4. Run php artisan migrate
5. Run php artisan Rms:install
6. Run npm install

# Usage
1. Run php artisan serve to run on the default port 8000 or php artisan serve --port=*** to run on your preferred port.
2. Run npm run dev to run the vue.js
3. Next,you login as default user with credentials in the config/default.php file

	Identification no : “130202003”
	
	Password: “secret”
	
4. After login, create students, departments, courses, course registration for students. Your management Begins!

# Contributing
All contributions are welcomed and can be made in form of pull requests

# Security Vulnerabilities
If you discover a security vulnerability within RMS, please send an e-mail to Fadayini Timothy at timothy33.tf@gmail.com 

# License
RMS is open-sourced software licensed under the MIT license.

# Update....
Refactoring and improving this soon


