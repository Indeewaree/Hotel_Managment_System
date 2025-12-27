Hotel Management System
A lightweight web-based Hotel Management System developed using PHP, MySQL, HTML, CSS, and JavaScript. The application demonstrates core web development concepts, database integration, and role-based system structure.

This project is designed to manage basic hotel operations through a web interface. It includes separate modules for Admin, Staff, and Guest users and focuses on simplicity, usability, and clean code structure.

Technologies
PHP
MySQL
HTML
CSS
JavaScript
XAMPP (Apache & MySQL)

Setup Instructions

Install XAMPP
Place the project folder in:
    C:\xampp\htdocs\Hotel_Management_System
Start Apache and MySQL via XAMPP Control Panel
Open phpMyAdmin and create a database
    Import the database file:
    hms.sql
Update database credentials in config.php
Launch the application:
   http://localhost/Hotel_Management_System

Project Structure
Hotel_Management_System/
├── Admin/
├── Staff/
├── Guest/
├── css/
├── img/
├── config.php
├── DB.php
├── index.php
├── login.php
├── register_form.php
└── hms.sql




