<?php

namespace App\Console\Commands;

use App\Mail\SendReminderEmail;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending an email to the customers to remind them to finalize the shopping cart';




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
        $carts = Cart::query()->whereRaw('DATE(updated_at) = DATE_SUB(CURDATE(), INTERVAL 7 DAY)')->get();
        foreach ($carts as $cart) {
            $user = $cart->user;
            Mail::send(new SendReminderEmail($user));
        }
    }
}
