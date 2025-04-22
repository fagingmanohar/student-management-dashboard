# Student-management-dashboard
Student Management Dashboard
This is a Student Management System built with PHP, MySQL, and Bootstrap. It allows you to manage student information, including details such as name, age, grade, fees, class, and place. The system features the ability to add, edit, view, and delete student records.

Features
Add New Student: Allows you to add new student records with their details.

View All Students: Displays a list of all students with options to edit or delete records.

Edit Student: Allows modification of existing student records.

Delete Student: Removes a student record from the database.

CSRF Protection: Uses CSRF tokens to secure the forms.

Responsive UI: Built with Bootstrap for a responsive and user-friendly interface.

Technologies Used
PHP: Server-side scripting language for handling form submissions and interacting with the database.

MySQL: Database system for storing student information.

HTML/CSS: Front-end technologies for building the web pages and styling.

Bootstrap: CSS framework for responsive, mobile-first design.

JavaScript: For front-end form validation and UI enhancements.

Installation
Prerequisites
XAMPP/WAMP or any local server with PHP and MySQL support.

Git: To clone the repository and version control.

Steps to Set Up
Clone the repository to your local machine:

bash
Copy
Edit
git clone https://github.com/yourusername/student-management.git
Move the project folder to the htdocs directory if using XAMPP, or the appropriate folder if using other server software.

Example:

XAMPP: C:\xampp\htdocs\student-management

Set up MySQL Database:

Create a database named student_management in MySQL.

Create the students table with the following structure:

sql
Copy
Edit
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    age INT(3) NOT NULL,
    grade VARCHAR(50) NOT NULL,
    class VARCHAR(50) NOT NULL,
    place VARCHAR(255) NOT NULL,
    fees INT(11) DEFAULT NULL
);
Update Database Configuration:

Make sure to update your database configuration in db.php or wherever you're storing database connection details. Set the correct username, password, and database name.

Access the Application:

Open a browser and go to http://localhost/student-management.

Usage
Navigate to the home page to view all students.

Click on Add New Student to add a new student.

Edit or delete student records by using the edit and delete buttons next to each student.

Contributing
Contributions are welcome! If you have any improvements or bug fixes, feel free to fork this project, make changes, and create a pull request.

 License
 This project is licensed under the MIT License - see the LICENSE file for details.
