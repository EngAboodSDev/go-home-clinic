# 🏥 Go Home Clinic - On-Demand Home Healthcare  Platform | عيادة جو هووم - منصة الرعاية الطبية المنزلية المتنقلة
![logo](/docs/screenshots/go-home-clinic-main.png)

Go Home Clinic is a comprehensive web-based on-demand home healthcare platform designed to facilitate medical home visits. Built with PHP and MySQL. It seamlessly connects patients with qualified healthcare professionals and doctors. Patients can browse available healthcare professionals, see their ratings, and book appointments for home visits, and provides dedicated portals for doctors and administrators to manage medical records and operations.

---

## Table of Contents

- 📊 [ Overview](#overview)
- 🚀 [ Key Features](#key-features)
- 🛠️ [ Tech Stack Used](#tech-stack-used)
- 🗂 [ Project Structure](#project-structure)
- 🖥️ [ Project Requirements](#project-requirements)
- ⚡ [ Quick Installation](#quick-installation)
- 🔧 [ Configuration](#configuration)
- 🗄 [ Database Setup](#database-setup)
- ▶️ [ Usage](#usage)
- 📸 [ Screenshots](#screenshots)
- 🤝 [ Contributing](#contributing)
- 📄 [ License](#license)
- 🏷️ [ Credits](#credits)
- 📞 [ Support and Assistance](#support-and-assistance)

---

<h2 id="overview">📊 Overview</h2>

**Go Home Clinic** bridges the gap between patients needing care at home and qualified medical professionals. It provides:

- **Patient Portal:** Browse available doctors, view their specialities and ratings, book home-visit appointments, and access completed medical records.
- **Doctor Portal:** Manage daily schedules, view upcoming appointments, and create/update patient medical records securely.
- **Admin Dashboard:** A fully integrated control panel for system (platform) administrators to oversee all operations, manage users (Patients & Doctors), vehicles, appointments, and contact requests.

The platform is designed with a modern, responsive "glassmorphism" user interface for an optimal user experience across all devices.

---

<h2 id="key-features">🚀 Key Features</h2>

### ✔️ Authentication & Roles
- **Secure Login** — Separate access levels for Patients, Doctors, and Admins.
- **Patient Registration** — Easy sign-up process for new patients.

### ✔️ Patient Portal
- **Doctor Directory** — View doctors, filter by availability, and check ratings.
- **Appointment Booking** — Seamless booking system for home-visit appointments.
- **Medical Records** — Secure access to personal medical history and prescriptions.
- **Rate Experience** — Ability to rate and review doctors after appointments.

### ✔️ Doctor Portal
- **Schedule Management** — View upcoming and past appointments.
- **Medical Records Management** — Add, edit, and maintain medical records for patients.

### ✔️ Admin Dashboard (`Admin/Dashboard.php`)
- **User Management** — View, add, edit, and remove doctors and patients.
- **Operations Control** — Manage appointments, medical records, and transport vehicles.
- **Contact Handling** — Review and respond to contact requests from the website.
- **Platform Statistics** — Overview of total user counts and system (platform) activity.

---

<h2 id="tech-stack-used">🛠️ Tech-Stack Used</h2>

![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white) 
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white) 
![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E) 
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![Font Awesome](https://img.shields.io/badge/font_awesome-%23339AF0.svg?style=for-the-badge&logo=fontawesome&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300758F.svg?style=for-the-badge&logo=mysql&logoColor=white)
![XAMPP](https://img.shields.io/badge/xampp-%23FB7A24.svg?style=for-the-badge&logo=xampp&logoColor=white)

---

<h2 id="project-structure">🗂 Project Structure</h2>

```text
📁 go-home-clinic/
├── Index.php            # Landing page & Main entry point
├── About.php            # About Us page
├── Contact.php          # Contact Us form and details
├── Login.php            # Patient login page
├── DocLogin.php         # Doctor login page
├── PatientReg.php       # Patient registration page
├── BookAbo.php          # Appointment booking page
├── OurDoctors.php       # Directory of available doctors
├── RecordDetails.php    # Detailed view of a medical record
├── Users.php            # Core user logic & database operations
├── webs.php             # General helper functions and session management
├── dbcon.php            # Database connection settings
├── 📁 Admin/            # Admin Dashboard files (Dashboard, Add/Edit pages)
├── 📁 css/              # Stylesheets (newstyle.css, master.css, framework.css)
├── 📁 js/               # JavaScript files (mobile.js)
├── 📁 imgs/             # Images & Icons
├── 📁 database/         # Database files (go_home_clinic.sql)
├── 📁 docs/             # Documentation files and screenshots
└── README.md            # Project documentation
```

---

<h2 id="project-requirements">🖥️ Project Requirements</h2>

- **Operating System:** Windows 10+, macOS, or any Linux distro  
- **Web Browser:** Chrome / Firefox / Edge (latest versions)  
- **📋Runtime & Tools:**  
  - ***PHP*** 7.4 or higher (8.x recommended)
  - ***MySQL*** 5.7+ or ***MariaDB*** 10.4+
  - ***Apache*** (or compatible web server)
  - ***XAMPP*** (or similar local stack)

---

<h2 id="quick-installation">⚡ Quick Installation</h2>

1. **Clone the Repository** 
     ```bash
     git clone https://github.com/EngAboodSDev/go-home-clinic.git
     cd go-home-clinic
     ```

2. **Copy the Project into your web server directory**
   ```bash
   c:\xampp\htdocs\go-home-clinic\
   ```

3. **Start XAMPP** and ensure Apache and MySQL are running.

4. **Import the database** (see [Database Setup](#database-setup)).

5. **Configure** `dbcon.php` with your database credentials if necessary (see [Configuration](#configuration)).

6. **Access the application** in your browser:
   ```url
   http://localhost/go-home-clinic/
   ```

---

<h2 id="configuration">🔧 Configuration</h2>

### Database Connection (`dbcon.php`)

Edit `dbcon.php` to match your local environment credentials:

```php
$servername = "localhost:3308"; // Adjust port if necessary
$username = "root";
$password = ""; // Default XAMPP password is empty
$dbname = "go_home_clinic";
```

| Parameter | Description |
|-----------|-------------|
| Host | `localhost` or `localhost:3308` |
| Username | `root` |
| Password | `""` |
| Database | `go_home_clinic` |

---

<h2 id="database-setup">🗄 Database Setup</h2>

1. Open **phpMyAdmin** or MySQL CLI.
2. Import the schema file:
   ```sql
   -- Run the contents of database/go_home_clinic.sql
   ```

3. This will create a database named `go_home_clinic` and all the tables.

4. **Key Tables:**
   - **`admin`**: System administrators.
   - **`doctor`**: Doctors info and availability.
   - **`patient`**: Patient records and details.
   - **`appointment`**: Booked appointments.
   - **`medical_record`**: Patient medical records.
   - **`contacts`**: Contact requests from the contact form in website.
   - **`vehicles`**: Transport vehicles for doctors.

---

<h2 id="usage">▶️ Usage</h2>

### Default Credentials (for testing)

*(Note: Create users via the registration pages or Admin panel if no default users exist in the imported SQL).*

- **Administrator**:
  - Access via: `http://localhost/go-home-clinic/Admin/AdminLogin.php`
  - Email: `admin@go-home-clinic.com`
  - Password: `Admin123`
  - 
- **Healthcare Provider (Doctor)**:
  - Access via: `http://localhost/go-home-clinic/DocLogin.php`
  - Email: `SaraAli@gmail.com`
  - Password: `Sara123`
  - 
- **Patient**:
  - Access via: `http://localhost/go-home-clinic/Login.php`
  - Email: `testpatient@gohomeclinic.com`
  - Password: `Test123`
  - 
### Workflow
1. **Admin** log in, see dashboard, signed patients and thier appointments and medical records, manages the creation of Doctors and Vehicles in the platform, and receive contact requests from the contact form.
2. **Patients** register, log in, browse doctors, edit profile, and book appointments for home visits, view thier medical records and rate doctor's experience.
3. **Doctors** log in to view their upcoming appointments and write medical records for completed appointments.

---

<h2 id="screenshots">📸 Screenshots</h2>

*(You can add your project screenshots here in the `docs/screenshots/` folder)*

<details>
  <summary>Website Pages</summary>

  ![Landing Page - DeskTop](docs/screenshots/go-home-clinic-home-dt.png)
  ![Landing Page - Mobile](docs/screenshots/go-home-clinic-home-mb.png)
  ![Our Doctors Page - DeskTop](docs/screenshots/go-home-clinic-our-doctors-dt.png)
  ![Our Doctors Page - Mobile](docs/screenshots/go-home-clinic-our-doctors-mb.png)
  ![About Page - DeskTop](docs/screenshots/go-home-clinic-about-us-dt.png)
  ![About Page - Mobile](docs/screenshots/go-home-clinic-about-us-mb.png)
  ![Contact Page - DeskTop](docs/screenshots/go-home-clinic-contact-us-dt.png)
  ![Contact Page - Mobile](docs/screenshots/go-home-clinic-contact-us-mb.png)
  ![FAQs Page - DeskTop](docs/screenshots/go-home-clinic-faqs-dt.png)
  ![FAQs Page - Mobile](docs/screenshots/go-home-clinic-faqs-mb.png)

</details>

<details>
  <summary>Patient Portal Pages</summary>

  ![Patient Login Page - DeskTop](docs/screenshots/go-home-clinic-patient-login-dt.png)
  ![Patient Login Page - Mobile](docs/screenshots/go-home-clinic-patient-login-mb.png)
  ![Patient SignUp Page - DeskTop](docs/screenshots/go-home-clinic-patient-create-account-dt.png)
  ![Patient SignUp Page - Mobile](docs/screenshots/go-home-clinic-patient-create-account-mb.png)
  ![Book Appointment Page 1 - DeskTop](docs/screenshots/go-home-clinic-patient-book-appointment-1-dt.png)
  ![Book Appointment Page 1 - Mobile](docs/screenshots/go-home-clinic-patient-book-appointment-1-mb.png)
  ![Book Appointment Page 2 - DeskTop](docs/screenshots/go-home-clinic-patient-book-appointment-2-dt.png)
  ![Book Appointment Page 2 - Mobile](docs/screenshots/go-home-clinic-patient-book-appointment-2-mb.png)
  ![Book Appointment Page 3 - DeskTop](docs/screenshots/go-home-clinic-patient-book-appointment-3-dt.png)
  ![Book Appointment Page 3 - Mobile](docs/screenshots/go-home-clinic-patient-book-appointment-3-mb.png)
  ![Patient's Booked Appointments Page - DeskTop](docs/screenshots/go-home-clinic-patient-booked-appointments-dt.png)
  ![Patient's Booked Appointments Page - Mobile](docs/screenshots/go-home-clinic-patient-booked-appointments-mb.png)
  ![Patient's Completed Appointments Page - DeskTop](docs/screenshots/go-home-clinic-patient-completed-appointments-dt.png)
  ![Patient's Completed Appointments Page - Mobile](docs/screenshots/go-home-clinic-patient-completed-appointments-mb.png)
  ![Patient's Medical Record Details Page - DeskTop](docs/screenshots/go-home-clinic-patient-medical-record-details-dt.png)
  ![Patient's Medical Record Details Page - Mobile](docs/screenshots/go-home-clinic-patient-medical-record-details-mb.png)
  ![Patient's Rate Experience Page - DeskTop](docs/screenshots/go-home-clinic-patient-rate-experience-dt.png)
  ![Patient's Rate Experience Page - Mobile](docs/screenshots/go-home-clinic-patient-rate-experience-mb.png)
  ![Patient's Profile Page - DeskTop](docs/screenshots/go-home-clinic-patient-edit-profile-dt.png)
  ![Patient's Profile Page - Mobile](docs/screenshots/go-home-clinic-patient-edit-profile-mb.png)
  
</details>


<details>
  <summary>Doctor Portal Pages</summary>

  ![Doctor Login Page - DeskTop](docs/screenshots/go-home-clinic-doctor-login-dt.png)
  ![Doctor Login Page - Mobile](docs/screenshots/go-home-clinic-doctor-login-mb.png)
  ![Doctor Upcoming Appointments Page - DeskTop](docs/screenshots/go-home-clinic-doctor-upcoming-appointments-dt.png)
  ![Doctor Upcoming Appointments Page - Mobile](docs/screenshots/go-home-clinic-doctor-upcoming-appointments-mb.png)
  ![Doctor Create Medical Record Page - DeskTop](docs/screenshots/go-home-clinic-doctor-create-medical-record-dt.png)
  ![Doctor Create Medical Record Page - Mobile](docs/screenshots/go-home-clinic-doctor-create-medical-record-mb.png)
  ![Doctor Created Medical Records Page - DeskTop](docs/screenshots/go-home-clinic-doctor-created-medical-records-dt.png)
  ![Doctor Created Medical Records Page - Mobile](docs/screenshots/go-home-clinic-doctor-created-medical-records-mb.png)
  ![Doctor Edit Medical Record Page - DeskTop](docs/screenshots/go-home-clinic-doctor-edit-medical-record-dt.png)
  ![Doctor Edit Medical Record Page - Mobile](docs/screenshots/go-home-clinic-doctor-edit-medical-record-mb.png)

</details>

<details>
  <summary>Admin Dashboard Pages (Desktop)</summary>

  ![Admin Login Page - DeskTop](docs/screenshots/go-home-clinic-admin-login-dt.png)
  ![Admin Dashboard Page - DeskTop](docs/screenshots/go-home-clinic-admin-dashboard-dt.png)
  ![Admin Appointments Page - DeskTop](docs/screenshots/go-home-clinic-admin-appointments-dt.png)
  ![Admin Medical Records Page - DeskTop](docs/screenshots/go-home-clinic-admin-medical-records-dt.png)
  ![Admin Patients Page - DeskTop](docs/screenshots/go-home-clinic-admin-patients-dt.png)
  ![Admin Doctors Page - DeskTop](docs/screenshots/go-home-clinic-admin-doctors-dt.png)
  ![Admin Add Doctor Page - DeskTop](docs/screenshots/go-home-clinic-admin-add-doctor-dt.png)
  ![Admin Edit Doctor Info. Page - DeskTop](docs/screenshots/go-home-clinic-admin-edit-doctor-dt.png)
  ![Admin Vehicles Page - DeskTop](docs/screenshots/go-home-clinic-admin-vehicles-dt.png)
  ![Admin Add Vehicle Page - DeskTop](docs/screenshots/go-home-clinic-admin-add-vehicle-dt.png)
  ![Admin Edit Vehicle Info. Page - DeskTop](docs/screenshots/go-home-clinic-admin-edit-vehicle-dt.png)
  ![Admin Contact Requests Page - DeskTop](docs/screenshots/go-home-clinic-admin-contact-requests-dt.png)
  ![Admin Contact Requests Page with Sidebar - DeskTop](docs/screenshots/go-home-clinic-admin-contact-requests-with-sidebar-dt.png)
  ![Admin's Profile Page - DeskTop](docs/screenshots/go-home-clinic-admin-edit-profile-dt.png)
  
</details>

[See All Screenshots...](/docs/screenshots/)

---

<h2 id="contributing">🤝 Contributing</h2>

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

---

<h2 id="license">📄 License</h2>

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

<h2 id="credits">🏷️ Credits</h2>

- **Font Awesome** — [fontawesome.com](https://fontawesome.com)
- **Google Fonts (Montserrat)** — [fonts.google.com](https://fonts.google.com/)

---

<h2 id="support-and-assistance">📞 Support and Assistance</h2>

### Getting Help
- **README.md**: For basic instructions
- **GitHub Issues**: Create an issue in the repository

### Contact Information
- **Developer**: Abdulrahman Fadhl Ameer Saif `@EngAboodSDev`
- **Email**: abdulrahmanfadhl@gmail.com
- **LinkedIn**: [Abdulrahman Fadhl](https://www.linkedin.com/in/engaboodsdev/)
- **Repository**: [GitHub Repository](https://github.com/EngAboodSDev/go-home-clinic)

---
