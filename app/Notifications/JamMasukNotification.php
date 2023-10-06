<?php

namespace App\Notifications;

use App\Mapel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JamMasukNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $siswa;
    protected $jam_mulai;
    protected $mapel;

    public function __construct($siswa, $jam_mulai, Mapel $mapel)
    {
        $this->siswa = $siswa;
        $this->mapel = $mapel;
        $this->jam_mulai = $jam_mulai;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                ->subject('Pemberitahuan Jam Masuk Kelas')
                ->line('Halo ' . $this->siswa . ',')
                ->line('Kami ingin memberitahukan jadwal jam masuk kelas Anda untuk hari ini.')
                ->line('Mohon perhatikan informasi di bawah ini:')
                ->line('Mapel: ' . $this->mapel->nama_mapel)
                ->line('Jam Masuk: ' . $this->jam_mulai)
                ->line('Pastikan Anda hadir tepat waktu untuk mengikuti kelas.')
                ->line('Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan lebih lanjut.')
                ->line('Terima kasih,')
                ->line('Tim Manajemen Kelas');
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
            'message' => 'Jam Masuk '.$this->jam_mulai.' Mapel '. $this->mapel->nama_mapel,
            'data' => [
                'siswa' => $this->siswa,
                'mapel' => $this->mapel->nama_mapel,
                'jam_mulai' => $this->jam_mulai,   
            ]
        ];
    }
}
