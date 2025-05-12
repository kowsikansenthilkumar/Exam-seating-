# Exam Seat Management System

## Description
The Exam Seat Management System is a web-based application designed to streamline the process of managing exam hall arrangements. It allows administrators to add students, subjects, exam halls, and allocate seats for exams. The system also supports staff allocation for invigilation and provides views for exam arrangements. This project is built using PHP and MySQL, with a Bootstrap-based frontend for a responsive user interface.

## Features
- **Admin Login**: Secure login for administrators to manage the system.
- **Student Management**: Add and manage student details.
- **Subject Management**: Add subjects for different departments and semesters.
- **Hall Management**: Create and manage exam halls with seating arrangements.
- **Seat Allocation**: Automatically allocate students to seats based on exam, department, and section.
- **Staff Allocation**: Assign staff for invigilation duties.
- **View Arrangements**: Display exam seating and staff assignments.
- **Session Management**: Support for multiple exam sessions (e.g., FN, AN).

## Technologies Used
- **Backend**: PHP
- **Database**: MySQL
- **Frontend**: HTML, CSS, Bootstrap, jQuery
- **Others**: JavaScript for client-side scripting

## Installation
Follow these steps to set up the project locally:

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/your-username/exam-seat-management-system.git
   ```
2. **Set Up a Web Server**:
   - Install a web server like XAMPP, WAMP, or MAMP.
   - Place the project folder in the web server's root directory (e.g., `htdocs` for XAMPP).
3. **Configure the Database**:
   - Create a MySQL database named `exam_hall`.
   - Import the database schema (if provided) or create the necessary tables (see Database Setup below).
4. **Update Database Connection**:
   - Open `dbconnect.php` and ensure the database credentials match your setup:
     ```php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $mydb = "exam_hall";
     ```
5. **Start the Web Server**:
   - Launch your web server and MySQL service.
   - Access the application at `http://localhost/your-project-folder`.

## Usage
1. **Admin Login**:
   - Navigate to `adminlog.php`.
   - Log in with admin credentials (set up in the `admin` table).
2. **Manage Data**:
   - Add students via `stureg.php`.
   - Add subjects via `addsub.php`.
   - Create exam halls via `addhall.php`.
   - Allocate seats via `allote.php`.
   - Assign staff via `allotestaff.php`.
3. **View Arrangements**:
   - Use `view.php` to see seating and staff assignments.
4. **Staff Login**:
   - Staff can log in via `staff.php` to view their assigned duties.

## Database Setup
Create a MySQL database named `exam_hall` and set up the following tables:

1. **admin**:
   - `uname`: Admin username
   - `password`: Admin password
2. **student**:
   - `regno`: Student register number
   - `dept`: Department
   - `year`: Year of study
   - `class`: Section
3. **subject**:
   - `id`: Auto-incremented ID
   - `dept`: Department
   - `sem`: Semester
   - `s1`, `s2`, `s3`, `s4`, `s5`, `s6`: Subject names
4. **rooms**:
   - `id`: Auto-incremented ID
   - `year`: Year
   - `roomnum`: Room number
   - `seat`: Seat identifier
   - `ename`: Exam name
   - `roww`: Row identifier (e.g., R1, R2)
   - `regno`: Student register number
   - `sect`: Section
   - `dep`: Department
   - `sub`: Subject
   - `date`: Exam date
   - `ses`: Session (FN/AN)
5. **staffreg**:
   - `id`: Auto-incremented ID
   - `name`: Staff name
   - `age`: Date of birth
   - `gender`: Gender
   - `dep`: Department
   - `email`: Email
   - `regno`: Register number
   - `psw`: Password
6. **stalt**:
   - `id`: Auto-incremented ID
   - `regno`: Staff register number
   - `date`: Exam date
   - `ename`: Exam name
   - `room`: Room number
   - `ses`: Session

You can create these tables manually or use a provided SQL dump file (if available).

## File Structure
- `dbconnect.php`: Database connection configuration.
- `index.php`: Homepage with login options.
- `adminlog.php`: Admin login page.
- `adminhome.php`: Staff registration page.
- `stureg.php`: Student registration page.
- `addsub.php`: Add subjects for departments and semesters.
- `addhall.php`: Create exam halls and seating.
- `allote.php`: Allocate students to exam seats.
- `allotestaff.php`: Assign staff for invigilation.
- `staff.php`: Staff login page.
- `assets/`: Contains CSS, JS, and other static files.

## Contributing
Contributions are welcome! To contribute:
1. Fork the repository.
2. Create a new branch (`git checkout -b feature/your-feature`).
3. Make your changes and commit (`git commit -m "Add your feature"`).
4. Push to the branch (`git push origin feature/your-feature`).
5. Create a pull request.

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.