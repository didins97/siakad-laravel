<?php

namespace App\Jobs;

use App\Guru;
use App\Jadwal;
use App\Kelas;
use App\Notifications\JamMasukNotification;
use App\Notifications\JamMengajarNotification;
use App\Siswa;
use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PengecekanJadwalMasuk implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $jadwal_kelas = Jadwal::all();

        $currentDateTime = Carbon::now();
        $notificationTimeIn15Minutes = $currentDateTime->copy()->addMinutes(15);

        foreach ($jadwal_kelas as $jadwal) {
            $jamMulai = Carbon::parse($jadwal->jam_mulai);

            // dd($jadwal->hari_id == $currentDateTime->format('N'));

            // if ($jadwal->hari_id == $currentDateTime->format('N') && ($jamMulai->format('H:i') == $currentDateTime->format('H:i') || $jamMulai->format('H:i') == $notificationTimeIn15Minutes->format('H:i'))) {
                $siswa = Siswa::where('kelas_id', $jadwal->kelas_id)->get();

                foreach ($siswa as $s) {
                    $user = User::where('no_induk', $s->no_induk)->first();
                    if ($user) {
                        $user->notify(new JamMasukNotification($s->nama_siswa, $jamMulai->format('H:i'), $jadwal->mapel));
                    }
                }

                $guru = Guru::where('id', $jadwal->guru_id)->first();
                if ($guru) {
                    $user = User::where('id_card', $guru->id_card)->first();
                    if ($user) {
                        $user->notify(new JamMengajarNotification($guru->nama_guru, $jamMulai->format('H:i'), $jadwal->kelas->nama_kelas, $jadwal->mapel, $guru->jk));
                    }
                }
            // }
        }
    }
}