# Album ZIP Download System

## Overview

The album download system has been enhanced to provide complete album ZIP files containing all songs, artwork, and metadata instead of individual file downloads.

## Features

### ZIP File Contents

-   **All Audio Tracks**: High-quality MP3 files of all songs in the album
-   **Album Artwork**: Cover image in high resolution (cover.jpg)
-   **Album Information**: Text file with track listing, composer info, and album details
-   **Sheet Music**: PDF files for tracks that have sheet music available

### Automatic ZIP Generation

-   ZIP files are created automatically when a user downloads an album
-   ZIP files are cached to avoid regenerating the same content
-   Fallback to original download method if ZIP creation fails

## Technical Implementation

### ZipService Class

Located at `app/Services/ZipService.php`, this service handles:

-   Creating ZIP files from album songs
-   Adding album artwork and metadata
-   Sanitizing filenames for safe storage
-   Caching ZIP files to avoid regeneration

### Key Methods

-   `createAlbumZip(Album $album)`: Creates a new ZIP file for an album
-   `albumZipExists(Album $album)`: Checks if ZIP already exists
-   `getOrCreateAlbumZip(Album $album)`: Gets existing or creates new ZIP

### Database Relationships

-   Albums and Songs are related via the `album` field (string matching)
-   `Album::songs()`: Gets all songs for an album
-   `Song::album()`: Gets the album a song belongs to

## Usage

### For Users

1. Purchase an album through the shop
2. Complete payment
3. Visit the download page
4. Click "Download Album ZIP" to get the complete package

### For Administrators

Generate ZIP files for existing albums using the Artisan command:

```bash
# Generate ZIPs for all active albums
php artisan albums:generate-zips

# Generate ZIP for a specific album
php artisan albums:generate-zips --album=1
```

## File Structure

### ZIP File Contents

```
Album_Name_Album.zip
├── cover.jpg                    # Album artwork
├── album_info.txt              # Album information and track listing
├── Song_Title_1.mp3            # Audio track 1
├── Song_Title_1_sheet.pdf      # Sheet music for track 1 (if available)
├── Song_Title_2.mp3            # Audio track 2
├── Song_Title_2_sheet.pdf      # Sheet music for track 2 (if available)
└── ...                         # Additional tracks
```

### Storage Locations

-   **Temporary ZIPs**: `storage/app/temp/` (cleaned up after creation)
-   **Permanent ZIPs**: `storage/app/albums/`
-   **Audio Files**: As defined in song `audio_file` field
-   **Sheet Music**: As defined in song `sheet_music` field

## Error Handling

The system includes robust error handling:

-   Falls back to original download method if ZIP creation fails
-   Logs errors for debugging
-   Provides user-friendly error messages
-   Validates file existence before adding to ZIP

## Performance Considerations

-   ZIP files are cached to avoid regeneration
-   Temporary files are cleaned up immediately
-   Large albums may take time to process on first download
-   Consider running the Artisan command to pre-generate ZIPs

## Security

-   Filenames are sanitized to prevent directory traversal
-   File existence is validated before adding to ZIP
-   Download limits are still enforced per purchase
-   User authentication and payment verification required


