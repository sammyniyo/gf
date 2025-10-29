#!/bin/bash
# Create storage symlink for God's Family Choir
# Run this on your production server

cd /home/u736264619/public_html

# Remove existing storage link/directory if present (backup first if it's a directory)
if [ -L "storage" ]; then
    echo "Removing existing symlink..."
    rm storage
elif [ -d "storage" ]; then
    echo "Warning: 'storage' is a directory. Please backup and remove manually."
    exit 1
elif [ -f "storage" ]; then
    echo "Removing existing file..."
    rm storage
fi

# Create the symbolic link
echo "Creating symbolic link..."
ln -s ../storage/app/public storage

# Verify the link was created
if [ -L "storage" ]; then
    echo "✓ Symlink created successfully!"
    echo "  From: $(pwd)/storage"
    echo "  To: $(readlink storage)"
else
    echo "✗ Failed to create symlink"
    exit 1
fi

# Check if member-photos directory exists
if [ -d "../storage/app/public/member-photos" ]; then
    echo "✓ member-photos directory exists"
    echo "  Files: $(ls -1 ../storage/app/public/member-photos | wc -l)"
else
    echo "⚠ Warning: member-photos directory not found"
fi

echo ""
echo "Done! Member images should now be accessible."

