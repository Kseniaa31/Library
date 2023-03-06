--------------------------------------------------Library Website--------------------------------------------------------------------- 

This is a website created for a library built in PHP,MySQL,HTML,CSS, JAVASCRIPT. This website is accessed by admins and users. The former can add/delete/update a book category, author, book and users. The latter can read what books are available in order for them to go and pick up at the store


Requirements:
PHP
MySQL
XAMPP

Installation:
1.	Download the zip file
2.	Install XAMPP for running a web server with PHP and MySQL.
3.	Import the ‘library.sql’ file into youtr MySQL database.
4.	Copy the contents of the zip file into the server’s document root.

Usage:
Once you have done all the step above correctly you can access it by navigating with the URL where it is hosted. We used localhost. From there you go to the main page.
The first page is divided into two log in forms one for the admins and one for the users.
To login in the admin page use:

-	Email: admin@gmail.com
-	Password: Password1

In the dashboard of the admin page we have shown the number of : total books, authors, category and current users. On the side of the page we have a navigation bar that allows us to click one of the options which are: Category, Author, Book, User and the Logout button.
In the ‘Category’ we have a list of the categories of the books that are in the store, each category has a status that is either ‘enable’ or ‘disable’ and that can be changed by the change button that admin uses when this category is or not on stock. There is also and ‘Action’ part that associates each category with an ‘Edit’ button that makes admin able to change the name of the category. On the right-top of the page we have an ‘Add’ button that makes possible to add a new category to our database.
In the database this part is created with the ‘Category’ table that has as columns : category_id, category_name, category_status.

In the ‘Author’ we have the list of the authors whose books are in the store and it has the same functionalities and the ‘Category’. Admin can also add a new author to the database.
In the database this is created by ‘Category’ table whose columns are: author_id, author_name, author_status.

The ‘Book’ page shows the names of the books that are/were in the store associated with their respective ISBN numbers, category, author and number or copies available at the store. Next to these columns we have the same functionalities as mentioned above.
In database this is created by the ‘Books’ table that has as columns: book_id, book_category, book_author, book_name, book_isbn_number, book_no_of_copies, book_status.

The ‘User’ part has all the user that are registered and shows their Names, Email address, Password and Contact No. Next to it we have the functionality that changes the users status, which means enable when he/she is active and disable when he/she is not.
In the database we have created the ‘User’ table that has columns: user_id, user_name, user_contact_no, user_email_address, user_password (that is hashed) and user_status.

At the user part we can either Log In or Register. When it comes to users loginng in what is shown is a table that has ‘Book Name’ , ‘ISBN No.’, ‘Category’, ‘Author’, ‘No. of Available Copies’ and ‘Status’. The main idea in this page is so a user who wants to purchase a book can look if it is in the store and they can go and get it from there. The status makes it able to know if it is or not on the store by checking if it is ‘enable’ which means it is purchasable or ‘disabled’ which means it is not on the store yet.
If a new user wants to register he/she can click at the ‘Register’ button. The moment you click that button you will be shown a form that requires: Email Address, Password, UserName and User Contact Number

To log in as a user use:
-	Email: user@gmail.com
-	Password: Password1

Front-end is build using bootstrap framework.
All the scripts are in the css file.

It uses the following libraries and tools:
•	PHP
•	MySQL
•	HTML
•	CSS
•	Bootstrap

