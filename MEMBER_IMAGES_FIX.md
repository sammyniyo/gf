# Member Images Not Loading - Fix Guide

## Problem

Member profile images return a **503 Service Unavailable** error when trying to access them via:

```
https://godsfamilychoir.org/storage/member-photos/[filename].jpg
```

## Root Cause

The storage symlink is not properly configured on the production server. Laravel stores uploaded files in `storage/app/public/` but they need to be accessible via `public/storage/` through a symbolic link.

## Solution

### Option 1: Use the Setup Script (Recommended)

1. Visit: `https://godsfamilychoir.org/setup-storage.php`
2. Click "Create Storage Link"
3. Verify the setup works
4. **Delete the script** for security

### Option 2: SSH Access

If you have SSH access to your production server:

```bash
cd /path/to/your/project
php artisan storage:link
```

### Option 3: Manual Symlink (cPanel or FTP)

1. Login to your hosting control panel
2. Open Terminal or File Manager
3. Navigate to your public directory
4. Create a symbolic link:
    ```bash
    ln -s ../storage/app/public storage
    ```

### Option 4: Contact Hosting Support

If none of the above work, contact your hosting provider and ask them to create a symlink:

-   **From:** `public/storage`
-   **To:** `../storage/app/public` (or full path: `/path/to/storage/app/public`)

## Verification

After creating the symlink, test by:

1. Go to Admin → Members
2. View a member profile with a photo
3. The image should now display correctly

## What Was Fixed in the Code

### 1. Added Fallback Storage Controller (`app/Http/Controllers/StorageController.php`)

**NEW:** Created a controller that serves storage files through Laravel when symlink isn't available:

```php
public function memberPhoto($filename)
{
    $path = storage_path('app/public/member-photos/' . $filename);
    if (!file_exists($path)) {
        abort(404);
    }
    return response()->file($path);
}
```

Added routes in `routes/web.php`:

```php
Route::get('/storage/member-photos/{filename}', [StorageController::class, 'memberPhoto']);
Route::get('/storage/{path}', [StorageController::class, 'serve'])->where('path', '.*');
```

**Benefit:** Images will work even without symlink! Laravel will serve them directly.

### 2. Enhanced Member Model (`app/Models/Member.php`)

Added file existence check before returning photo URL:

```php
public function getProfilePhotoUrlAttribute(): ?string
{
    if ($this->profile_photo) {
        $photoName = basename($this->profile_photo);
        $storagePath = storage_path('app/public/member-photos/' . $photoName);

        if (file_exists($storagePath)) {
            return asset('storage/member-photos/' . $photoName);
        }

        \Log::warning("Member photo not found: {$photoName} for member ID: {$this->id}");
    }
    return null;
}
```

### 3. Enhanced Member View (`resources/views/admin/members/show.blade.php`)

Added fallback handling for missing images:

```blade
@if($member->profile_photo && $member->profile_photo_url)
    <img src="{{ $member->profile_photo_url }}"
         onerror="this.parentElement.style.display='none'; this.parentElement.nextElementSibling.style.display='flex';">
    <!-- Fallback to initials avatar -->
@else
    <!-- Show initials avatar -->
@endif
```

## Storage Structure

```
project/
├── public/
│   └── storage → ../storage/app/public (symlink)
└── storage/
    └── app/
        └── public/
            └── member-photos/
                ├── GF2025155_1760641165.jpg
                ├── GF2025176_1761166185.jpg
                └── ...
```

## Prevention

When deploying to production:

1. Always run `php artisan storage:link` after deployment
2. Add this to your deployment script/workflow
3. Or use the `setup-storage.php` script for shared hosting

## Still Not Working?

### Check File Permissions

```bash
chmod -R 755 storage
chmod -R 755 public/storage
```

### Check .htaccess

Ensure your `public/.htaccess` allows following symlinks:

```apache
Options +FollowSymLinks
```

### Check PHP Configuration

Some shared hosts disable the `symlink()` function. If so:

-   Contact hosting support
-   Or manually copy files from `storage/app/public/` to `public/storage/` (not recommended)

## Logs

Check `storage/logs/laravel.log` for warnings about missing files:

```
Member photo not found: 1761741500_FullSizeRender.jpg for member ID: 123
```

This will help identify which members have missing photo files.
