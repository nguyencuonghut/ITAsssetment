<?php

namespace App\Notifications;

use App\Models\AssetAudit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AuditRequest extends Notification
{
    use Queueable;
    protected $asset_audit_id;
    protected $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($asset_audit_id, $token)
    {
        $this->asset_audit_id = $asset_audit_id;
        $this->token = $token;
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
        $url = url ('audits/confirmation/' . $this->asset_audit_id . '/' . $this->token);
        $asset_audit = AssetAudit::findOrFail($this->asset_audit_id);
        return (new MailMessage)
                    ->subject('Kiểm tài sản: ' . $asset_audit->asset->tag . '(' . $asset_audit->asset->model->category->name . ' ' . $asset_audit->asset->model->manufacturer->name . ' ' . $asset_audit->asset->model->name . ')')
                    ->line('Bạn nhận được yêu cầu từ bộ phận IT kiểm kê cho tài sản: ' . $asset_audit->asset->tag . '(' . $asset_audit->asset->model->category->name . ' ' . $asset_audit->asset->model->manufacturer->name . ' ' . $asset_audit->asset->model->name . ')' . '.')
                    ->action('Mở link tài sản', $url)
                    ->line('Xin cảm ơn!');
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
