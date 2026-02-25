# Exam Seat Management System

A web-based application for managing exam hall seating arrangements for students and staff in a college/university setting.

## Description

The Exam Seat Management System allows administrators to register students and staff, define subjects, create exam halls, and automatically allot exam seats to students. Students can log in to view their assigned seat, and staff can view their allotted exam room.

## Features

- **Admin panel** – Manage students, staff, subjects, exam halls, and seating allotments
- **Student portal** – Students log in with their Register Number and Date of Birth to view their assigned seat
- **Staff portal** – Staff log in to view their allotted exam room
- **Automatic seat allotment** – The system assigns seats from the room roster to students by department, year, and section
- **Duplicate prevention** – Prevents duplicate student/staff registrations and duplicate hall allotments

## Technologies Used

- **Backend:** PHP 8.x (MySQLi with prepared statements)
- **Database:** MySQL / MariaDB
- **Frontend:** Bootstrap 3, Font Awesome, jQuery
- **Server:** Apache / XAMPP / LAMP stack

## Installation

1. **Clone or download** the repository into your web server's document root (e.g. `htdocs` for XAMPP):
   ```
   git clone https://github.com/kowsikansenthilkumar/Exam-seating-.git
   ```

2. **Import the database** – Open phpMyAdmin (or use the MySQL CLI) and import `exam_hall.sql`:
   ```
   mysql -u root -p < exam_hall.sql
   ```

3. **Configure the database connection** – Edit `dbconnect.php` and update the credentials:
   ```php
   $servername = "localhost";
   $username   = "root";
   $password   = "your_password";
   $mydb       = "exam_hall";
   ```

4. **Start your web server** (e.g. Apache + MySQL via XAMPP) and navigate to:
   ```
   http://localhost/Exam-seating-/
   ```

## Usage

### Admin
- Go to **ADMIN LOGIN** and sign in with:
  - Username: `admin`
  - Password: `admin`
- Use the navigation bar to:
  - **ADD STUDENT** – Register student records
  - **ADD STAFF** – Register staff accounts
  - **ADD SUBJECT** – Define subjects by department and semester
  - **ADD HALL** – Create exam room slots (sets up seats for an exam date/session)
  - **ALLOTE HALL** – Assign students to seats by department, year, section, and subject
  - **ALLOTE STAFF** – Assign staff members to exam rooms
  - **VIEW** – View the seating arrangement for any exam, hall, date, and session

### Student
- Go to **STUDENT LOGIN** and sign in with:
  - Register Number
  - Date of Birth (used as password)
- Search by exam name, session, and date to view your assigned seat and room number.

### Staff
- Go to **STAFF LOGIN** and sign in with:
  - Register Number
  - Password (set during staff registration)
- Search by exam name, session, and date to view your allotted room.

## Database Setup

The `exam_hall.sql` file creates the following tables:

| Table      | Description                                      |
|------------|--------------------------------------------------|
| `admin`    | Admin login credentials                          |
| `student`  | Student personal and academic details            |
| `staffreg` | Staff registration and login credentials         |
| `subject`  | Subject list per department and semester         |
| `rooms`    | Exam room seat roster with allotment details     |
| `stalt`    | Staff allotment records (staff → room mapping)   |
| `hall`     | Auxiliary hall data                              |

## File Structure

```
Exam-seating-/
├── index.php          – Home page (public)
├── adminlog.php       – Admin login
├── student.php        – Student login
├── staff.php          – Staff login
├── stureg.php         – Student registration (admin)
├── adminhome.php      – Staff registration (admin)
├── addsub.php         – Add subjects (admin)
├── addhall.php        – Add exam halls/rooms (admin)
├── allote.php         – Allot hall seats to students (admin)
├── allotestaff.php    – Allot staff to exam rooms (admin)
├── view.php           – View seating arrangement (admin)
├── stuhome.php        – Student home / seat viewer
├── stahome.php        – Staff home / room viewer
├── dbconnect.php      – Database connection
├── exam_hall.sql      – Database schema and seed data
└── assets/            – CSS, JS, and font assets
```

## Security Notes

- All database queries use **prepared statements** to prevent SQL injection.
- Session authentication is enforced on all protected pages.
- The default admin password (`admin`) should be changed after first login.
- Staff passwords are stored as plain text in the current version. Consider adding password hashing (`password_hash` / `password_verify`) for production use.

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/your-feature`)
3. Commit your changes (`git commit -m 'Add your feature'`)
4. Push to the branch (`git push origin feature/your-feature`)
5. Open a Pull Request

## License

This project is open source and available under the [MIT License](LICENSE).
