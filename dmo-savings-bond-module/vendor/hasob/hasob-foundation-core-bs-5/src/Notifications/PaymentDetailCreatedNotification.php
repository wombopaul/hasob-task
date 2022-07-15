<?php


namespace Hasob\FoundationCore\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use Hasob\FoundationCore\Models\PaymentDetail;

class PaymentDetailCreatedNotification extends Notification
{

    use Queueable;


    public $paymentDetail;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(PaymentDetail $paymentDetail)
    {
        $this->paymentDetail = $paymentDetail;
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
        return (new MailMessage)->subject('PaymentDetail created successfully')
                                ->markdown(
                                    'mail.paymentDetails.created',
                                    ['paymentDetail' => $this->paymentDetail]
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
        return [];
    }

}
