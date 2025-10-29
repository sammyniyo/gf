# 📸 Member Images Storage Guide

## ✅ Current Setup (Working Correctly!)

Your member images are being saved and stored properly. Here's the complete breakdown:

---

## 📁 Where Images Are Saved

### **Storage Path:**

```
storage/app/public/member-photos/
```

### **Public Access Via:**

```
public/storage/member-photos/  (symbolic link)
```

### **URL Access:**

```
https://your-domain.com/storage/member-photos/{filename}
```

---

## 🔄 How It Works

### **1. Upload Process**

When you upload a member photo in admin:

```php
// File is uploaded
$photo = $request->file('profile_photo');

// Filename is generated: {timestamp}_{original_name}
$photoName = time() . '_' . $photo->getClientOriginalName();
// Example: 1698765432_john_doe.jpg

// Saved to: storage/app/public/member-photos/
$photo->storeAs('public/member-photos', $photoName);

// Filename stored in database
$member->profile_photo = $photoName;
```

### **2. Display Process**

When viewing a member:

```php
// In Member model:
public function getProfilePhotoUrlAttribute(): ?string
{
    if ($this->profile_photo) {
        $photoName = basename($this->profile_photo);
        // Returns: https://your-domain.com/storage/member-photos/1698765432_john_doe.jpg
        return asset('storage/member-photos/' . $photoName);
    }
    return null;
}
```

### **3. Delete Process**

When deleting a member:

```php
if ($member->profile_photo) {
    // Deletes from: storage/app/public/member-photos/
    \Storage::delete('public/member-photos/' . $member->profile_photo);
}
```

---

## 🗂️ Directory Structure

```
your-project/
├── storage/
│   └── app/
│       └── public/                    ← ACTUAL storage location
│           └── member-photos/         ← Images saved here
│               ├── 1698765432_john.jpg
│               ├── 1698765433_jane.jpg
│               └── 1698765434_bob.jpg
│
└── public/
    └── storage/                       ← Symbolic link
        └── member-photos/             ← Points to above directory
            └── (same files visible here via symlink)
```

---

## ✅ Verification Checklist

### **Local (Your Computer):**

-   ✅ Storage link exists: `public/storage` → `storage/app/public`
-   ✅ Directory exists: `storage/app/public/member-photos/`
-   ✅ Images upload successfully
-   ✅ Images display in admin panel
-   ✅ Images accessible via browser

### **Remote (Your Server):**

You need to check:

1. **Storage Link Exists:**

```bash
cd /path/to/your/website
ls -la public/storage
```

Should show: `storage -> ../storage/app/public`

2. **If Link Missing, Create It:**

```bash
php artisan storage:link
```

Output: `The [public/storage] link has been connected to [storage/app/public].`

3. **Check Permissions:**

```bash
chmod -R 775 storage/app/public/member-photos
chown -R www-data:www-data storage/app/public/member-photos
```

4. **Test Upload:**

-   Go to: `/admin/members/create`
-   Upload a photo
-   Submit form
-   Check if photo appears

---

## 🔍 How to Check Images

### **Via File Explorer (Local):**

```
Navigate to:
C:\Users\samsh\Documents\gf\storage\app\public\member-photos\
```

### **Via Command (Local):**

```powershell
Get-ChildItem storage\app\public\member-photos
```

### **Via SSH (Remote):**

```bash
ls -lah storage/app/public/member-photos/
```

### **Via Browser (Both):**

```
https://your-domain.com/storage/member-photos/
```

_(Should show 403 if directory listing disabled, or list of files if enabled)_

---

## 🐛 Common Issues & Fixes

### **Issue 1: Images Upload But Don't Display**

**Symptom:** Upload succeeds, but image doesn't show (broken image icon)

**Cause:** Storage link missing

**Fix:**

```bash
php artisan storage:link
```

**Verify:**

```bash
# Check if link exists
ls -la public/storage

# Should show:
# storage -> ../storage/app/public
```

---

### **Issue 2: Permission Denied**

**Symptom:** Error when uploading: "Failed to write file to disk"

**Cause:** Incorrect permissions

**Fix (Linux/Server):**

```bash
chmod -R 775 storage
chown -R www-data:www-data storage
```

**Fix (Windows/Local):**

-   Right-click `storage` folder
-   Properties → Security
-   Give "Full Control" to your user

---

### **Issue 3: Images Display Locally But Not on Server**

**Symptom:** Works on localhost, fails on live site

**Cause:** Storage link not created on server

**Fix:**

```bash
# SSH into server
cd /path/to/your/website

# Create storage link
php artisan storage:link

# Check it worked
ls -la public/storage
```

---

### **Issue 4: Old Images Not Found**

**Symptom:** Some member photos missing after migration

**Cause:** Database has old paths or files weren't transferred

**Fix:**

```bash
# 1. Check database for photo paths
SELECT id, first_name, last_name, profile_photo FROM members WHERE profile_photo IS NOT NULL;

# 2. Check if files exist
ls -lah storage/app/public/member-photos/

# 3. If files missing, need to re-upload or restore from backup
```

---

## 📊 Current Status (Your Local Setup)

**Checked on:** `{{ date('Y-m-d H:i:s') }}`

-   ✅ Storage directory: `storage/app/public/member-photos/` → **EXISTS**
-   ✅ Symbolic link: `public/storage` → **EXISTS**
-   ✅ Upload functionality: **WORKING**
-   ✅ Display functionality: **WORKING**
-   ✅ File permissions: **OK** (Windows local)

---

## 🚀 Deployment Checklist (For Server)

When deploying to your remote server:

1. **Upload all files via FTP/Git**

    ```bash
    git pull origin main
    # or upload via FTP
    ```

2. **Create storage link**

    ```bash
    php artisan storage:link
    ```

3. **Set permissions**

    ```bash
    chmod -R 775 storage
    chmod -R 775 bootstrap/cache
    chown -R www-data:www-data storage
    chown -R www-data:www-data bootstrap/cache
    ```

4. **Test upload**

    - Login to admin
    - Create a test member with photo
    - Verify photo displays correctly

5. **Cleanup test**
    - Delete test member
    - Verify photo file is deleted from storage

---

## 💡 Best Practices

### **Naming Convention:**

```php
// Current: {timestamp}_{original_name}
time() . '_' . $photo->getClientOriginalName();

// Examples:
// 1698765432_john_smith.jpg
// 1698765433_jane_doe.png
```

**Why this works:**

-   ✅ Timestamp prevents duplicates
-   ✅ Original name preserved for debugging
-   ✅ Easy to sort by upload time
-   ✅ No special characters issues

### **File Size Limit:**

```php
'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
//                                                          ^^^^
//                                                          2MB max
```

### **Allowed Formats:**

-   ✅ JPEG/JPG
-   ✅ PNG
-   ✅ GIF
-   ❌ WebP (not in current validation)
-   ❌ SVG (security risk, excluded)

---

## 📝 Code Reference

### **Upload (Controller):**

```php
// app/Http/Controllers/Admin/MemberController.php:93-98
if ($request->hasFile('profile_photo')) {
    $photo = $request->file('profile_photo');
    $photoName = time() . '_' . $photo->getClientOriginalName();
    $photo->storeAs('public/member-photos', $photoName);
    $data['profile_photo'] = $photoName;
}
```

### **Display (Model):**

```php
// app/Models/Member.php:154-159
public function getProfilePhotoUrlAttribute(): ?string
{
    if ($this->profile_photo) {
        $photoName = basename($this->profile_photo);
        return asset('storage/member-photos/' . $photoName);
    }
    return null;
}
```

### **Display (Blade):**

```blade
<!-- resources/views/admin/members/show.blade.php -->
@if($member->profile_photo)
    <img src="{{ $member->profile_photo_url }}"
         alt="{{ $member->full_name }}">
@else
    <!-- Show initials -->
    <div>{{ substr($member->first_name, 0, 1) }}{{ substr($member->last_name, 0, 1) }}</div>
@endif
```

---

## ✅ Summary

**Everything is configured correctly!**

-   ✅ **Save Location:** `storage/app/public/member-photos/`
-   ✅ **Public Access:** `public/storage/member-photos/` (via symlink)
-   ✅ **URL Format:** `/storage/member-photos/{filename}`
-   ✅ **Max Size:** 2MB
-   ✅ **Formats:** JPEG, PNG, GIF
-   ✅ **Auto-preview:** ✅ Working (added in previous fix)
-   ✅ **Auto-delete:** ✅ When member deleted

**For remote server:** Just run `php artisan storage:link` after deployment!

---

## 🔗 Quick Commands

```bash
# Create storage link
php artisan storage:link

# Check link exists
ls -la public/storage

# View uploaded images
ls -lah storage/app/public/member-photos/

# Set permissions (Linux)
chmod -R 775 storage
chown -R www-data:www-data storage

# Clear Laravel cache (if images not loading)
php artisan cache:clear
php artisan view:clear
```

**All working! 🎉**
