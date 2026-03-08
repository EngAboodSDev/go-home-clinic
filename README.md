# Go Home Clinic

Go Home Clinic is a mobile healthcare and home-visit medical system that connects patients with qualified doctors. Patients can browse available healthcare professionals, view their ratings, and book appointments for home visits, while doctors can manage their schedules and patient requests.

## Features

- **User Roles**: Separate authentication and dashboards for Patients and Doctors.
- **Doctor Directory**: View a list of available doctors, their specialities, and average patient ratings.
- **Appointment Booking**: Patients can seamlessly book appointments with specific doctors for home visits.
- **Modern Premium UI**: Clean, responsive, and professional design utilizing a modern "glassmorphism" aesthetic, custom color palettes (Deep Navy & Vibrant Amber), and smooth micro-animations.
- **Responsive Forms**: Beautifully structured registration, login, and contact forms optimized for all screen sizes.
- **Dynamic FAQ**: Interactive accordion-style FAQ section.

## Technology Stack

- **Backend**: PHP
- **Database**: MySQL (via XAMPP)
- **Frontend**: HTML5, Vanilla CSS3, Vanilla JavaScript
- **Typography**: Google Fonts (Montserrat)
- **Icons**: Font Awesome 6

## Project Structure

- `Index.php`, `About.php`, `Contact.php`, `faq.php`: Public-facing informational pages.
- `OurDoctors.php`: Main directory of healthcare providers.
- `BookAbo.php`: Appointment booking system.
- `Login.php`, `PatientReg.php`: Patient authentication flow.
- `DocLogin.php`: Doctor authentication flow.
- `navbar.php`, `footer.php`: Reusable layout components.
- `dbcon.php`, `webs.php`, `Users.php`: Core backend logic and database connection configurations.
- `css/`: Contains styling logic, notably `newstyle.css` for modern UI elements and `navstyles.css` for the responsive header.

## Setup Instructions

1.  **Prerequisites**: Ensure you have a local server environment like [XAMPP](https://www.apachefriends.org/) or WAMP installed.
2.  **Clone the Repository**:
    ```bash
    git clone https://github.com/EngAboodSDev/go-home-clinic.git
    ```
3.  **Move to Server Directory**: Place the `go-home-clinic` folder inside your server's root directory (e.g., `C:\xampp\htdocs\go-home-clinic`).
4.  **Database Configuration**:
    - Start your Apache and MySQL servers.
    - Open phpMyAdmin and create a new database (check `dbcon.php` for the expected database name).
    - Import the project's SQL dump file (if provided) to set up the necessary tables (`users`, `doctors`, `appointments`, etc.).
5.  **Run the Application**: Open your web browser and navigate to `http://localhost/go-home-clinic/Index.php`.

## Recent Updates

- Complete UI overhaul of the Home, About, Contact, FAQ, and Our Doctors pages for a more premium medical aesthetic.
- Standardized the navigation bar and footer across all pages.
- Redesigned authentication flows (Login, Patient Registration, Doctor Login) into modern, card-based layouts with responsive CSS grids.
