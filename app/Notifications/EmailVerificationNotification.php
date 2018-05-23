<?php

namespace App\Notifications;

use App\Models\Auth\EmailVerification;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class EmailVerificationNotification extends Notification
{
    use Queueable;

    protected $user;
    protected $redirect;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $redirect = null)
    {
        $this->user = $user;
        $this->redirect = $redirect;
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
     *otifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $data = [
            'code' => str_random(10),
            'expire_at' => Carbon::now()->addHour(1),
        ];

        $mail = $this->user->emailVerification;

        if (is_object($mail)) {
            $mail->update($data);
        }
        else {
            $mail = new EmailVerificationN($data);
            $this->user->createMail($mail);
        }
        try {
            $redirect = $this->redirect ? urlencode($this->redirect) : null;
        } catch (\Exception $e) {
            
            logger($e);
        }

        return (new MailMessage)
                    // ->from(env('MAIL_USERNAME').env('APP_NAME') . ' Team')
                    ->from('noreply@KofoundME.com', config('app.name'))
                    ->subject('Email Verification')
                    ->markdown('vendor.notifications.email', [
                        'greeting' => 'Dear ' . $this->user->first_name . ',',
                        'level' => 'success',
                        'actionText' => 'Click Here To Verify Your Account',
                        'actionUrl' => route('verify.email', [
                            'code' => $mail->code,
                            'id' => $this->user->id,
                            ]),
                        ]);
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
