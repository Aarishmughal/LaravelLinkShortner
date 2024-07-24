# Link Shortner Made using Laravel
This app uses Laravel as it Backend and does exactly what the Title says.
## Setup project on a new Device
### 1. Download the Repo.
Download all the files in the repository via `Github` or `gitbash`.
### 2. Extract the Files.
Extract the downloaded files and open the project folder with `VSCode`.
### 3. Setup Project.
Open the Terminal of your choice and run:
```sh
composer install
```
### 3. Setup Database and Migrations.
In the terminal, run:
```sh
php artisan migrate
```
### 4. Start the Artisan Server.
In the terminal, run:
```sh
php artisan serve
```
## Features
 - Create Short Links and save them in the MySQLDatabase 
 - Retrieve Original Links when Shortened Links are provided
 - Redirect to original Link when anyone access the short Link
 - Complete error validation and security