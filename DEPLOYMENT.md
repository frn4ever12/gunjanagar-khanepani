# cPanel Deployment Guide

This guide provides step-by-step instructions for deploying the Gunjanagar Khanepani Management System to a cPanel hosting environment.

## Prerequisites

- cPanel hosting account with SSH access
- PHP 8.2 or higher
- MySQL database
- Composer installed on the server
- Node.js & NPM installed on the server

## Deployment Steps

### 1. Prepare Local Files

Before uploading, ensure you have:
- Run `composer install --no-dev` locally
- Run `npm install && npm run build` locally
- Exclude the following files from upload:
  - `node_modules/`
  - `vendor/`
  - `.env`
  - `.git/`
  - `storage/` (except `.gitignore`)
  - `bootstrap/cache/` (except `.gitignore`)

### 2. Upload Files to Server

#### Option A: Using File Manager
1. Log in to cPanel
2. Open File Manager
3. Navigate to `public_html` or your desired directory
4. Upload all project files (excluding the files mentioned above)

#### Option B: Using FTP/SFTP
1. Use FileZilla or similar FTP client
2. Connect to your server using provided credentials
3. Upload all files to the `public_html` directory

#### Option C: Using Git (Recommended)
```bash
# SSH into your server
ssh username@yourdomain.com

# Navigate to your directory
cd public_html

# Clone the repository
git clone <your-repository-url> .

# Or pull if already cloned
git pull origin main
```

### 3. Install Dependencies

SSH into your server and run:

```bash
# Navigate to your project directory
cd public_html

# Install PHP dependencies
composer install --optimize-autoloader --no-dev

# Install Node dependencies
npm install

# Build assets for production
npm run build
```

### 4. Configure Environment

1. Copy the example environment file:
```bash
cp .env.example .env
```

2. Edit the `.env` file:
```bash
nano .env
```

Update the following settings:
```env
APP_NAME="Gunjanagar Khanepani"
APP_ENV=production
APP_KEY=base64:your-generated-key
APP_DEBUG=false
APP_URL=https://yourdomain.com

# Database Configuration
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

# Filesystem
FILESYSTEM_DISK=public
```

3. Generate application key:
```bash
php artisan key:generate
```

### 5. Create MySQL Database

1. Log in to cPanel
2. Navigate to **MySQL® Databases**
3. Create a new database:
   - **New Database:** `khane_pani` (or your preferred name)
4. Create a new database user:
   - **Username:** `khane_user` (or your preferred name)
   - **Password:** Generate a strong password
5. Add the user to the database:
   - Select the user and database
   - Click **Add**
   - Check **ALL PRIVILEGES**
   - Click **Make Changes**

### 6. Run Database Migrations

```bash
php artisan migrate --force
```

### 7. Seed the Database

```bash
php artisan db:seed --force
```

### 8. Create Storage Link

```bash
php artisan storage:link
```

### 9. Set Directory Permissions

```bash
# Set permissions for storage directory
chmod -R 755 storage

# Set permissions for bootstrap/cache directory
chmod -R 755 bootstrap/cache

# Set permissions for public directory
chmod -R 755 public
```

### 10. Optimize Application

```bash
# Cache configuration
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache

# Optimize autoloader
composer dump-autoload --optimize
```

### 11. Configure Cron Job (Optional)

For automated tasks like sitemap generation, set up a cron job:

1. Log in to cPanel
2. Navigate to **Cron Jobs**
3. Add a new cron job:
   - **Minute:** `0`
   - **Hour:** `0`
   - **Day:** `*`
   - **Month:** `*`
   - **Weekday:** `*`
   - **Command:** `/usr/local/bin/php /home/username/public_html/artisan schedule:run >> /dev/null 2>&1`

Replace `username` with your actual cPanel username.

### 12. Configure SSL Certificate (Optional but Recommended)

1. Log in to cPanel
2. Navigate to **SSL/TLS Status**
3. Select your domain
4. Click **Run AutoSSL**

### 13. Test the Application

1. Open your browser
2. Navigate to `https://yourdomain.com`
3. Verify the homepage loads correctly
4. Test the admin panel at `https://yourdomain.com/admin`
5. Test language switching
6. Test various pages and features

### 14. Post-Deployment Checklist

- [ ] Homepage loads correctly
- [ ] Admin panel accessible
- [ ] Database seeded with demo data
- [ ] File uploads working
- [ ] Language switcher functional
- [ ] All pages rendering correctly
- [ ] No PHP errors in logs
- [ ] SSL certificate active
- [ ] Cron jobs configured (if needed)

## Troubleshooting

### 500 Internal Server Error

Check the error logs:
```bash
tail -f storage/logs/laravel.log
```

Common causes:
- Missing `.env` file
- Incorrect database credentials
- Missing permissions on storage directory
- Missing storage link

### Database Connection Error

Verify:
- Database exists in cPanel
- User has correct privileges
- Credentials in `.env` match cPanel settings
- MySQL server is running

### File Upload Issues

Check permissions:
```bash
ls -la storage/app/public
```

Ensure the directory is writable:
```bash
chmod -R 755 storage/app/public
```

### Assets Not Loading

Clear cache:
```bash
php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan route:clear
```

Re-run asset compilation:
```bash
npm run build
```

## Security Recommendations

1. **Change Default Passwords**
   - Update admin credentials immediately after deployment
   - Use strong passwords for database users

2. **Disable Debug Mode**
   - Ensure `APP_DEBUG=false` in `.env`

3. **Secure File Permissions**
   - Don't use 777 permissions
   - Use 755 for directories and 644 for files

4. **Enable HTTPS**
   - Install SSL certificate
   - Force HTTPS redirects

5. **Regular Backups**
   - Set up automated database backups
   - Backup file storage regularly

6. **Keep Dependencies Updated**
   - Regularly run `composer update`
   - Update npm packages

## Maintenance

### Regular Updates

```bash
# Update PHP dependencies
composer update --no-dev

# Update Node dependencies
npm update

# Rebuild assets
npm run build

# Clear caches
php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan route:clear

# Re-optimize
php artisan optimize
```

### Database Backups

Using cPanel:
1. Navigate to **phpMyAdmin**
2. Select your database
3. Click **Export**
4. Choose **Quick** export method Format: **SQL**
5. Click **Go**

Using command line:
```bash
mysqldump -u username -p database_name > backup.sql
```

### Log Rotation

Monitor log file sizes:
```bash
du -sh storage/logs/*
```

Rotate logs if they become too large:
```bash
rm storage/logs/laravel.log
```

## Support

For issues related to:
- **Hosting:** Contact your hosting provider
- **Application:** Check the README.md or contact the development team
- **cPanel:** Refer to cPanel documentation at https://docs.cpanel.net/

## Additional Resources

- [Laravel Deployment Documentation](https://laravel.com/docs/deployment)
- [cPanel Documentation](https://docs.cpanel.net/)
- [Composer Documentation](https://getcomposer.org/doc/)
- [NPM Documentation](https://docs.npmjs.com/)
