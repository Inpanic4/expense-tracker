<!-- ABOUT THE PROJECT -->
## About The Project

An expense tracker demo project for a company where an admin(company's CEO) can check the employees' expenses. Employees can upload and edit their expenses having as an option to upload also an image of the receipt which will be viewable only to the admin or receipt's owner. All the expenses are viewed within a calendar using the fullCalendar library.



### Built With

*Laravel 10

*Npm latest

*TailwindCSS

*Vite

*AlpineJS

*FullCalendar

<!-- GETTING STARTED -->
## Getting Started

Instrunctions on how to set up the project locally

### Prerequisites

* npm@latest
* php 8.1 or higher
* laravel 10
* composer 

### Installation




1. Clone the repo
   ```sh
   git clone https://github.com/Inpanic4/expense-tracker.git
   ```
   
2. Rename .env.example to .env and add your locally db credentials

3. Install depedencies from composer.lock   
     ```sh
   composer install
   ```
   
4. Generate application's key
    ```sh 
    php artisan key:generate
    ```
    
5. Install NPM packages
   ```sh
   npm install
   ```
6. run the dev script defined inside a package.json file
     ```sh
   npm run dev
   ```
   
7.migrate the database and seed with test users and expenses
  ```sh
    php artisan migrate:fresh --seed
   ```
   
   
Admin user:
admin@example.com
password

Employee:
employee@gmail.com
password

Employee2:
employee2@gmail.com
password


## ERD

![Διάγραμμα δραστηριοτητων (1)](https://user-images.githubusercontent.com/36853896/225883991-ffb252b5-d09e-45f8-ad5b-50731762fea7.png)


