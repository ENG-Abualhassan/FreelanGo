<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ForgetPasswordNotification extends Notification
{
    use Queueable;
    protected $guard , $token ;
    /**
     * Create a new notification instance.
     */
    public function __construct(string $guard , string $token )
    {
        $guard = $this->guard;
        $token = $this->token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('السلام عليكم و رحمة الله و بركاته')
            ->line('اضغط على زر التالي لتتمكن من الانتقال الى صفحة تعديل كلمة المرور')
            ->action('تعيين كلمة مرور', url("/{$this->guard}/resetpassword/{$this->token}?email=".urldecode($notifiable->email)))
            ->line('نتمنى لك يوما جميلا')
            ->line('تحياتنا لك');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
