# 🔐 Secure Full User System in PHP (No Framework)

This project is a beginner-friendly, mobile-ready **PHP & MySQL** user system built without any framework. It includes secure login, registration, session management, password hashing, and profile updates — fully working in **KSWEB** on Android or on local servers like XAMPP/LAMP.

---

## 🚀 Features

- ✅ User Registration (with `password_hash`)
- 🔐 Secure Login (with `password_verify`)
- 💾 "Remember Me" using cookies
- ♻️ Change Password with verification
- 🚪 Logout system
- 🧠 Session and access control
- 📱 Mobile compatible (via KSWEB or Termux)

---

## 📂 Folder Structure

```
/htdocs or /www/
├── register.html
├── register.php
├── login.html
├── login.php
├── dashboard.php
├── logout.php
├── change_password.php
├── update_password.php
└── database.php  (optional for shared DB config)
```

---

## 🗃️ Database Setup

In **phpMyAdmin**, run:

```sql
CREATE TABLE users_login (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE,
  password VARCHAR(255)
);
```

---

## 📝 How It Works

### 1. ✅ User Registration (`register.php`)
- Takes username and password
- Password is securely hashed using `password_hash()`
- Saves data into MySQL

### 2. 🔐 Login (`login.php`)
- Fetches user by username
- Verifies password using `password_verify()`
- Starts session and optionally sets "remember me" cookie

### 3. 👤 Dashboard (`dashboard.php`)
- Requires valid session or cookie
- Displays welcome message
- Provides links to change password and logout

### 4. 🔁 Change Password
- Verifies current password before updating
- Hashes new password and updates DB

### 5. 🚪 Logout
- Destroys session and clears cookie

---

## ⚙️ Requirements

- PHP 7.0+
- MySQL/MariaDB
- KSWEB (Android), XAMPP, or any local PHP server
- A web browser

---

## 🔐 Security Notes

- Passwords are **hashed**, never stored as plain text
- Uses `password_verify()` for authentication
- Sessions used to prevent unauthorized access
- Cookies expire in 24 hours (for "remember me")
- Uses simple **prepared statements** in future improvements (not shown here)

---

## 📦 Future Improvements

- [ ] Use PDO + prepared statements
- [ ] Add email verification / OTP
- [ ] Upload profile photo
- [ ] Admin panel with user management
- [ ] Rate limit login attempts

---

## 🙌 Author

Created by **Md. Abdullah Junayed** with the guidance of ChatGPT.

Happy coding! 🚀
