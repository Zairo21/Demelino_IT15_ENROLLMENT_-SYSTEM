# Laravel Academic Portal - Enrollment System

## IT15 - Weekend Integrative Programming Activity
**Laravel Academic Portal Course & Enrollment System**

---

## 📋 Project Overview

This is a Mini Academic Portal built with Laravel that manages Students, Courses, and Enrollments. The system demonstrates proper Laravel MVC architecture, Eloquent relationships, routing, validation, and controller logic.

### Features
- ✅ Student Management (CRUD operations)
- ✅ Course Management (CRUD operations)
- ✅ Enrollment System with business rules
- ✅ Many-to-Many relationship between Students and Courses
- ✅ Prevents duplicate enrollments
- ✅ Respects course capacity limits
- ✅ Clean and responsive UI using Bootstrap 5

---

## 🗄️ Database Structure

### Tables

**1. students**
- id (primary key)
- student_number (unique)
- first_name
- last_name
- email (unique)
- timestamps

**2. courses**
- id (primary key)
- course_code (unique)
- course_name
- capacity (integer)
- timestamps

**3. enrollments** (pivot table)
- id (primary key)
- student_id (foreign key)
- course_id (foreign key)
- timestamps
- unique constraint on (student_id, course_id)

---

## 🚀 Installation Instructions

### Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL/MariaDB
- XAMPP (with Apache and MySQL running)

### Step-by-Step Setup

**1. Extract the project**
```bash
# Extract the ZIP file to your htdocs folder
# Example: C:\xampp\htdocs\enrollment-system
```

**2. Open Terminal/Command Prompt in project folder**
```bash
cd C:\xampp\htdocs\enrollment-system
```

**3. Install dependencies**
```bash
composer install
```

**4. Create .env file**
```bash
# Copy .env.example to .env
copy .env.example .env
```

**5. Generate application key**
```bash
php artisan key:generate
```

**6. Configure database**
Open `.env` file and update database settings:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=enrollment_system
DB_USERNAME=root
DB_PASSWORD=
```

**7. Create database**
- Open phpMyAdmin (http://localhost/phpmyadmin)
- Create new database named: `enrollment_system`

**8. Run migrations**
```bash
php artisan migrate
```

**9. (Optional) Seed sample data**
```bash
php artisan db:seed
```

**10. Start the development server**
```bash
php artisan serve
```

**11. Access the application**
Open browser and go to: `http://127.0.0.1:8000`

---

## 📱 How to Use

### Student Module

**View All Students**
- Navigate to Students menu
- See list of all students with their enrolled courses

**Add New Student**
- Click "Add Student" button
- Fill in: Student Number, First Name, Last Name, Email
- Click "Save Student"

**View Student Profile**
- Click the eye icon on any student
- See student details and enrolled courses
- Enroll student in available courses
- Unenroll from courses

**Edit Student**
- Click the pencil icon or "Edit Profile"
- Update student information
- Click "Update Student"

**Delete Student**
- Click the trash icon
- Confirm deletion

### Course Module

**View All Courses**
- Navigate to Courses menu
- See all courses with capacity and enrollment status

**Add New Course**
- Click "Add Course" button
- Fill in: Course Code, Course Name, Capacity
- Click "Save Course"

**View Course Details**
- Click the eye icon on any course
- See course information and enrolled students
- View available slots

**Edit Course**
- Click the pencil icon or "Edit Course"
- Update course information
- Click "Update Course"

**Delete Course**
- Click the trash icon
- Confirm deletion

### Enrollment Process

**Enroll a Student**
1. Go to Student Profile
2. Select a course from the dropdown
3. Click "Enroll" button

**Business Rules Applied:**
- ✅ Cannot enroll in the same course twice
- ✅ Cannot enroll if course is full
- ✅ Automatic capacity checking

**Unenroll a Student**
1. Go to Student Profile
2. Find the enrolled course
3. Click "Unenroll" button
4. Confirm action

---

## 🏗️ Technical Implementation

### Eloquent Relationships

**Student Model**
```php
public function courses()
{
    return $this->belongsToMany(Course::class, 'enrollments')
                ->withTimestamps();
}
```

**Course Model**
```php
public function students()
{
    return $this->belongsToMany(Student::class, 'enrollments')
                ->withTimestamps();
}
```

### Key Features

**1. Duplicate Prevention**
- Unique constraint in database: `unique(['student_id', 'course_id'])`
- Controller validation checks enrollment status

**2. Capacity Management**
- `hasAvailableSlots()` method checks capacity
- Prevents enrollment if course is full
- Real-time slot availability display

**3. Foreign Key Constraints**
- Cascade delete on student/course removal
- Maintains data integrity

**4. Validation**
- Unique student numbers and emails
- Unique course codes
- Required fields validation
- Proper error handling

---

## 📂 Project Structure

```
enrollment-system/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── StudentController.php
│   │       └── CourseController.php
│   └── Models/
│       ├── Student.php
│       └── Course.php
├── database/
│   ├── migrations/
│   │   ├── create_students_table.php
│   │   ├── create_courses_table.php
│   │   └── create_enrollments_table.php
│   └── seeders/
│       └── DatabaseSeeder.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── students/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── show.blade.php
│       │   └── edit.blade.php
│       └── courses/
│           ├── index.blade.php
│           ├── create.blade.php
│           ├── show.blade.php
│           └── edit.blade.php
└── routes/
    └── web.php
```

---

## 🎯 Requirements Checklist

### Database
- ✅ Three tables: students, courses, enrollments
- ✅ Proper field types and constraints
- ✅ Foreign key relationships
- ✅ Timestamps on all tables

### Models
- ✅ Student model with belongsToMany relationship
- ✅ Course model with belongsToMany relationship
- ✅ No raw DB queries - all Eloquent

### Business Rules
- ✅ Prevent duplicate enrollments
- ✅ Respect course capacity limits
- ✅ Proper validation

### Modules
- ✅ Student Module: List, Add, View Profile, Edit
- ✅ Course Module: List, Add, View Details, Edit
- ✅ Student profile shows all enrolled courses
- ✅ Course details show all enrolled students

### MVC Architecture
- ✅ Proper separation of Models, Views, Controllers
- ✅ Clean routing
- ✅ Validation in controllers

---

## 📦 Submission Format

### GitHub Repository
1. Create new repository on GitHub
2. Push the project:
```bash
git init
git add .
git commit -m "Initial commit - IT15 Enrollment System"
git branch -M main
git remote add origin YOUR_GITHUB_URL
git push -u origin main
```

### ZIP File
**Filename:** `LASTNAME_IT15_ENROLLMENT_SYSTEM.zip`

**Include:**
- All migration files
- All application code
- README.md

**Exclude:**
- .env file (use .env.example instead)
- vendor folder
- node_modules folder

**To create ZIP:**
1. Delete vendor and node_modules folders
2. Compress the project folder
3. Rename to: `LASTNAME_IT15_ENROLLMENT_SYSTEM.zip`

---

## 🐛 Troubleshooting

### Common Issues

**1. "Class not found" errors**
```bash
composer dump-autoload
```

**2. Migration errors**
```bash
php artisan migrate:fresh
```

**3. Route not found**
```bash
php artisan route:clear
php artisan cache:clear
```

**4. Database connection error**
- Check XAMPP MySQL is running
- Verify .env database credentials
- Ensure database exists in phpMyAdmin

---

## 👨‍💻 Developer Notes

### Sample Data
The seeder creates:
- 5 sample students
- 5 sample courses
- Some pre-enrolled students for testing

### Testing Workflow
1. Start with fresh database: `php artisan migrate:fresh --seed`
2. Test student CRUD operations
3. Test course CRUD operations
4. Test enrollment with capacity limits
5. Test duplicate enrollment prevention

---

## 📧 Contact

For questions or issues, please contact your instructor.

**Submission Deadline:** Sunday, 7:00 PM

---

## 🙏 Acknowledgments

Built with Laravel Framework
UI styled with Bootstrap 5
Icons from Bootstrap Icons

---

**Good luck with your submission! 🚀**
