# Academic System

Learn inertia by build academic system with Vue JS

- CRUD Lecturers, Students, Faculties, Building, Room, Academic Year, Program Study, Schedule, Courses, Class
- Multi Auth Student, Lecturer, Admin, Roles & Permission

# Account
### Admin Account
- Email : superadmin@gmail.com
- Password : admin

### Lecturer Account
- Email : iqronegoro0@gmail.com
- Password : iqro

### Student Account
- Email : iqronegoro0@gmail.com
- Password : iqro

# How To Install
```
1. git clone https://github.com/IqroNegoro/sistem-kampus.git
2. cd sistem-kampus
3. npm install && composer install
4. php artisan key:generate
```

## Databases
```
1. rename .env.example to .env and changing database

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=yourdb
DB_USERNAME=root
DB_PASSWORD=

2. php artisan migrate:refresh --seed
```
