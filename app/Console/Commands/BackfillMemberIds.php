<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Member;
use App\Services\MemberIdService;

class BackfillMemberIds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'members:backfill-ids';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backfill member_id for existing members';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🔍 Checking all members...');

        // Get all members
        $allMembers = Member::all();
        $this->info("📊 Total members: {$allMembers->count()}");

        // Find members without proper GF format
        $membersToUpdate = Member::where(function($query) {
                $query->whereNull('member_id')
                    ->orWhere('member_id', '')
                    ->orWhere('member_id', 'NOT LIKE', 'GF%');
            })
            ->get();

        if ($membersToUpdate->isEmpty()) {
            $this->info('✅ All members already have proper member IDs!');
            return Command::SUCCESS;
        }

        $this->info("📝 Found {$membersToUpdate->count()} members needing ID update");
        $this->newLine();

        // Show current IDs
        $this->info('Current IDs:');
        foreach ($membersToUpdate as $member) {
            $this->line("  - ID: {$member->id} | Member ID: '{$member->member_id}' | {$member->full_name}");
        }
        $this->newLine();

        if (!$this->confirm('Update these member IDs?', true)) {
            $this->warn('❌ Operation cancelled');
            return Command::SUCCESS;
        }

        $bar = $this->output->createProgressBar($membersToUpdate->count());
        $bar->start();

        foreach ($membersToUpdate as $member) {
            $oldId = $member->member_id;
            $member->member_id = MemberIdService::generateUnique();
            $member->save();

            $this->line(" - Updated {$member->full_name}: '{$oldId}' → '{$member->member_id}'");
            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);
        $this->info("✅ Successfully updated {$membersToUpdate->count()} members!");

        return Command::SUCCESS;
    }
}
