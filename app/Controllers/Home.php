<?php

namespace App\Controllers;

use App\Models\M_Admin;
use App\Models\M_Pasien;
use App\Models\M_Dokter;
use App\Models\M_Jadwal;
use App\Models\M_Janji;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;

class Home extends BaseController
{
    public function login()
    {
        return view('Backend/Login/login');
    }
    public function ubahStatusJanji($id_hash)
    {
        $model = new M_Janji(); // Sesuaikan dengan nama model kamu

        // Cari id asli berdasarkan hash (jika perlu)
        $janji = $model->findAll();
        $id_asli = null;
        foreach ($janji as $j) {
            if (sha1($j['id_janji']) == $id_hash) {
                $id_asli = $j['id_janji'];
                break;
            }
        }

        if ($id_asli) {
            $data = ['status' => 'selesai'];
            $where = ['id_janji' => $id_asli];
            $model->updateDataJanji($data, $where); // ← Panggil method buatanmu
    
            return redirect()->back()->with('success', 'Status janji berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Data janji tidak ditemukan.');
        }
    }

}
