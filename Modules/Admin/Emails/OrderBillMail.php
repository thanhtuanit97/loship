<?php

namespace Modules\Admin\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Order;

class OrderBillMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $orderdetail=[];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order,$orderdetail)
    {
        $this->order=$order;
        $this->orderdetail=$orderdetail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin::mail.orderBillMail');
    }
}