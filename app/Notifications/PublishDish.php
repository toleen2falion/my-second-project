<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PublishDish extends Notification
{
    use Queueable;

    private $dish_id;
    private $chef_name;
    private $dish_name;

    /**
     * Create a new notification instance.
     */
    public function __construct($dish_id,$chef_name,$dish_name)
    {
        //
        $this->dish_id = $dish_id;
        $this->chef_name = $chef_name;
        $this->dish_name = $dish_name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }


    public function toArray(object $notifiable): array
    {
        return [
            'dish_id'=> $this->dish_id,
            'chef_name'=>$this->chef_name,
            'dish_name'=>$this->dish_name
        ];
    }
}
