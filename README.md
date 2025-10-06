🧠 FHBank — Regex Form Validation (PHP Bootcamp Lesson)

A hands-on Regex (Regular Expressions) lesson project built during Bootcamp.
This project — called FHBank — is a simple PHP web application that demonstrates how to use regular expressions to validate user input in web forms such as registration and login.

It provides a clean, responsive interface using Bootstrap and helps learners understand how Regex patterns are used to ensure data accuracy and integrity before saving to a database.

🧩 Overview

The FHBank Regex Lesson focuses on the practical application of Regular Expressions in PHP.
You’ll learn how to validate common input types like emails, names, passwords, and phone numbers — while building a real, interactive form-based app.

The project also includes a lightweight login and registration system with a simple dashboard to simulate a complete workflow.

⚙️ Core Features
🧾 Regex-Based Validation

Validates user inputs such as:

✅ Email format

✅ Password strength (uppercase, numbers, symbols)

✅ Full name (alphabet-only)

✅ Phone number (digit pattern)

Prevents invalid or malformed data from being submitted.

🔐 Authentication Flow

Basic user registration and login pages.

Uses PHP sessions to maintain logged-in state.

🗃️ Database Connection

Connects to a MySQL database via db_confhbank.php.

Stores registered user data securely.

🎨 Responsive Design

Built with Bootstrap and custom CSS (style.css).

Clean UI designed for learning and demonstration.

🧠 Learning Objectives

This project was created to help Bootcamp learners master Regular Expressions (Regex) through hands-on application.
By completing this project, you’ll learn how to:

✅ Understand Regex syntax and structure.

✅ Apply Regex patterns for input validation in PHP.

✅ Implement secure form handling with $_POST and sessions.

✅ Connect PHP with MySQL databases.

✅ Use Bootstrap for responsive UI design.

🧩 Tech Stack
Layer	Technology
Frontend	HTML, CSS, Bootstrap
Backend	PHP (Procedural)
Database	MySQL
Validation	Regular Expressions (Regex)
Server	XAMPP / WAMP
🚀 Getting Started

Clone or download the project to your local environment (e.g., XAMPP’s htdocs folder).

Import the provided SQL file (if available) into phpMyAdmin.

Update db_confhbank.php with your local database credentials.

Start your Apache and MySQL servers.

Open your browser and navigate to:

http://localhost/FHBank


Try registering or logging in — and see how Regex rules validate your input.

📂 Folder Structure
FHBank/
│
├── assets/              # Static files (images/icons)
├── bootstrap/           # Bootstrap library
├── profile_dp/          # Profile display pictures (optional)
├── db_confhbank.php     # Database configuration
├── header.php           # Header component
├── style.css            # Custom styles
├── index.php            # Landing page
├── register.php         # Registration page with Regex validation
├── login.php            # Login page
├── dashboard.php        # User dashboard
├── logout.php           # Logout logic
└── .gitignore           # Ignored files

🧩 Example Regex Patterns Used
Field	Example Pattern	Purpose
Email	/^[\w\.-]+@[\w\.-]+\.\w{2,}$/	Validates proper email format
Password	/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/	Ensures strong password
Full Name	/^[A-Za-z\s]+$/	Allows only alphabets and spaces
Phone Number	/^\d{10,15}$/	Validates numeric phone number
🧩 Future Enhancements

🔒 Add password hashing using password_hash()

🧾 Add error messages and visual validation feedback

📊 Add database-driven user dashboard

🧠 Integrate JavaScript Regex validation for client-side checks

💡 Extend to AJAX-based validation

🏁 Conclusion

FHBank serves as a practical Bootcamp lesson on mastering Regular Expressions (Regex) within PHP form handling.
It strengthens understanding of data validation, form processing, and clean code structure — all crucial skills for web developers.

This mini-project lays the foundation for building secure, data-driven web applications.

