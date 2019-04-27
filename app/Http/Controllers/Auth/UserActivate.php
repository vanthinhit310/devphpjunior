<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 4/26/2019
 * Time: 10:02 PM
 */

namespace App\Http\Controllers\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class UserActivate extends Notification
{
    use Queueable;
    /**
     * UserActivate constructor.
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('admin@admin.com')
            ->subject('Activate Account!')
            ->greeting(sprintf('Hi, %s', $this->user->name))
            ->line('We just noticed that you created a new account. You will need to activate your account to sign in into this account.')
            ->action('Activate', route('process.activate', [$this->user->token]))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
