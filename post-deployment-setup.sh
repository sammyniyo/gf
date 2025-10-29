#!/bin/bash
#############################################################################
# God's Family Choir - Post Deployment Setup Script
# Run this script on production server after git pull
#############################################################################

set -e  # Exit on error

echo "=========================================="
echo "God's Family Choir - Post Deployment Setup"
echo "=========================================="
echo ""

# Detect the script's directory
SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
cd "$SCRIPT_DIR"

echo "✓ Working directory: $(pwd)"
echo ""

#############################################################################
# 1. Create all required storage directories
#############################################################################
echo "Step 1: Creating storage directories..."

mkdir -p storage/app/public/albums/zips
mkdir -p storage/app/public/committees
mkdir -p storage/app/public/events
mkdir -p storage/app/public/member-photos
mkdir -p storage/app/public/members
mkdir -p storage/app/public/resources
mkdir -p storage/app/public/songs/audio
mkdir -p storage/app/public/songs/sheets
mkdir -p storage/app/public/stories/featured-images
mkdir -p storage/app/public/story-images
mkdir -p storage/app/public/uploads

echo "✓ All storage directories created"
echo ""

#############################################################################
# 2. Set correct permissions
#############################################################################
echo "Step 2: Setting permissions..."

chmod -R 775 storage
chmod -R 775 bootstrap/cache

# Get current user
CURRENT_USER=$(whoami)
echo "  Current user: $CURRENT_USER"

# Try to set ownership (might fail on some hosting)
chown -R $CURRENT_USER:$CURRENT_USER storage 2>/dev/null || echo "  ⚠ Could not change ownership (this is OK on some hosting)"

echo "✓ Permissions set"
echo ""

#############################################################################
# 3. Create storage symlink
#############################################################################
echo "Step 3: Creating storage symlink..."

cd public

# Remove existing storage link/directory if present
if [ -L "storage" ]; then
    echo "  Removing existing symlink..."
    rm storage
elif [ -d "storage" ]; then
    echo "  ⚠ Warning: 'storage' is a directory. Please backup and remove manually."
    echo "  Skipping symlink creation."
    cd ..
    exit 0
elif [ -f "storage" ]; then
    echo "  Removing existing file..."
    rm storage
fi

# Create the symbolic link
echo "  Creating symbolic link..."
ln -s ../storage/app/public storage

# Verify the link was created
if [ -L "storage" ]; then
    echo "✓ Symlink created successfully!"
    echo "  From: $(pwd)/storage"
    echo "  To: $(readlink storage)"
else
    echo "✗ Failed to create symlink"
    cd ..
    exit 1
fi

cd ..
echo ""

#############################################################################
# 4. Verify setup
#############################################################################
echo "Step 4: Verifying setup..."

# Check if member-photos directory exists and is accessible
if [ -d "public/storage/member-photos" ]; then
    FILE_COUNT=$(find public/storage/member-photos -type f 2>/dev/null | wc -l)
    echo "✓ member-photos accessible (Files: $FILE_COUNT)"
else
    echo "⚠ Warning: member-photos not accessible via symlink"
fi

# Check if albums directory exists and is accessible
if [ -d "public/storage/albums" ]; then
    echo "✓ albums accessible"
else
    echo "⚠ Warning: albums not accessible via symlink"
fi

# Check if events directory exists and is accessible
if [ -d "public/storage/events" ]; then
    echo "✓ events accessible"
else
    echo "⚠ Warning: events not accessible via symlink"
fi

echo ""

#############################################################################
# 5. Clear Laravel cache
#############################################################################
echo "Step 5: Clearing Laravel cache..."

php artisan config:clear || echo "⚠ Could not clear config cache"
php artisan cache:clear || echo "⚠ Could not clear application cache"
php artisan view:clear || echo "⚠ Could not clear view cache"
php artisan route:clear || echo "⚠ Could not clear route cache"

echo "✓ Cache cleared"
echo ""

#############################################################################
# 6. Optimize for production
#############################################################################
echo "Step 6: Optimizing for production..."

php artisan config:cache || echo "⚠ Could not cache config"
php artisan route:cache || echo "⚠ Could not cache routes"
php artisan view:cache || echo "⚠ Could not cache views"

echo "✓ Optimization complete"
echo ""

#############################################################################
# Summary
#############################################################################
echo "=========================================="
echo "✓ Setup Complete!"
echo "=========================================="
echo ""
echo "Next steps:"
echo "1. Visit your website to verify images are loading"
echo "2. Check: https://godsfamilychoir.org/storage/member-photos/"
echo "3. Test member profile pages"
echo ""
echo "If images still don't load:"
echo "1. Check file permissions: ls -la storage/app/public/member-photos/"
echo "2. Check symlink: ls -la public/storage"
echo "3. Review logs: tail -f storage/logs/laravel.log"
echo ""
echo "Done!"

