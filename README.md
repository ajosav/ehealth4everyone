# Hospital Management System

## Project Description
The project is a hospital management system built with [Laravel 7](https://laravel.com) and [VueJS](https://vuejs.org/). This project repository also includes available API endpoints for any developer willing to integrate their application with the system. The available features of the project include 
1. Login and registration for patients and doctors (token base authentication for the API)
2. Appointment booking for patients and doctors
3. Dashboard to show activities with any chart library of choice
4. Responsive design
5. Email notification after registration

## Project Workflow
After user authentication, a user(doctor or patient) would be required to update their profile which is inclusive of their medical history,certificates, and specialization fields, based on the saved role of the authenticated user. Only after this has been completed will the user be able to proceed to the stage of making applications to doctors and the subsequent acceptance or rejection of such applications by doctors. Also, all users get email notifications for both sending and acting on appointment applications. 


## Project Setup(Web Portal)

### Cloning the GitHub Repository.
Clone the repository to your local machine by running the terminal command below.

```bash
git clone repo-url
```
### Setup Database
Create your a MySQL database and note down the required connection parameters. (DB Host, Username, Password, Name) 

### Install Composer Dependencies
Navigate to the project root directory via terminal and run the following command.
```bash
composer install
```
### Install NPM Dependencies
While still in the project root directory via terminal, run the following command.

```bash
npm install
```
or if you use yarn instead
```bash
yarn
```
### Create a copy of your .env file
Run the following command 
```bash
cp .env.example .env
```
This should create an exact copy of the .env.example file. Name the newly created file .env and update it with your local environment variables (database connection info and others).

### Generate an app encryption key
```bash
php artisan key:generate
```

### Migrate the database
```bash
php artisan migrate
```

### Future Possible Updates
The following features are to be added in the next available upgrade of the system.
1. Addition of auxiliary staff eg Nurses etc by doctors to carry out operations on behalf of the doctor.

### License
[MIT](https://choosealicense.com/licenses/mit/)