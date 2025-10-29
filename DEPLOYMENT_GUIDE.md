# Deployment Guide - God's Family Choir

## Quick Deployment Steps

### On Your Local Machine (Windows)

1. **Commit your changes:**
```bash
git add .
git commit -m "Fix member images and storage structure"
git push origin main
```

### On Production Server (SSH)

1. **SSH into your server:**
```bash
ssh u736264619@uk-fast-web1657.fasthosts.net.uk
cd /home/u736264619/public_html
```

2. **Pull latest changes:**
```bash
git pull origin main
```

3. **Run the setup script:**
```bash
chmod +x post-deployment-setup.sh
./post-deployment-setup.sh
```

4. **Verify:**
- Visit: https://godsfamilychoir.org/admin/members
- Check if member photos load correctly
- Test uploading a new member photo

---

## Detailed Deployment Process

### Pre-Deployment Checklist

- [ ] All changes committed locally
- [ ] Database migrations created (if needed)
- [ ] Environment variables documented
- [ ] Backup production database
- [ ] Test locally first

### Files to Push

These files have been updated to fix member image issues:

1. **New Files:**
   - `app/Http/Controllers/StorageController.php` - Serves files without symlink
   - `post-deployment-setup.sh` - Automated setup script
   - `create-storage-link.sh` - Symlink creation helper
   - `STORAGE_STRUCTURE.md` - Complete storage documentation
   - `MEMBER_IMAGES_FIX.md` - Troubleshooting guide
   - `DEPLOYMENT_GUIDE.md` - This file

2. **Modified Files:**
   - `app/Models/Member.php` - Enhanced photo URL handling
   - `resources/views/admin/members/show.blade.php` - Image fallback
   - `routes/web.php` - Added fallback storage routes

### Step-by-Step Deployment

#### 1. Local Machine (Commit & Push)

```bash
# Navigate to project
cd C:\Users\samsh\Documents\gf

# Check status
git status

# Add all changes
git add .

# Commit with descriptive message
git commit -m "Fix: Member images loading and storage structure

- Added StorageController for fallback file serving
- Enhanced Member model with file existence checks
- Added graceful image fallback in member view
- Created post-deployment setup script
- Documented complete storage structure"

# Push to repository
git push origin main
```

#### 2. Production Server (Pull & Setup)

```bash
# SSH into server
ssh u736264619@your-server-address

# Navigate to project root
cd /home/u736264619/public_html

# Backup current state (optional but recommended)
tar -czf backup-$(date +%Y%m%d-%H%M%S).tar.gz \
  storage/app/public \
  .env \
  public/.htaccess

# Pull latest changes
git pull origin main

# Make setup script executable
chmod +x post-deployment-setup.sh

# Run setup script
./post-deployment-setup.sh

# If script fails, run commands manually:
# cd public
# ln -s ../storage/app/public storage
# cd ..
# chmod -R 775 storage
# php artisan cache:clear
```

#### 3. Verification

```bash
# Check symlink exists
ls -la public/storage
# Should show: storage -> ../storage/app/public

# Check member photos accessible
ls public/storage/member-photos/
# Should list all photo files

# Check permissions
ls -la storage/app/public/
# Should show: drwxrwxr-x (775)

# Test file access
curl -I https://godsfamilychoir.org/storage/member-photos/GF2025155_1760641165.jpg
# Should return: HTTP/1.1 200 OK
```

#### 4. Test in Browser

1. Visit: https://godsfamilychoir.org/admin/members
2. Click on a member with a photo
3. Verify photo displays correctly
4. Try uploading a new photo
5. Check other features (albums, events, stories)

---

## Troubleshooting

### Issue: Symlink creation fails

**Error:** `ln: failed to create symbolic link 'storage': File exists`

**Solution:**
```bash
cd /home/u736264619/public_html/public
rm -rf storage  # Remove existing
ln -s ../storage/app/public storage
```

### Issue: Permission denied

**Error:** Files/folders not writable

**Solution:**
```bash
cd /home/u736264619/public_html
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### Issue: Images still return 404

**Possible causes:**
1. Symlink points to wrong location
2. Files don't exist in storage
3. Web server can't follow symlinks

**Solutions:**
```bash
# Check symlink target
cd public
readlink storage
# Should output: ../storage/app/public

# Check if files exist
ls ../storage/app/public/member-photos/

# Check .htaccess allows symlinks
grep -i FollowSymLinks .htaccess
# Should contain: Options +FollowSymLinks
```

### Issue: 503 Error on images

**Cause:** Symlink exists but not accessible

**Solution:** Use the fallback routes (already deployed):
- Files will be served through Laravel
- No symlink needed
- Automatic fallback

---

## Rollback Procedure

If something goes wrong:

```bash
# Restore from backup
cd /home/u736264619/public_html
tar -xzf backup-YYYYMMDD-HHMMSS.tar.gz

# Or revert git changes
git reset --hard HEAD~1
git pull origin main

# Clear cache
php artisan cache:clear
php artisan config:clear
```

---

## Storage Directory Structure

After deployment, you should have:

```
/home/u736264619/public_html/
├── public/
│   └── storage → ../storage/app/public (symlink)
└── storage/
    └── app/
        └── public/
            ├── albums/
            │   └── zips/
            ├── committees/
            ├── events/
            ├── member-photos/
            ├── resources/
            ├── songs/
            │   ├── audio/
            │   └── sheets/
            ├── stories/
            │   └── featured-images/
            ├── story-images/
            └── uploads/
```

---

## Post-Deployment Checklist

- [ ] Git pull successful
- [ ] Setup script executed without errors
- [ ] Symlink created: `ls -la public/storage`
- [ ] Permissions set: `775` on storage
- [ ] Cache cleared
- [ ] Member photos loading correctly
- [ ] Test file upload functionality
- [ ] Check Laravel logs: `tail -f storage/logs/laravel.log`
- [ ] Monitor error logs for 24 hours

---

## Maintenance Tasks

### Regular Backups

```bash
# Backup storage folder
tar -czf storage-backup-$(date +%Y%m%d).tar.gz storage/app/public

# Backup database
mysqldump -u username -p database_name > db-backup-$(date +%Y%m%d).sql
```

### Monitor Storage Space

```bash
# Check storage size
du -sh storage/app/public/*

# Find large files
find storage/app/public -type f -size +5M -ls
```

### Clean Old Files

```bash
# Find files older than 6 months (review before deleting)
find storage/logs -type f -mtime +180

# Clean Laravel logs (keep last 30 days)
find storage/logs -type f -name "laravel-*.log" -mtime +30 -delete
```

---

## Support

If issues persist after deployment:

1. Check logs: `storage/logs/laravel.log`
2. Review this guide: `MEMBER_IMAGES_FIX.md`
3. Check storage structure: `STORAGE_STRUCTURE.md`
4. Contact hosting support if symlink issues persist

---

## Future Deployments

For subsequent deployments, you only need:

```bash
# On production server
cd /home/u736264619/public_html
git pull origin main
php artisan config:clear
php artisan cache:clear
php artisan config:cache
```

The symlink and directories only need to be created once.

