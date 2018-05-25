<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Auth\EmailVerification;
use Auth;
use Carbon\Carbon;

class VerifyEmailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        // $user = Auth::user();
        // $data = [
        //     'code' => str_random(10),
        //     'expire_at' => Carbon::now()->addDay(1),
        // ];
        // $user->update([
        //     'verified_at'=>NULL,
        //     'verification_sent'=>true,
        //     'email_verification_code'=>$data['code']
        // ]);

        // $verification = new EmailVerification;
        // $verification->user_id = $user->id;
        // $verification->code = $data['code'];
        // $verification->expire_at = $data['expire_at'];
        // $verification->verified_at = NULL;
        // $verification->save();

        // $mail = $this->user->emailVerification;

        // if (is_object($mail)) {
        //     $mail->update($data);
        // }
        // else {
        //     $mail = new EmailVerification($data);
        //     $this->user->createMail($mail);
        // }
        // try {
        //     $redirect = $this->redirect ? urlencode($this->redirect) : null;
        // } catch (\Exception $e) {
            
        //     logger($e);
        // }

       return (new MailMessage)
                    // ->from(env('MAIL_USERNAME').env('APP_NAME') . ' Team')
                    ->from('noreply@KofoundME.com', config('app.name'))
                    ->subject('Email Verification')
                    ->markdown('auth.verify-email'
                        // , [
                        // 'greeting' => 'Dear ' . $user->first_name . ','.' Thanks for Registering on our Platform'.',',
                        // 'level' => 'success',
                        // 'actionText' => 'Click Here To Verify Your Account',
                        // 'actionUrl' => route('verification.email', [
                        //     'code' => $data['code'],
                        //     'id' => $user->id,
                        //     ]),
                        // ]
                    );
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
