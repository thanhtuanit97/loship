<?php

namespace Modules\Admin\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Order;

class HuyDonHang extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $orderDetails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order , $orderDetails)
    {
        $this->order = $order;
        $this->orderDetails = $orderDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin::mail.huydon');
    }
}
