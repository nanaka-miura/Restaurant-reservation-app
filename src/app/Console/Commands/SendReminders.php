<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Bus;
use App\Jobs\SendReminderEmail;
use App\Models\User;
use Carbon\Carbon;

class SendReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder emails to all users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::whereHas('reservations', function ($query) {
            $query->whereDate('date', now()->toDateString());
        })->get();

    $jobs = $users->map(function ($user) {
        return new SendReminderEmail($user);
    });

    $batch = Bus::batch($jobs->toArray())
            ->then(function ($batch) {
                // バッチ完了後の処理
            })
            ->catch(function ($batch, $e) {
                // エラーが発生した場合の処理
            })
            ->finally(function ($batch) {
                // 最終的に実行する処理
            })
            ->dispatch();

    $this->info('Reminder emails for reservations have been dispatched!');
    }
}
