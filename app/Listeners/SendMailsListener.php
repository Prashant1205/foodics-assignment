<?php

namespace App\Listeners;

use App\Events\SendMails;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mailgun\Mailgun;

class SendMailsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendMails  $event
     * @return void
     */
    public function handle(SendMails $event)
    {
        $mgClient = Mailgun::create('b359ac571161e1bc52a12a85329ad36c-b0ed5083-34fdb29b');
        $domain = "sandbox9c07ddfaf9614907bb6dbe16e08c96bb.mailgun.org";
        $params = array(
            'from'    => 'Inventory Manager<divyesh.seo.123@gmail.com>',
            'to'      => 'divyesh.seo.123@gmail.com',
            'subject' => 'Shortage',
            'text'    => 'Ingredient Inventory is less then 50% for: '.$event->ingredient->ingredient_name.'. Kindly reload inventory asap to avoid out of stock'
        );
        $mgClient->messages()->send($domain, $params);
    }
}
