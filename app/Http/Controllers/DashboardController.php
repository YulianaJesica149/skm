<?php

namespace App\Http\Controllers;

use App\Models\Respondent;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $laki = Respondent::where('jenis_kelamin', 'laki-laki')->count();
        $perempuan = Respondent::where('jenis_kelamin', 'perempuan')->count();
        $totalRespondent = Respondent::select(DB::raw('count(*) as user_count, jenis_kelamin'))->count();
        $umur = Respondent::where('umur', '<=', 20)->get()->count();
        $umur2 = Respondent::where('umur',  '>', 19)->where('umur', '<', 30)->get()->count();
        $umur3 =  Respondent::where('umur', '>', 29)->where('umur', '<', 40)->get()->count();
        $umur4 = Respondent::where('umur',  '>', 39)->where('umur', '<', 50)->get()->count();
        $umur5 =  Respondent::where('umur', '>=', 50)->get()->count();
        $pendidikanSd = Respondent::where('pendidikan', 'SD')->get()->count();
        $pendidikanSmp = Respondent::where('pendidikan', 'SMP')->get()->count();
        $pendidikanSma = Respondent::where('pendidikan', 'SLTA/SEDERAJAT')->get()->count();
        $pendidikanD1 = Respondent::where('pendidikan', 'DI/DII')->get()->count();
        $pendidikanD3 = Respondent::where('pendidikan', 'DIII')->get()->count();
        $pendidikanS1 = Respondent::where('pendidikan', 'S1')->get()->count();
        $pendidikanS2 = Respondent::where('pendidikan', 'S2')->get()->count();
        $pendidikanS3 = Respondent::where('pendidikan', 'S3')->get()->count();
        $pekerjaanPns = Respondent::where('pekerjaan', 'PNS/TNI/POLRI')->get()->count();
        $pekerjaanPs = Respondent::where('pekerjaan', 'Pegawai Swasta')->get()->count();
        $pekerjaanWs = Respondent::where('pekerjaan', 'Wiraswasta')->get()->count();
        $pekerjaanTn = Respondent::where('pekerjaan', 'Tenaga Medis')->get()->count();
        $pekerjaanPM = Respondent::where('pekerjaan', 'Pelajar/Mahasiswa')->get()->count();
        $pekerjaanLain = Respondent::where('pekerjaan', 'Lainnya')->get()->count();
        return view("admin.dashboard", compact('laki', 'perempuan', 'umur', 'umur2', 'umur3', 'umur4', 'umur5', 'pendidikanSd', 'pendidikanSmp', 'pendidikanSma', 'pendidikanD1', 'pendidikanD3', 'pendidikanS1', 'pendidikanS2', 'pendidikanS3', 'pekerjaanPns', 'pekerjaanPs', 'pekerjaanWs', 'pekerjaanTn', 'pekerjaanPM', 'pekerjaanLain', 'totalRespondent'));
    }
}
