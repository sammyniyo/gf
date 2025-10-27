<?php

namespace App\Console\Commands;

use App\Models\Album;
use App\Services\ZipService;
use Illuminate\Console\Command;

class GenerateAlbumZips extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'albums:generate-zips {--album= : Specific album ID to process}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate ZIP files for albums containing all their songs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $zipService = new ZipService();

        if ($albumId = $this->option('album')) {
            $album = Album::find($albumId);
            if (!$album) {
                $this->error("Album with ID {$albumId} not found.");
                return 1;
            }

            $this->processAlbum($album, $zipService);
        } else {
            $albums = Album::active()->get();

            if ($albums->isEmpty()) {
                $this->info('No active albums found.');
                return 0;
            }

            $this->info("Processing {$albums->count()} albums...");

            $progressBar = $this->output->createProgressBar($albums->count());
            $progressBar->start();

            foreach ($albums as $album) {
                $this->processAlbum($album, $zipService);
                $progressBar->advance();
            }

            $progressBar->finish();
            $this->newLine();
        }

        $this->info('Album ZIP generation completed!');
        return 0;
    }

    private function processAlbum(Album $album, ZipService $zipService)
    {
        try {
            // Check if ZIP already exists
            if ($zipService->albumZipExists($album)) {
                $this->line("ZIP already exists for album: {$album->title}");
                return;
            }

            // Create ZIP
            $zipPath = $zipService->createAlbumZip($album);
            $this->line("Created ZIP for album: {$album->title} -> {$zipPath}");

        } catch (\Exception $e) {
            $this->error("Failed to create ZIP for album {$album->title}: " . $e->getMessage());
        }
    }
}


