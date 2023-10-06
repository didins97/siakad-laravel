<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JamMengajarNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    protected $nama_guru;
    protected $jam_mulai;
    protected $kelas;
    protected $mapel;
    protected $jk;

    public function __construct($nama_guru, $jam_mulai, $kelas, $mapel, $jk)
    {
        $this->nama_guru = $nama_guru;
        $this->jam_mulai = $jam_mulai;
        $this->kelas = $kelas;
        $this->mapel = $mapel;
        $this->jk = $jk;
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
                ->subject('Pemberitahuan Jam Mengajar Guru')
                ->line('Halo ' . $this->jk === "L" ? 'Bapak' : 'Ibu' . $this->nama_guru . ',')
                ->line('Kami ingin memberitahukan jadwal jam masuk kelas Anda untuk hari ini.')
                ->line('Mohon perhatikan informasi di bawah ini:')
                ->line('Kelas: ' . $this->kelas)
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
            'message' => 'Anda mempunyai jadwal di kelas '.$this->kelas,
            'data' => [
                'kelas' => $this->kelas,
                'jam_mulai' => $this->jam_mulai,
                'mapel' => $this->mapel->nama_mapel,
                'jenis_kelamin' => $this->jk,
            ]
        ];
    }
}
