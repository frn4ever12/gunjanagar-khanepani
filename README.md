# Gunjanagar Khanepani Management System

A comprehensive water supply management system built with Laravel 11, featuring bilingual support (English/Nepali), admin panel, and public-facing website for Gunjanagar Khanepani.

## Features

### Admin Panel
- **Dashboard** with statistics and overview
- **Banner Management** - Hero banners for homepage
- **Notice Management** - Public notices with attachments
- **News Management** - News articles with images
- **Services Management** - Water connection services with details
- **Downloads Management** - Forms and documents for download
- **FAQ Management** - Frequently asked questions
- **Water Supply Status** - Real-time water supply status
- **Water Supply Schedule** - Area-wise water supply schedule
- **Water Quality** - Water quality testing results
- **Complaint Management** - Public complaint handling system
- **Statistics Management** - Key statistics display
- **Settings** - Organization configuration

### Frontend Website
- **Homepage** with banners, statistics, news, and notices
- **About Page** - Organization information
- **Services Page** - Detailed service information
- **Notices Page** - Public notices listing
- **News Page** - News articles listing
- **Downloads Page** - Forms and documents
- **FAQs Page** - Frequently asked questions
- **Water Status Page** - Current water supply status
- **Water Schedule Page** - Supply schedule by area
- **Water Quality Page** - Quality testing results
- **Complaint Form** - Public complaint submission

### Technical Features
- **Bilingual Support** - English and Nepali languages
- **User Authentication** - Role-based access (Super Admin, Admin, Staff)
- **File Upload System** - Images, documents, and attachments
- **Responsive Design** - Mobile, tablet, and desktop compatible
- **Bootstrap 5** - Modern UI framework
- **SQLite/MySQL Support** - Local and production database options

## Requirements

- PHP 8.2 or higher
- Composer
- Node.js & NPM (for asset compilation)
- SQLite (local) or MySQL (production)

## Installation

### 1. Clone the Repository

```bash
git clone <repository-url>
cd khane-pani-new
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Environment Configuration

Copy the example environment file:

```bash
cp .env.example .env
```

Configure your `.env` file:

```env
APP_NAME="Gunjanagar Khanepani"
APP_ENV=local
APP_KEY=base64:your-generated-key
APP_DEBUG=true
APP_URL=http://localhost:8000

# Database Configuration
# For Local Development (SQLite)
DB_CONNECTION=sqlite
# DB_DATABASE=database/database.sqlite

# For Production (MySQL)
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=khane_pani
# DB_USERNAME=your_username
# DB_PASSWORD=your_password
```

Generate application key:

```bash
php artisan key:generate
```

### 4. Database Setup

Create SQLite database (if using SQLite):

```bash
touch database/database.sqlite
```

Run migrations:

```bash
php artisan migrate
```

Seed the database with demo data:

```bash
php artisan db:seed
```

### 5. Link Storage

Create symbolic link for public storage:

```bash
php artisan storage:link
```

### 6. Compile Assets

```bash
npm run dev
```

For production:

```bash
npm run build
```

### 7. Start Development Server

```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

## Default Admin Credentials

After running the seeder, you can access the admin panel with:

- **Email:** admin@example.com
- **Password:** password

Access admin panel at: `http://localhost:8000/admin`

## Project Structure

```
khane-pani-new/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/          # Admin controllers
│   │   │   └── HomeController   # Frontend controller
│   │   └── Middleware/         # Custom middleware
│   └── Models/                 # Eloquent models
├── database/
│   ├── migrations/             # Database migrations
│   └── seeders/               # Database seeders
├── resources/
│   ├── lang/
│   │   ├── en/                # English translations
│   │   └── ne/                # Nepali translations
│   └── views/
│       ├── admin/              # Admin panel views
│       ├── auth/               # Authentication views
│       └── layouts/            # Layout templates
├── public/                     # Public assets
└── routes/
    └── web.php                 # Web routes
```

## Available Commands

### Development
```bash
php artisan serve              # Start development server
php artisan migrate            # Run database migrations
php artisan db:seed            # Seed the database
php artisan storage:link       # Create storage symbolic link
npm run dev                    # Watch and compile assets
```

### Production
```bash
php artisan migrate --force    # Run migrations in production
php artisan db:seed --force    # Seed database in production
php artisan optimize           # Cache configuration
php artisan config:cache       # Cache configuration files
php artisan route:cache        # Cache routes
npm run build                  # Build assets for production
```

## Database Configuration

### SQLite (Local Development)
```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

### MySQL (Production)
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=khane_pani
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## Deployment Guide

### Local Deployment
1. Follow the installation steps above
2. Set `APP_ENV=local` in `.env`
3. Use SQLite for easy local development

### Production Deployment (cPanel)

1. **Upload Files**
   - Upload all files except `node_modules`, `vendor`, and `.env`
   
2. **Install Dependencies**
   ```bash
   composer install --optimize-autoloader --no-dev
   npm install
   npm run build
   ```

3. **Environment Configuration**
   - Copy `.env.example` to `.env`
   - Configure production settings
   - Generate application key: `php artisan key:generate`

4. **Database Setup**
   - Create MySQL database via cPanel
   - Update `.env` with database credentials
   - Run migrations: `php artisan migrate --force`
   - Run seeders: `php artisan db:seed --force`

5. **Storage Link**
   ```bash
   php artisan storage:link
   ```

6. **Optimize Application**
   ```bash
   php artisan optimize
   php artisan config:cache
   php artisan route:cache
   ```

7. **Set Permissions**
   ```bash
   chmod -R 755 storage
   chmod -R 755 bootstrap/cache
   ```

## Language Support

The system supports two languages:
- **English** (en)
- **Nepali** (ne)

Language files are located in `resources/lang/` directory.

## Support

For issues and questions, please contact the development team.

## License

This project is proprietary software for Gunjanagar Khanepani.
