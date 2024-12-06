
# Assignment Management System Website

This Assignment Management System was developed using PHP, HTML, CSS, and MySQL. The system has two types of users: students and teachers. Teachers can manage students and assignments, while students can view and submit assignments.
## Features
Teacher
* Login: A secure login system for teachers is needed.
* Add Students: Teachers can add new students to the system.
* View Students: Teachers can view all students in the system.
* Create Assignments: Teachers can create new assignments.
* View Uploaded Assignments: Teachers can view assignments submitted by students.
  
Student
* Login: Secure login system for students.
* View Assignments: Students can view assignments assigned to them.
* Upload Assignments: Students can upload their assignments in PDF format.


* FeaturesResponsive Design: The layout adapts to different screen sizes, ensuring a good user experience on both desktop and mobile devices.

* Product Listings: Display products with images, descriptions, prices, and an add-to-cart button.
## 💻 Tech Stack:
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white) ![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white) ![Bootstrap](https://img.shields.io/badge/bootstrap-%238511FA.svg?style=for-the-badge&logo=bootstrap&logoColor=white) ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white) ![MySQL](https://img.shields.io/badge/mysql-4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white) ![Apache](https://img.shields.io/badge/apache-%23D42029.svg?style=for-the-badge&logo=apache&logoColor=white) 

## ⚙️ Setup

Prerequisites
* XAMPP or any other PHP and MySQL server.
* Web browser.

Installation
To set up the project locally, follow these steps:

Clone the repository:

    git clone https://github.com/ashutoshshinde2/Assignment-Management-System-.git

Navigate to the project directory:

    cd assignment-management-system

Copy to Server Directory

Copy the project folder to your server's root directory (e.g., 'C:\xampp\htdocs\' for XAMPP).

Create Database

* Start your MySQL server.
* Open PHPMyAdmin (http://localhost/phpmyadmin).
* Create a new database named ams.
* Import the SQL/ams.sql file from the database folder to the newly created database.

Update Database Configuration

Open the config.php file in the project directory.
Update the database configuration to match your server settings

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "assignment_system";
    ?>

Run the Application

Open your web browser.
Go to http://localhost/assignment-management-system.


## Screenshots

### Teacher Dashboard

![App Screenshot](https://github.com/ashutoshshinde2/Assignment-Management-System-/blob/main/Output/Home%20page.png)
![App Screenshot](https://github.com/ashutoshshinde2/Assignment-Management-System-/blob/main/Output/login%20for%20student%20and%20login%20page.png)
![App Screenshot](https://github.com/ashutoshshinde2/Assignment-Management-System-/blob/main/Output/TeacherDashboard.png)
![App Screenshot](https://github.com/ashutoshshinde2/Assignment-Management-System-/blob/main/Output/AddStudent.png)
![App Screenshot](https://github.com/ashutoshshinde2/Assignment-Management-System-/blob/main/Output/AllStudent.png)
![App Screenshot](https://github.com/ashutoshshinde2/Assignment-Management-System-/blob/main/Output/NewAssignment.png)
![App Screenshot](https://github.com/ashutoshshinde2/Assignment-Management-System-/blob/main/Output/View%20Submission.png)

### Student Dashboard

![App Screenshot](https://github.com/ashutoshshinde2/Assignment-Management-System-/blob/main/Output/Student%20Dashboard.png)
![App Screenshot](https://github.com/ashutoshshinde2/Assignment-Management-System-/blob/main/Output/Upload%20Assignement.png)





    


## 📜 License

[MIT](https://choosealicense.com/licenses/mit/)
