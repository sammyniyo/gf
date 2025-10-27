<?php

namespace App\Services;

use App\Models\Album;
use App\Models\Song;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class ZipService
{
    /**
     * Create a ZIP file for an album containing all its songs
     */
    public function createAlbumZip(Album $album): string
    {
        // Get all songs for this album
        $songs = Song::where('album', $album->title)
            ->where('is_published', true)
            ->whereNotNull('audio_file')
            ->orderBy('id')
            ->get();

        if ($songs->isEmpty()) {
            throw new \Exception('No songs found for this album');
        }

        // Create a temporary ZIP file
        $zipFileName = 'album_' . $album->id . '_' . time() . '.zip';
        $zipPath = storage_path('app/temp/' . $zipFileName);

        // Ensure temp directory exists
        if (!file_exists(storage_path('app/temp'))) {
            mkdir(storage_path('app/temp'), 0755, true);
        }

        $zip = new ZipArchive();

        if ($zip->open($zipPath, ZipArchive::CREATE) !== TRUE) {
            throw new \Exception('Cannot create ZIP file');
        }

        // Add album cover image if exists
        if ($album->cover_image && Storage::exists($album->cover_image)) {
            $coverPath = Storage::path($album->cover_image);
            $zip->addFile($coverPath, 'cover.jpg');
        }

        // Add album info file
        $albumInfo = $this->createAlbumInfoFile($album, $songs);
        $zip->addFromString('album_info.txt', $albumInfo);

        // Add each song to the ZIP
        foreach ($songs as $song) {
            if ($song->audio_file && Storage::exists($song->audio_file)) {
                $audioPath = Storage::path($song->audio_file);
                $fileName = $this->sanitizeFileName($song->title) . '.mp3';
                $zip->addFile($audioPath, $fileName);
            }

            // Add sheet music if available
            if ($song->sheet_music && Storage::exists($song->sheet_music)) {
                $sheetPath = Storage::path($song->sheet_music);
                $sheetFileName = $this->sanitizeFileName($song->title) . '_sheet.pdf';
                $zip->addFile($sheetPath, $sheetFileName);
            }
        }

        $zip->close();

        // Move the ZIP file to a permanent location
        $permanentPath = 'albums/' . $zipFileName;
        Storage::put($permanentPath, file_get_contents($zipPath));

        // Clean up temporary file
        unlink($zipPath);

        return $permanentPath;
    }

    /**
     * Create album information text file
     */
    private function createAlbumInfoFile(Album $album, $songs): string
    {
        $info = "ALBUM INFORMATION\n";
        $info .= "==================\n\n";
        $info .= "Title: " . $album->title . "\n";
        $info .= "Description: " . ($album->description ?? 'No description available') . "\n";
        $info .= "Release Date: " . ($album->release_date ? $album->release_date->format('F d, Y') : 'Not specified') . "\n";
        $info .= "Track Count: " . $songs->count() . "\n";
        $info .= "Price: $" . number_format($album->price, 2) . "\n\n";

        $info .= "TRACK LISTING\n";
        $info .= "=============\n\n";

        foreach ($songs as $index => $song) {
            $info .= ($index + 1) . ". " . $song->title . "\n";
            if ($song->composer) {
                $info .= "   Composer: " . $song->composer . "\n";
            }
            if ($song->arranger) {
                $info .= "   Arranger: " . $song->arranger . "\n";
            }
            if ($song->duration_seconds) {
                $minutes = floor($song->duration_seconds / 60);
                $seconds = $song->duration_seconds % 60;
                $info .= "   Duration: " . sprintf('%d:%02d', $minutes, $seconds) . "\n";
            }
            if ($song->genre) {
                $info .= "   Genre: " . $song->genre . "\n";
            }
            $info .= "\n";
        }

        $info .= "DOWNLOAD INFORMATION\n";
        $info .= "===================\n";
        $info .= "Downloaded from: God's Family Choir\n";
        $info .= "Download Date: " . now()->format('F d, Y h:i A') . "\n";
        $info .= "Website: " . config('app.url') . "\n\n";

        $info .= "Thank you for supporting God's Family Choir!\n";
        $info .= "May this music bless your heart and bring you closer to God.\n";

        return $info;
    }

    /**
     * Sanitize filename for safe storage
     */
    private function sanitizeFileName(string $filename): string
    {
        // Remove or replace invalid characters
        $filename = preg_replace('/[^a-zA-Z0-9\s\-_\.]/', '', $filename);
        // Replace spaces with underscores
        $filename = str_replace(' ', '_', $filename);
        // Limit length
        return substr($filename, 0, 50);
    }

    /**
     * Check if album ZIP already exists
     */
    public function albumZipExists(Album $album): ?string
    {
        $pattern = 'albums/album_' . $album->id . '_*.zip';
        $files = Storage::files('albums');

        foreach ($files as $file) {
            if (strpos($file, 'album_' . $album->id . '_') === 0) {
                return $file;
            }
        }

        return null;
    }

    /**
     * Get or create album ZIP file
     */
    public function getOrCreateAlbumZip(Album $album): string
    {
        // Check if ZIP already exists
        $existingZip = $this->albumZipExists($album);
        if ($existingZip) {
            return $existingZip;
        }

        // Create new ZIP
        return $this->createAlbumZip($album);
    }
}


