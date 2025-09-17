# GreenGarden — Food Delivery Web App

A streamlined DIU food-ordering site: fast menu discovery for users plus an admin console for menu CRUD, order tracking, user management, and stock updates.

<p align="left">
  <img alt="PHP" src="https://img.shields.io/badge/PHP-7.4%2B-777BB4?logo=php&logoColor=white" />
  <img alt="MySQL" src="https://img.shields.io/badge/MySQL-5.7%2B-4479A1?logo=mysql&logoColor=white" />
  <img alt="Tailwind CSS" src="https://img.shields.io/badge/TailwindCSS-3.x-38B2AC?logo=tailwindcss&logoColor=white" />
  <img alt="Flowbite" src="https://img.shields.io/badge/Flowbite-UI-0EA5E9" />
  <img alt="HTML5" src="https://img.shields.io/badge/HTML5-E34F26?logo=html5&logoColor=white" />
  <img alt="CSS3" src="https://img.shields.io/badge/CSS3-1572B6?logo=css3&logoColor=white" />
  <img alt="Status" src="https://img.shields.io/badge/status-student%20project-blue" />
  <img alt="License" src="https://img.shields.io/badge/license-TBD-lightgrey" />
  <img alt="Course" src="https://img.shields.io/badge/Course-CSE336%20%E2%80%94%20Software%20Project%20VI-9cf" />
  
</p>

> Course: CSE336 — Software Project VI • Project: GreenGarden Food Delivery
>
> Report: `Team Greengarden_Software Requirement Specification.pdf` 

---

## Table of Contents
- [Overview](#overview)
- [Highlights](#highlights)
- [Tech Stack](#tech-stack)
- [Folder Structure](#folder-structure)
- [Getting Started](#getting-started)
  - [Database schema (starter)](#database-schema-starter)
  - [Configuration](#configuration)
  - [Run locally](#run-locally)
- [Usage](#usage)
- [Security](#security)
- [Roadmap](#roadmap)
- [Authors](#authors)
- [License](#license)
- [Acknowledgments](#acknowledgments)

---

## Overview
GreenGarden is a PHP + MySQL web app to streamline online food ordering. Customers can browse the menu on a responsive UI, while Admins authenticate to manage food items (CRUD), orders, inventory, users, and basic reports.

Some features are in progress (see Roadmap). The stack is classic LAMP-style with Tailwind + Flowbite for a clean, mobile-friendly front end.

## Highlights
- 🍽️ Menu browsing with item name, price, and description
- 🔐 Admin login/logout and session handling
- 🛠️ Menu CRUD for fast content updates
- 📦 Inventory management and order tracking (scope per repo)
- 👥 Basic user management and reports (where implemented)
- 🧩 Clean includes structure (`inc/`) and admin area (`/admin`)

## Tech Stack
- Frontend: HTML5, Tailwind CSS, Flowbite, JavaScript
- Backend: PHP (procedural)
- Database: MySQL
- Server: Apache (XAMPP/WAMP) or NGINX

## Folder Structure
This mirrors the files referenced in your repository:

```
.
├─ admin/                  # Admin-facing pages (dashboard, CRUD)
├─ assets/                 # Images, icons, css/js bundles
├─ inc/                    # Includes: db config, helpers, session utils
├─ index.php               # Landing / customer menu page
├─ menu.php                # Public menu listing/details
├─ SRS.php                 # Optional SRS view/reference page
├─ style.css               # Stylesheet
├─ Team Greengarden_Software Requirement Specification.pdf
└─ Team Greengarden_Software Requirement Specification.txt
```

> Tip: If your actual paths differ, tweak the list above to match your repo.

## Getting Started
### Prerequisites
- PHP 7.4+ (8.x recommended)
- MySQL 5.7+
- A local web stack (XAMPP/WAMP/MAMP) or PHP built-in server

### Database schema (starter)
If you don’t have a dump yet, this minimal schema gets you running. Adjust as needed.

```sql
-- Minimal schema (adjust to your code)
CREATE DATABASE IF NOT EXISTS greengarden CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE greengarden;

-- Admin users
CREATE TABLE IF NOT EXISTS admin (
  adminID INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Food items
CREATE TABLE IF NOT EXISTS food_item (
  itemID INT AUTO_INCREMENT PRIMARY KEY,
  itemName VARCHAR(150) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  description TEXT,
  in_stock TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Configuration
Update DB credentials in your config include (e.g., `inc/config.php`):

```php
<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'greengarden';

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$con) {
  die('Cannot connect to database: ' . mysqli_connect_error());
}
?>
```

### Run locally
- With XAMPP/WAMP/MAMP: place the project in the web root and open `http://localhost/<folder>`.
- Or with PHP’s built-in server (from the project root):

```powershell
php -S localhost:8000
```

Then open: http://localhost:8000

## Usage
- Customer: open `index.php` to browse menu items
- Admin: go to `/admin/` to log in and manage menu/orders/inventory
- Menu listing: `menu.php`

## Security
Implemented/planned:
- Password hashing for accounts
- Prepared statements (SQLi protection) and input validation
- Secure session handling and CSRF protection on admin forms
- HTTPS in production

## Roadmap
- [ ] Customer authentication, cart, and checkout
- [ ] Order placement and tracking (customer-side)
- [ ] Payment integration
- [ ] Extended analytics and exportable reports
- [ ] Role-based admin permissions


## Authors
- Md. Sulyman Islam Sifat — ID: 211-15-4004
- Sultana Siddique Chaity — ID: 211-15-3957

Supervisor: Mr. Golam Rabbany — Lecturer, Daffodil International University

## License
No license specified. Consider adding a `LICENSE` file (e.g., MIT) to clarify usage and contributions.

## Acknowledgments
- Daffodil International University (DIU)
- CSE336 — Software Project VI

