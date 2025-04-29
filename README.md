# 🌐 Community Disaster Management and Reporting Portal

A web-based platform that allows users to report disasters and access critical resource information in real-time. Built with HTML, Tailwind CSS, JavaScript, PHP, and MySQL.

## 📌 Project Overview

This portal aims to assist communities in managing disasters by enabling users to report incidents, view recent reports, and access local emergency resources like shelters and helplines.

## 🧩 Features

### 🔹 User Features
- 📍 Submit disaster reports with details like title, location, description, and media
- 📰 View a list of recent disaster reports
- 🧰 Access essential resources (emergency contacts, shelters, medical help)

> ❌ Admin Panel: Not implemented in the current version

## 📁 Folder Structure


## 🧰 Technologies Used

- **Frontend**: HTML5, Tailwind CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL

## 🗃️ Database Setup

1. Import the SQL file (`db/disaster_db.sql`) into your MySQL server.
2. Update your database credentials in `db/db_connect.php`:

```php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "disaster_db";
```
🚀 How to Run
Clone the repository:

bash
Copy
Edit
git clone https://github.com/divu0609/disaster_managment.git
Move the folder to your local web server directory (e.g., htdocs in XAMPP):

bash
Copy
Edit
cp -r disaster_managment/ /xampp/htdocs/
Start Apache and MySQL using XAMPP or another local server tool.

Open the portal in your browser:

arduino
Copy
Edit
http://localhost/disaster_managment/
🌍 Societal Impact
Promotes citizen engagement in local safety

Provides quick access to help in disaster-prone areas

Encourages data-driven emergency response planning

🤝 Contributing
Suggestions and pull requests are welcome! Open an issue to discuss any changes or improvements.

📜 License
This project is open-source and available under the MIT License.

javascript
Copy
Edit

Would you like this saved as a `README.md` file that you can upload directly to your GitHub repo?
