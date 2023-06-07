Please follow this steps for run the project.

1.  First create new database in your local with name 'task_management'.

2.  Run migration Command
    php artisan migrate

3.  Add Mail settings .env file
    
4.  Now you can run in your local with this url.
    http://localhost/task_management/public/

5.  Run the below command
    php artisan queue:work

6.  Upload excel sheet with user data (Use excel sheet same like example given)
    open demo_excel.xlsx file

7.  Now you can check your local db and check your mailbox.

    