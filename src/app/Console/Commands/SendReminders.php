<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationReminderMail;
use Illuminate\Support\Facades\Log;

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
        $reservations = Reservation::whereDate('date', Carbon::today()->toDateString())->get();

        foreach ($reservations as $reservation) {
            $user = $reservation->user;

            try {
                Mail::to($user->email)->send(new ReservationReminderMail($reservation));

                Log::info("Reminder sent to {$user->email} for reservation on {$reservation->date} at {$reservation->time}");
                $this->info("Reminder sent to {$user->email} for reservation on {$reservation->date} at {$reservation->time}");
            } catch (\Exception $e) {
                Log::error("Failed to send reminder to {$user->email}: {$e->getMessage()}");
                $this->error("Failed to send reminder to {$user->email}: {$e->getMessage()}");
            }
        }

        return Command::SUCCESS;
        }
    }

