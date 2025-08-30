<!-- TITLE & BADGES -->
# Notes-Taking Website in PHP  

Empower Your Ideas, Effortlessly Organize and Recall
Built with the tools and technologies: PHP 

##  Table of Contents

  1. Overview
  2. Getting Started
     1. Prerequisites
     2. Installation
     3. Usage

---

##  About  
  Notes-Taking Website in PHP is a lightweight, full-stack web applicaiton that enables users to create, organize, and manage notes seamlessly. Built with HTML, CSS JavaScript, PHP, and MySQL, it serves as foundationla component for web-based note management systems.

---

##  Features
- **CRUD Notes**: Create, Read, Update, and Delete notes easily.  
- **Dynamic Backend**: Robust PHP logic for smooth data handling.  
- **Persistent Storage**: Notes stored securely in MySQL.  
- **Full-Stack Integration**: Harmonious frontend and backend alignment.  
- **Extensible Architecture**: Built with room for future enhancements.

---

##  Demo  
*(Optional: Add a live demo link or GIF/video here)*  

---

##  Technologies
| Layer       | Tools & Technologies          |
|-------------|-------------------------------|
| Backend     | PHP (vanilla)                 |
| Database    | MySQL                         |
| Frontend    | HTML, CSS, JavaScript         |
| Environment | Apache / XAMPP / LAMP / WAMP  |

---

##  Getting Started  :-
### Prerequisites:-
- PHP >= 7.4  
- MySQL or MariaDB  
- Local server (Apache via XAMPP/WAMP, etc.)  
- Browser (Chrome, Firefox, Edge, etc.)

### Installation:-

1. **Clone this repo**  
   ```bash
   git clone https://github.com/MANISH-197/NOTES-TAKING-WEBSITE-IN-PHP-.git
Move files into your htdocs (XAMPP) or web root directory.

Create MySQL database:

Name it (e.g., notes_app)

Import schema.sql or manually create notes table with fields:

id (INT, AUTO_INCREMENT, PRIMARY KEY)

title (VARCHAR)

content (TEXT)

created_at, updated_at (TIMESTAMP)


php
Copy code
<?php
$host = 'localhost';
$db   = 'inotes';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
Run the app via http://localhost/your-folder-name/.

*** Usage:-

Add new notes with a title and content.

View your notes in a dashboard.

Edit or delete notes seamlessly.

Enjoy a straightforward and responsive interface.
         # Project documentation
