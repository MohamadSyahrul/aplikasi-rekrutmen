<?php

use App\Kuis;
use App\User;
use App\Loker;
use App\Soal;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        User::create([
            'email' => 'admin@gmail.com',
            'level' => 'admin',
            'username' => 'administrator',
            'password' => bcrypt('admin123'),
        ]);

        Loker::create([
            'nama' => 'PT Mencari cinta sejati',
            'detail' => 'Full Stack Developer',
            'tingkat_pendidikan' => 'D3 atau S1 sederajat',
            'jenis_kelamin' => 'Laki laki',
            'umur' => 24,
            'status_kerja' => 'On Site Pegawai Tetap',
            'gaji' => 500,
            'batas_lamaran' => `2021-08-23`,
            'deskripsi' => `<div itemprop="description" style="color: rgb(102, 102, 102); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px; letter-spacing: 0.1px;"><p style="margin-bottom: 1em;">Salah satu klien kami yang bergerak di bidang logistik membutuhkan Full STack Web Developer yang mempunyai pengalaman dalam project team minimal 1 tahun</p></div><h5 style="font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-weight: bold; line-height: 1.1; color: rgb(102, 102, 102); margin-top: 12px; margin-bottom: 12px; font-size: 16px; letter-spacing: 0.1px;">Tanggung Jawab Pekerjaan :</h5><div itemprop="responsibilities" style="color: rgb(102, 102, 102); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px; letter-spacing: 0.1px;"><p style="margin-bottom: 1em;">i. Memahami kebutuhan klien untuk di dalam suatu project;<br>ii. Menganalisa sistem klien yang sudah berjalan;<br>iii. Membuat proposal sistem ke klien;<br>iv. Melakukan Uji Coba, Implementasi, dan memberikan training dalam suatu proyek;<br>v. Menjaga dan membina kerjasama tim</p></div><h5 style="font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-weight: bold; line-height: 1.1; color: rgb(102, 102, 102); margin-top: 12px; margin-bottom: 12px; font-size: 16px; letter-spacing: 0.1px;">Syarat Pengalaman :</h5><div itemprop="experienceRequirements" style="color: rgb(102, 102, 102); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px; letter-spacing: 0.1px;">– Pernah ikut dalam Project dengan team minimal selama satu tahun.</div><h5 style="font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-weight: bold; line-height: 1.1; color: rgb(102, 102, 102); margin-top: 12px; margin-bottom: 12px; font-size: 16px; letter-spacing: 0.1px;">Keahlian :</h5><div itemprop="skills" style="color: rgb(102, 102, 102); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px; letter-spacing: 0.1px;"><p style="margin-bottom: 1em;">Paham dan Mahir :<br>1. Bahasa Pemrograman<br>– PHP (Laravel dan CI).<br>– Jquery.<br>– Web Service.<br>– .Net (Tidak diutamakan, tetapi jika bisa maka akan lebih diprioritaskan).<br>2. Database<br>– MySQL.<br>– SQL Server.</p></div><h5 style="font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-weight: bold; line-height: 1.1; color: rgb(102, 102, 102); margin-top: 12px; margin-bottom: 12px; font-size: 16px; letter-spacing: 0.1px;">Kualifikasi :</h5><div itemprop="qualifications" style="color: rgb(102, 102, 102); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px; letter-spacing: 0.1px;"><p style="margin-bottom: 1em;">Pria/wanita, usia 25 sd 35 tahun, Disiplin Jujur dan Teliti</p></div><h5 style="font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-weight: bold; line-height: 1.1; color: rgb(102, 102, 102); margin-top: 12px; margin-bottom: 12px; font-size: 16px; letter-spacing: 0.1px;">Tunjangan :</h5><div itemprop="jobBenefits" style="color: rgb(102, 102, 102); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px; letter-spacing: 0.1px;"><p style="margin-bottom: 1em;">– BPJS Kesehatan<br>– BPJS TK</p></div><h5 style="font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-weight: bold; line-height: 1.1; color: rgb(102, 102, 102); margin-top: 12px; margin-bottom: 12px; font-size: 16px; letter-spacing: 0.1px;">Insentif :</h5><div itemprop="incentiveCompensation" style="color: rgb(102, 102, 102); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px; letter-spacing: 0.1px;"><p style="margin-bottom: 1em;">Lembur</p></div><h5 style="font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-weight: bold; line-height: 1.1; color: rgb(102, 102, 102); margin-top: 12px; margin-bottom: 12px; font-size: 16px; letter-spacing: 0.1px;">Waktu Bekerja :</h5><div itemprop="workHours" style="color: rgb(102, 102, 102); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px; letter-spacing: 0.1px;">Jam 08:00 sd 17:00 wib Senin sd Jumat</div><h5 style="font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-weight: bold; line-height: 1.1; color: rgb(102, 102, 102); margin-top: 12px; margin-bottom: 12px; font-size: 16px; letter-spacing: 0.1px;">Jenis Pekerjaan :</h5><span style="color: rgb(102, 102, 102); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px; letter-spacing: 0.1px;">Remote (Work From Home)</span>`,
            'persyaratan' => 'CV, Ijazah terakhir dan Portfolio',
        ]);

        Kuis::create([
            'nama' => 'Kuis 1',
            'tgl_kuis' => NULL,
            'waktu_mulai' => NULL,
            'waktu_selesai' => NULL,
            'durasi' => NULL,
        ]);

        Soal::create([
            'nama_soal' => 'Soal Aritmatika',
            'bobot_soal' => 'Mudah',
            'soal' => '1 + 1 =',
            'kunci_jawaban' => '2',
            'kuis_id' => '1',
        ]);

        Soal::create([
            'nama_soal' => 'Soal Logika',
            'bobot_soal' => 'Mudah',
            'soal' => 'Sebelum memasak mie instan apa hal pertama yang',
            'kunci_jawaban' => 'Mie Instan',
            'kuis_id' => '1',
        ]);
    }
}
