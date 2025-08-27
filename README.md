# TASKBABA

A Laravel-based Task Management application.

---

## 📦 Installation and Running

### ✅ Prerequisites
- PHP (8.4)  
- Composer  
- MySQL or any supported database  

### ✅ Steps to Install

1. **Clone the repository**
   ```bash
   git clone https://github.com/khalid-eyez/taskbaba.git 
   cd <project-folder>
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Create `.env` file**
   ```bash
   cp .env.example .env
   ```

4. **Update `.env` configuration**
   - Set your database credentials:
     ```
     DB_DATABASE=your_database_name
     DB_USERNAME=your_database_user
     DB_PASSWORD=your_database_password
     ```

5. **Generate application key**
   ```bash
   php artisan key:generate
   ```

6. **Run database migrations**
   ```bash
   php artisan migrate
   ```
7. **Start the Laravel development server**
   ```bash
   php artisan serve
   ```

8. **Access the application**
    Open [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser.

---

## 📜 License

This project is licensed under the **LGPL (Lesser General Public License)**.  
See the full [LGPL License](https://www.gnu.org/licenses/lgpl-3.0.html) for more details.

---

## 👨‍💻 Developer

**Khalid hassan**  
Software Developer | PHP (Yii), Laravel, React, Java (Spring Boot)  
[LinkedIn](linkedin.com/in/khalidi-hassan-64a4a1189) | [Portfolio](https://khalid-eyez.github.io/)
August 2025

