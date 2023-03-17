<!-- ABOUT THE PROJECT -->
## About The Project

There are many great README templates available on GitHub; however, I didn't find one that really suited my needs so I created this enhanced one. I want to create a README template so amazing that it'll be the last one you ever need -- I think this is it.

Here's why:
* Your time should be focused on creating something amazing. A project that solves a problem and helps others
* You shouldn't be doing the same tasks over and over like creating a README from scratch
* You should implement DRY principles to the rest of your life :smile:

Of course, no one template will serve all projects since your needs may be different. So I'll be adding more in the near future. You may also suggest changes by forking this repo and creating a pull request or opening an issue. Thanks to all the people have contributed to expanding this template!


### Built With

This section should list any major frameworks/libraries used to bootstrap your project. Leave any add-ons/plugins for the acknowledgements section. Here are a few examples.

* [![Laravel][Laravel.com]][Laravel-url]
* [![Tailwind][tailwind.com]][tailwind-url]

<!-- GETTING STARTED -->
## Getting Started

Instrunctions on how to set up the project locally

### Prerequisites

This is an example of how to list things you need to use the software and how to install them.
* npm@latest
* php 8.1 or higher
* laravel 10
* composer 

### Installation

_Below is an example of how you can instruct your audience on installing and setting up your app. This template doesn't rely on any external dependencies or services._


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
8. Install NPM packages
   ```sh
   npm install
   ```
6. run the dev script defined inside a package.json file
     ```sh
   npm run dev
   ```


## ERD

![Διάγραμμα δραστηριοτητων](https://user-images.githubusercontent.com/36853896/225879610-7baee3f2-a522-4c08-8ecd-02a857c8287d.png)




Installed latest php and composer using brew

Database design using lucidchart

Made model and migration table

php artisan make:model -m Expense

npm install to install package.json depedencies

npm run dev to run vite

Seeded our admin user and logged in
Tested both login and register function and works great

Now we should make the frontend for expenses registration, view, edit

Make the form so the employee can make new expense

Make validations

php artisan make:request StoreExpenseRequest

Made index route

Used the fullCalendar library

Displayed the database records to the calendar

Calculated sum for expenses for both admin and employee

Made show route

Made the show view showing the specific expense

There is no need to install a frontend framework because the only functionality is a single calendar

Make middlewares to protect routes

Upload images and serve them privately






Admin user:
admin@example.com
password

Employee:
employee@gmail.com
password

Employee2:
employee2@gmail.com
password
