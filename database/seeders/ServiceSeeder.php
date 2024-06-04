<?php

namespace Database\Seeders;


use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $service = Service::updateOrCreate(['service_text' => 'Pelaksanaan Uji Kompetensi Jabatan Fungsional Kesehatan Prov. Kaltim']);
        $service = Service::updateOrCreate(['service_text' => 'Pengambilan surat tanda registrasi (STR) yang dikeluarkan MTKI (Majelis Tenaga Kesehatan Indonesia)']);
        $service = Service::updateOrCreate(['service_text' => 'Penerbitan Penetapan Angka Kredit (PAK) Jabatan Fungsional Kesehatan']);
        $service = Service::updateOrCreate(['service_text' => 'Perijinan Rumah Sakit Kelas B']);
        $service = Service::updateOrCreate(['service_text' => 'Legalisasi Izajah Tenaga Kesehatan dan STRTTK']);
        $service = Service::updateOrCreate(['service_text' => 'Legalisasi STR yang dikeluarkan MTKI (Majelis Tenaga Kesehatan Indonesia)']);
        $service = Service::updateOrCreate(['service_text' => 'Rekomendasi Izin Pedagang Besar Farmasi (PBF) Cabang']);
        $service = Service::updateOrCreate(['service_text' => 'Rekomendasi Izin Pedagang Besar Farmasi (PBF) Cabang Modal Asing (PMA)']);
        $service = Service::updateOrCreate(['service_text' => 'Rekomendasi Usaha Kecil Obat Tradisional (UKOT)']);
        $service = Service::updateOrCreate(['service_text' => 'Rekomendasi Izin Distribusi Alat Kesehatan (IDAK) Cabang']);
        $service = Service::updateOrCreate(['service_text' => 'Rekomendasi Perizinan Pedagang Besar Kosmetik']);
        $service = Service::updateOrCreate(['service_text' => 'Rekomendasi Perizinan Laboratorium Medis']);
        $service = Service::updateOrCreate(['service_text' => 'Rekomendasi Perizinan Laboratorium PCR Rumah Sakit']);
        $service = Service::updateOrCreate(['service_text' => 'Pelayanan Informasi Publik']);
        $service = Service::updateOrCreate(['service_text' => 'Layanan Permintaan Magang']);
        $service = Service::updateOrCreate(['service_text' => 'Pelayanan Humas atau Pengaduan']);
    }
}
