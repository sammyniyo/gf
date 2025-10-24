<?php

namespace App\Console\Commands;

use App\Models\Member;
use App\Mail\BirthdayWishEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendBirthdayEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'birthdays:send
                          {--test : Send test email to show upcoming birthdays without sending actual emails}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send birthday emails to members whose birthday is today';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today();
        $isTest = $this->option('test');

        // Find members with today's birthday (month and day match)
        $birthdayMembers = Member::whereNotNull('birthdate')
            ->whereRaw('MONTH(birthdate) = ?', [$today->month])
            ->whereRaw('DAY(birthdate) = ?', [$today->day])
            ->get();

        if ($birthdayMembers->isEmpty()) {
            $this->info('🎂 No birthdays today!');

            // Show upcoming birthdays in the next 7 days
            $this->showUpcomingBirthdays();
            return 0;
        }

        if ($isTest) {
            $this->info('🎉 TEST MODE: Members with birthdays today:');
            $this->table(
                ['Name', 'Email', 'Birthday', 'Age', 'Member Type'],
                $birthdayMembers->map(function ($member) {
                    $birthdate = Carbon::parse($member->birthdate);
                    $age = $birthdate->age;
                    return [
                        $member->first_name . ' ' . $member->last_name,
                        $member->email,
                        $birthdate->format('F d, Y'),
                        $age,
                        ucfirst($member->member_type ?? 'N/A')
                    ];
                })->toArray()
            );
            $this->info('Use without --test flag to send actual emails.');
            return 0;
        }

        $successCount = 0;
        $failCount = 0;

        $this->info('🎂 Sending birthday emails...');
        $progressBar = $this->output->createProgressBar($birthdayMembers->count());

        foreach ($birthdayMembers as $member) {
            try {
                Mail::to($member->email)->send(new BirthdayWishEmail($member));
                $this->newLine();
                $this->info("✅ Sent to: {$member->first_name} {$member->last_name} ({$member->email})");
                $successCount++;
            } catch (\Exception $e) {
                $this->newLine();
                $this->error("❌ Failed to send to {$member->email}: " . $e->getMessage());
                $failCount++;
            }
            $progressBar->advance();
        }

        $progressBar->finish();
        $this->newLine(2);

        // Summary
        $this->info("📊 Summary:");
        $this->info("✅ Successfully sent: {$successCount}");
        if ($failCount > 0) {
            $this->error("❌ Failed: {$failCount}");
        }

        return 0;
    }

    /**
     * Show upcoming birthdays in the next 7 days
     */
    private function showUpcomingBirthdays()
    {
        $today = Carbon::today();
        $nextWeek = $today->copy()->addDays(7);

        $upcomingBirthdays = Member::whereNotNull('birthdate')
            ->get()
            ->filter(function ($member) use ($today, $nextWeek) {
                $birthdate = Carbon::parse($member->birthdate);
                $birthdayThisYear = Carbon::create($today->year, $birthdate->month, $birthdate->day);

                return $birthdayThisYear->between($today, $nextWeek);
            })
            ->sortBy(function ($member) use ($today) {
                $birthdate = Carbon::parse($member->birthdate);
                $birthdayThisYear = Carbon::create($today->year, $birthdate->month, $birthdate->day);
                return $birthdayThisYear->format('md');
            });

        if ($upcomingBirthdays->isEmpty()) {
            $this->info('📅 No birthdays in the next 7 days.');
            return;
        }

        $this->info('📅 Upcoming birthdays in the next 7 days:');
        $this->table(
            ['Name', 'Birthday', 'Days Until', 'Member Type'],
            $upcomingBirthdays->map(function ($member) use ($today) {
                $birthdate = Carbon::parse($member->birthdate);
                $birthdayThisYear = Carbon::create($today->year, $birthdate->month, $birthdate->day);
                $daysUntil = $today->diffInDays($birthdayThisYear);

                return [
                    $member->first_name . ' ' . $member->last_name,
                    $birthdayThisYear->format('F d'),
                    $daysUntil == 0 ? 'Today!' : $daysUntil . ' days',
                    ucfirst($member->member_type ?? 'N/A')
                ];
            })->toArray()
        );
    }
}

