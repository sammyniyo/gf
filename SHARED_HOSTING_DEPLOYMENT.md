# 🚀 Shared Hosting Deployment Guide (No SSH Access)

## ✅ Your Setup

-   ✅ **Git connected** to remote server
-   ❌ **No terminal/SSH** access (shared hosting)
-   ✅ **cPanel** or similar control panel available

---

## 📋 Deployment Steps

### **Step 1: Push Your Code via Git**

```bash
# On your local computer
git add .
git commit -m "Deploy to production"
git push origin main
```

Your hosting should automatically pull the changes.

---

### **Step 2: Create Storage Symlink (Browser Method)**

Since you don't have SSH, I've created a web-based solution:

#### **Option A: Using Web Script (Easiest)**

1. **The script is ready:**

    - File: `public/setup-storage.php`
    - Already committed to Git

2. **After Git deploys, visit:**

    ```
    https://yourdomain.com/setup-storage.php
    ```

3. **Follow the on-screen instructions:**

    - Click "Create Storage Link"
    - Wait for success message
    - Click "Delete This File"

4. **Done!** Images will now display

#### **Option B: Using cPanel File Manager**

If Option A doesn't work:

1. **Login to cPanel**

2. **Go to File Manager**

3. **Navigate to your website root**

4. **Find Terminal (if available)**

    - Some cPanels have a Terminal icon
    - If found, click it and run:

    ```bash
    cd public_html  # or your website directory
    php artisan storage:link
    ```

5. **If no Terminal, use PHP script method** (Option A above)

---

### **Step 3: Set Up Environment File**

1. **In cPanel File Manager:**

    - Navigate to your website root
    - Find `.env.example`
    - Copy it and rename to `.env`

2. **Edit `.env` file:**

    ```env
    APP_NAME="God's Family Choir"
    APP_ENV=production
    APP_DEBUG=false  # IMPORTANT: Set to false in production!
    APP_URL=https://yourdomain.com

    DB_CONNECTION=mysql
    DB_HOST=localhost
    DB_PORT=3306
    DB_DATABASE=u736264619_gf
    DB_USERNAME=u736264619_gf
    DB_PASSWORD=your_password_here
    ```

3. **Save the file**

---

### **Step 4: Upload Member Images**

Your images are in: `storage/app/public/member-photos/`

**Upload via cPanel:**

1. **Go to File Manager**
2. **Navigate to:** `storage/app/public/`
3. **Create folder:** `member-photos` (if not exists)
4. **Upload all images** from your local folder:
    ```
    Local: C:\Users\samsh\Documents\gf\storage\app\public\member-photos\
    Server: storage/app/public/member-photos/
    ```

**Or use FTP:**

```
Local folder:  storage/app/public/member-photos/
Server folder: /home/username/public_html/storage/app/public/member-photos/
```

---

### **Step 5: Set Permissions**

In cPanel File Manager:

1. **Right-click** `storage` folder
2. **Change Permissions** → Set to `755`
3. **Apply to all subdirectories**

4. **Right-click** `bootstrap/cache` folder
5. **Change Permissions** → Set to `755`

---

### **Step 6: Run Database Migrations**

Since you can't run `php artisan migrate`, create this file:

**File:** `public/migrate.php`

```php
<?php
// Load Laravel
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Run migrations
echo "<pre>";
echo "Running migrations...\n\n";

try {
    Artisan::call('migrate', ['--force' => true]);
    echo Artisan::output();
    echo "\n✅ Migrations completed!\n";
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}

echo "\n⚠️ Delete this file after use!";
echo "</pre>";
```

**Usage:**

1. Visit: `https://yourdomain.com/migrate.php`
2. Wait for migrations to complete
3. **Delete the file** via cPanel

---

### **Step 7: Backfill Member IDs**

Create this file:

**File:** `public/backfill-members.php`

```php
<?php
// Load Laravel
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "<!DOCTYPE html><html><head><title>Backfill Member IDs</title>";
echo "<style>body{font-family:sans-serif;padding:20px;background:#f5f5f5;} .success{color:green;} .error{color:red;} pre{background:white;padding:15px;border-radius:5px;}</style>";
echo "</head><body><h1>🔧 Backfill Member IDs</h1><pre>";

use App\Models\Member;
use App\Services\MemberIdService;

try {
    $members = Member::where(function($q) {
        $q->whereNull('member_id')
          ->orWhere('member_id', '')
          ->orWhere('member_id', 'NOT LIKE', 'GF%');
    })->get();

    echo "Found {$members->count()} members to update\n\n";

    foreach ($members as $member) {
        $oldId = $member->member_id;
        $member->member_id = MemberIdService::generateUnique();
        $member->save();

        echo "✅ {$member->full_name}: '{$oldId}' → '{$member->member_id}'\n";
    }

    echo "\n<span class='success'>✅ All members updated successfully!</span>\n";
} catch (Exception $e) {
    echo "<span class='error'>❌ Error: {$e->getMessage()}</span>\n";
}

echo "\n⚠️ <strong>Delete this file now!</strong>";
echo "</pre></body></html>";
```

**Usage:**

1. Visit: `https://yourdomain.com/backfill-members.php`
2. Wait for completion
3. **Delete the file** via cPanel

---

### **Step 8: Clear Caches**

Create this file:

**File:** `public/clear-cache.php`

```php
<?php
// Load Laravel
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "<!DOCTYPE html><html><head><title>Clear Cache</title>";
echo "<style>body{font-family:sans-serif;padding:20px;background:#f5f5f5;} pre{background:white;padding:15px;border-radius:5px;}</style>";
echo "</head><body><h1>🧹 Clear All Caches</h1><pre>";

try {
    Artisan::call('cache:clear');
    echo "✅ Cache cleared\n";

    Artisan::call('config:clear');
    echo "✅ Config cache cleared\n";

    Artisan::call('view:clear');
    echo "✅ View cache cleared\n";

    Artisan::call('route:clear');
    echo "✅ Route cache cleared\n";

    echo "\n✅ All caches cleared successfully!";
} catch (Exception $e) {
    echo "❌ Error: {$e->getMessage()}";
}

echo "\n\n⚠️ <strong>Delete this file now!</strong>";
echo "</pre></body></html>";
```

**Usage:**

1. Visit: `https://yourdomain.com/clear-cache.php`
2. **Delete the file** after use

---

## 📝 Complete Deployment Checklist

### **On Local Computer:**

-   [ ] Test everything works locally
-   [ ] Commit all changes to Git
-   [ ] Push to your repository
-   [ ] Wait for hosting to pull changes

### **On Server (via cPanel/Browser):**

-   [ ] Upload `.env` file and configure
-   [ ] Visit `setup-storage.php` to create symlink
-   [ ] Upload member images to `storage/app/public/member-photos/`
-   [ ] Set permissions on `storage/` and `bootstrap/cache/`
-   [ ] Visit `migrate.php` to run database migrations
-   [ ] Visit `backfill-members.php` to fix member IDs
-   [ ] Visit `clear-cache.php` to clear all caches
-   [ ] **Delete all utility PHP files** (setup-storage.php, migrate.php, etc.)
-   [ ] Test the website

### **Testing:**

-   [ ] Visit homepage: `https://yourdomain.com`
-   [ ] Login to admin: `https://yourdomain.com/admin`
-   [ ] Check members page: Member photos display ✅
-   [ ] Create test member: Upload works ✅
-   [ ] Create test story: Form submits ✅

---

## 🐛 Troubleshooting

### **Issue: Git not updating files**

**Solution:** Check your hosting's Git settings

-   Some hosts need you to trigger deployment
-   Check for a "Pull from Git" button in cPanel
-   Or set up a webhook

### **Issue: Images still not displaying**

**Solution:**

1. Verify symlink exists:

    - Check if `public/storage` folder exists
    - It should be a link, not a regular folder

2. Try manual symlink via SSH (if you get access):

    ```bash
    ln -s ../storage/app/public public/storage
    ```

3. Contact hosting support:
    - Ask them to create the symlink for you
    - Provide this command: `ln -s ../storage/app/public public/storage`

### **Issue: Utility scripts don't work**

**Solution:**

1. Check PHP version (needs PHP 8.0+)
2. Check file permissions (755)
3. Check error logs in cPanel

### **Issue: Database connection fails**

**Solution:**

1. Verify `.env` database credentials
2. Check if your IP is whitelisted (cPanel → Remote MySQL)
3. Confirm database name and user are correct

---

## 🔒 Security Notes

**⚠️ IMPORTANT - Delete These Files After Use:**

```
public/setup-storage.php
public/migrate.php
public/backfill-members.php
public/clear-cache.php
```

**Never leave these files on your production server!**

---

## 📞 If You Need SSH Access

Contact your hosting provider and request:

-   SSH access to your account
-   Or ask them to run these commands for you:

```bash
cd /path/to/your/website
php artisan storage:link
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## ✅ Summary

**For Shared Hosting Without SSH:**

1. ✅ Push code via Git
2. ✅ Visit `setup-storage.php` in browser
3. ✅ Upload images via cPanel/FTP
4. ✅ Visit utility scripts for migrations
5. ✅ **Delete all utility scripts**
6. ✅ Test everything

**Ready to deploy!** 🚀
