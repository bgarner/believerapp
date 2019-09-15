<?php

namespace App\Mail;

use App\Models\Redemption;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RedemptionMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Order
     */
    public $redemption;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($redemption)
    {
        $this->redemption = $redemption;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Reward Redemption!')
                    ->from('no-reply@gamegraft.com')
                    ->view('email.redemption')
                    ->with([
                        "name" => $this->redemption['name'],
                        "email" => $this->redemption['email'],
                        "address" => $this->redemption['address'],
                        "address2" => $this->redemption['address2'],
                        "city" => $this->redemption['city'],
                        "province" => $this->redemption['province'],
                        "postal_code" => $this->redemption['postal_code'],
                        "phone1" => $this->redemption['phone1'],
                        "phone2" => $this->redemption['phone2'],
                        "reward_name" => $this->redemption['reward_name'],
                        "reward_desc" => $this->redemption['reward_desc']
                    ]);
    }
}
