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

class Admin extends BaseController
{
    public function index()
    {
        $modelJadwal = new M_Jadwal();

        $data['web_title'] = "Reservasi Janji Temu";
        $data['jadwal_spesialis'] = $modelJadwal
            ->select('tbl_jadwal_dokter.*, tbl_dokter.nama_dokter, tbl_dokter.spesialis')
            ->join('tbl_dokter', 'tbl_dokter.id_dokter = tbl_jadwal_dokter.id_dokter')
            ->findAll();

        return view('Frontend/index', $data);
    }
    public function login()
    {
        return view('Backend/Login/login');
    }
    public function autentikasi()
    {
        $modelAdmin = new M_Admin(); // proses inisialiasi model
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $cekUsername = $modelAdmin->getDataAdmin(['username_admin' => $username, 'is_delete_admin' => '0'])->getNumRows();
        if ($cekUsername == 0) {
            return redirect()->back()->with('error', 'Username Tidak Ditemukan!');
        } else {
            $dataUser = $modelAdmin->getDataAdmin(['username_admin' => $username, 'is_delete_admin' => '0'])->getRowArray();
            $passwordUser = $dataUser['password_admin'];

            $verifikasiPassword = password_verify($password, $passwordUser);
            if (!$verifikasiPassword) {
                return redirect()->back()->with('error', 'Password Tidak Sesuai!');
            } else {
                $dataSession = [
                    'ses_id' => $dataUser['id_admin'],
                    'ses_user' => $dataUser['nama_admin'],
                    'ses_level' => $dataUser['akses_level'],
                ];

                session()->set($dataSession);
                return redirect()->to('/admin/dashboard')->with('success', 'Login berhasil!');
            }
        }
    }
    public function logout()
    {
        session()->remove('ses_id');
        session()->remove('ses_user');
        session()->remove('ses_level');
        // session()->destroy();
        return redirect()->to('/frontend/index')->with('info', 'Anda telah keluar dari sistem!');
    }
    public function dashboard()
    {
        // return view('welcome_message');
        if (session()->get('ses_id') == "" || session()->get('ses_user') == "" || session()->get('ses_level') == "") {
            session()->setFlashdata('error', 'Silakan login terlebih dahulu!');
?>
            <script>
                document.location = "<?= base_url('/admin/login'); ?>";
            </script>
            <?php
        } else {
            echo view('Backend/Template/header');
            echo view('Backend/Template/sidebar');
            echo view('Backend/Login/dashboard_admin');
            echo view('Backend/Template/footer');
        }
    }
    public function master_data_pasien()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_user') == "" || session()->get('ses_level') == "") {
            // session()->setFlashdata('error', 'Silakan login terlebih dahulu!');
            return redirect()->to('/admin/login')->with('warning', 'Silakan login terlebih dahulu!');
        } else {
            $modelPasien = new M_Pasien(); // inisiasi

            $uri = service('uri');
            $pages = $uri->getSegment(2);
            $dataPasien = $modelPasien->getDataPasien(['is_delete_pasien' => '0'])->getResultArray();

            $data['pages'] = $pages;
            $data['data_pasien'] = $dataPasien;

            echo view('Backend/Template/header', $data);
            echo view('Backend/Template/sidebar', $data);
            echo view('Backend/MasterPasien/master-data-pasien', $data);
            echo view('Backend/Template/footer', $data);
        }
    }
    public function input_data_pasien()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_user') == "" || session()->get('ses_level') == "") {
            // session()->setFlashdata('error', 'Silakan login terlebih dahulu!');
            return redirect()->to('/admin/login')->with('warning', 'Silakan login terlebih dahulu!');
        } else {
            echo view('Backend/Template/header');
            echo view('Backend/Template/sidebar');
            echo view('Backend/MasterPasien/input-pasien');
            echo view('Backend/Template/footer');
        }
    }
    public function simpan_data_pasien()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_user') == "" || session()->get('ses_level') == "") {
            // session()->setFlashdata('error', 'Silakan login terlebih dahulu!');
            return redirect()->to('/admin/login')->with('warning', 'Silakan login terlebih dahulu!');
        } else {
            $modelPasien = new M_Pasien(); // inisiasi

            $nama = $this->request->getPost('nama_pasien');
            $jamsos = $this->request->getPost('nomor_jamsos');
            $gender = $this->request->getPost('jenis_kelamin');
            $alamat = $this->request->getPost('alamat');
            $email = $this->request->getPost('email');

            $cekUsername = $modelPasien->getDataPasien(['nama_pasien' => $nama])->getNumRows();
            if ($cekUsername > 0) {
                session()->setFlashdata('error', 'Nama sudah digunakan!');
            ?>
                <script>
                    history.go(-1);
                </script>
            <?php
            } else {
                $hasil = $modelPasien->autoNumber()->getRowArray();
                if (!$hasil) {
                    $id = "PAS001";
                } else {
                    $kode = $hasil['id_pasien'];
                    $noUrut = (int) substr($kode, -3);
                    $noUrut++;
                    $id = "PAS" . sprintf("%03s", $noUrut);
                }

                $dataSimpan = [
                    'id_pasien' => $id,
                    'nama_pasien' => $nama,
                    'nomor_jamsos' => $jamsos,
                    'jenis_kelamin' => $gender,
                    'alamat' => $alamat,
                    'email' => $email,
                    'password_pasien' => password_hash('password_pasien', PASSWORD_DEFAULT),
                    'is_delete_pasien' => '0',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                $modelPasien->saveDataPasien($dataSimpan);
                session()->setFlashdata('success', 'Data Pasien Berhasil Ditambahkan!');
            ?>
                <script>
                    document.location = "<?= base_url('/admin/master-data-pasien'); ?>";
                </script>
            <?php
            }
        }
    }
    public function edit_data_pasien()
    {
        $uri = service('uri');
        $idEdit = $uri->getSegment(3);
        $modelPasien = new M_Pasien();

        // Mengambil data admin dari table admin di database berdasarkan parameter yang dikirimkan
        $dataPasien = $modelPasien->getDataPasien(['sha1(id_pasien)' => $idEdit])->getRowArray();
        session()->set(['idUpdate' => $dataPasien['id_pasien']]);

        $page = $uri->getSegment(2);

        $data['page'] = $page;
        $data['web_title'] = "Edit Data Pasien";
        $data['data_pasien'] = $dataPasien; // mengirim array data admin ke view

        echo view('Backend/Template/header', $data);
        echo view('Backend/Template/sidebar', $data);
        echo view('Backend/MasterPasien/edit-pasien', $data);
        echo view('Backend/Template/footer', $data);
    }
    public function update_pasien()
    {
        $modelPasien = new M_Pasien();

        $idUpdate = session()->get('idUpdate');
        $nama = $this->request->getPost('nama_pasien');
        $jamsos = $this->request->getPost('nomor_jamsos');
        $gender = $this->request->getPost('jenis_kelamin');
        $alamat = $this->request->getPost('alamat');
        $email = $this->request->getPost('email');

        if ($nama == "" || $gender == "" || $jamsos == "" || $alamat == "" || $email == "") {
            session()->setFlashdata('error', 'Isian tidak boleh kosong!!');
            ?>
            <script>
                history.go(-1);
            </script>
        <?php
        } else {
            $dataUpdate = [
                'nama_pasien' => $nama,
                'nomor_jamsos' => $jamsos,
                'jenis_kelamin' => $gender,
                'alamat' => $alamat,
                'email' => $email,
                'updated_at' => date("Y-m-d H:i:s"),
            ];
            $whereUpdate = ['id_pasien' => $idUpdate];

            $modelPasien->updateDataPasien($dataUpdate, $whereUpdate);
            session()->remove('idUpdate');
            session()->setFlashdata('success', 'Data Pasien Berhasil Diperbaharui!');
        ?>
            <script>
                document.location = "<?= base_url('/admin/master-data-pasien'); ?>";
            </script>
        <?php
        }
    }
    public function hapus_data_pasien()
    {
        $modelPasien = new M_Pasien();
        $uri = service('uri');
        $idHapus = $uri->getSegment(3);

        $dataUpdate = [
            'is_delete_pasien' => '1',
            'updated_at' => date("Y-m-d H:i:s"),
        ];
        $whereUpdate = ['sha1(id_pasien)' => $idHapus];

        $result = $modelPasien->updateDataPasien($dataUpdate, $whereUpdate);

        if ($result) {
            session()->setFlashdata('success', 'Data Pasien Berhasil Dihapus!');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data pasien!');
        }

        ?>
        <script>
            document.location = "<?= base_url('/admin/master-data-pasien'); ?>";
        </script>
        <?php
    }
    public function master_data_dokter()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_user') == "" || session()->get('ses_level') == "") {
            // session()->setFlashdata('error', 'Silakan login terlebih dahulu!');
            return redirect()->to('/admin/login')->with('warning', 'Silakan login terlebih dahulu!');
        } else {
            $modelDokter = new M_Dokter(); // inisiasi

            $uri = service('uri');
            $pages = $uri->getSegment(2);
            $dataDokter = $modelDokter->getDataDokter(['is_delete_dokter' => '0'])->getResultArray();

            $data['pages'] = $pages;
            $data['data_dokter'] = $dataDokter;

            echo view('Backend/Template/header', $data);
            echo view('Backend/Template/sidebar', $data);
            echo view('Backend/MasterDokter/master-data-dokter', $data);
            echo view('Backend/Template/footer', $data);
        }
    }
    public function input_data_dokter()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_user') == "" || session()->get('ses_level') == "") {
            // session()->setFlashdata('error', 'Silakan login terlebih dahulu!');
            return redirect()->to('/admin/login')->with('warning', 'Silakan login terlebih dahulu!');
        } else {
            echo view('Backend/Template/header');
            echo view('Backend/Template/sidebar');
            echo view('Backend/MasterDokter/input-dokter');
            echo view('Backend/Template/footer');
        }
    }
    public function simpan_data_dokter()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_user') == "" || session()->get('ses_level') == "") {
            // session()->setFlashdata('error', 'Silakan login terlebih dahulu!');
            return redirect()->to('/admin/login')->with('warning', 'Silakan login terlebih dahulu!');
        } else {
            $modelDokter = new M_Dokter(); // inisiasi

            $nama = $this->request->getPost('nama_dokter');
            $spesialis = $this->request->getPost('spesialis');
            $no_tlp = $this->request->getPost('no_tlp');
            $email = $this->request->getPost('email');

            $cekUsername = $modelDokter->getDataDokter(['nama_dokter' => $nama])->getNumRows();
            if ($cekUsername > 0) {
                session()->setFlashdata('error', 'Nama sudah digunakan!');
        ?>
                <script>
                    history.go(-1);
                </script>
            <?php
            } else {
                $hasil = $modelDokter->autoNumber()->getRowArray();
                if (!$hasil) {
                    $id = "DOK001";
                } else {
                    $kode = $hasil['id_dokter'];
                    $noUrut = (int) substr($kode, -3);
                    $noUrut++;
                    $id = "DOK" . sprintf("%03s", $noUrut);
                }

                $dataSimpan = [
                    'id_dokter' => $id,
                    'nama_dokter' => $nama,
                    'spesialis' => $spesialis,
                    'no_tlp' => $no_tlp,
                    'email' => $email,
                    'is_delete_dokter' => '0',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                $modelDokter->saveDataDokter($dataSimpan);
                session()->setFlashdata('success', 'Data Dokter Berhasil Ditambahkan!');
            ?>
                <script>
                    document.location = "<?= base_url('/admin/master-data-dokter'); ?>";
                </script>
            <?php
            }
        }
    }
    public function edit_data_dokter()
    {
        $uri = service('uri');
        $idEdit = $uri->getSegment(3);
        $modelDokter = new M_Dokter();

        // Mengambil data admin dari table admin di database berdasarkan parameter yang dikirimkan
        $dataDokter = $modelDokter->getDataDokter(['sha1(id_dokter)' => $idEdit])->getRowArray();
        session()->set(['idUpdate' => $dataDokter['id_dokter']]);

        $page = $uri->getSegment(2);

        $data['page'] = $page;
        $data['web_title'] = "Edit Data Dokter";
        $data['data_dokter'] = $dataDokter; // mengirim array data admin ke view

        echo view('Backend/Template/header', $data);
        echo view('Backend/Template/sidebar', $data);
        echo view('Backend/MasterDokter/edit-dokter', $data);
        echo view('Backend/Template/footer', $data);
    }
    public function update_dokter()
    {
        $modelDokter = new M_Dokter();

        $idUpdate = session()->get('idUpdate');
        $nama = $this->request->getPost('nama_dokter');
        $spesialis = $this->request->getPost('spesialis');
        $no_tlp = $this->request->getPost('no_tlp');
        $email = $this->request->getPost('email');

        if ($nama == "" || $spesialis == "" || $no_tlp == "" || $email == "") {
            session()->setFlashdata('error', 'Isian tidak boleh kosong!!');
            ?>
            <script>
                history.go(-1);
            </script>
        <?php
        } else {
            $dataUpdate = [
                'nama_dokter' => $nama,
                'spesialis' => $spesialis,
                'no_tlp' => $no_tlp,
                'email' => $email,
                'updated_at' => date("Y-m-d H:i:s"),
            ];
            $whereUpdate = ['id_dokter' => $idUpdate];

            $modelDokter->updateDataDokter($dataUpdate, $whereUpdate);
            session()->remove('idUpdate');
            session()->setFlashdata('success', 'Data Pasien Berhasil Diperbaharui!');
        ?>
            <script>
                document.location = "<?= base_url('/admin/master-data-dokter'); ?>";
            </script>
        <?php
        }
    }
    public function hapus_data_dokter()
    {
        $modelDokter = new M_Dokter();
        $uri = service('uri');
        $idHapus = $uri->getSegment(3);

        $dataUpdate = [
            'is_delete_dokter' => '1',
            'updated_at' => date("Y-m-d H:i:s"),
        ];
        $whereUpdate = ['sha1(id_dokter)' => $idHapus];

        $result = $modelDokter->updateDataDokter($dataUpdate, $whereUpdate);

        if ($result) {
            session()->setFlashdata('success', 'Data Dokter Berhasil Dihapus!');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data dokter!');
        }

        ?>
        <script>
            document.location = "<?= base_url('/admin/master-data-dokter'); ?>";
        </script>
    <?php
    }
    public function master_data_jadwal()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_user') == "" || session()->get('ses_level') == "") {
            // session()->setFlashdata('error', 'Silakan login terlebih dahulu!');
            return redirect()->to('/admin/login')->with('warning', 'Silakan login terlebih dahulu!');
        } else {
            $modelJadwal = new M_Jadwal(); // inisiasi

            $uri = service('uri');
            $pages = $uri->getSegment(2);
            $dataJadwal = $modelJadwal->getDataJadwalJoin(['tbl_jadwal_dokter.is_delete_jadwal' => '0'])->getResultArray();

            $data['pages'] = $pages;
            $data['data_jadwal'] = $dataJadwal;

            echo view('Backend/Template/header', $data);
            echo view('Backend/Template/sidebar', $data);
            echo view('Backend/MasterJadwal/master-data-jadwal', $data);
            echo view('Backend/Template/footer', $data);
        }
    }
    public function input_data_jadwal()
    {
        $modelDokter = new M_Dokter();
        $uri = service('uri');
        $page = $uri->getSegment(2);

        $data['page'] = $page;
        $data['web_title'] = "Input Data Jadwal";
        $data['data_dokter'] = $modelDokter->getDataDokter(['is_delete_dokter' => '0'])->getResultArray();

        echo view('Backend/Template/header', $data);
        echo view('Backend/Template/sidebar', $data);
        echo view('Backend/MasterJadwal/input-jadwal', $data);
        echo view('Backend/Template/footer', $data);
    }
    public function simpan_data_jadwal()
    {
        $modelJadwal = new M_Jadwal();

        // Ambil semua data POST
        $dokter = $this->request->getPost('id_dokter');
        $hari = $this->request->getPost('hari');
        $jam_mulai = $this->request->getPost('jam_mulai');
        $jam_selesai = $this->request->getPost('jam_selesai');

        // Generate ID Jadwal
        $hasil = $modelJadwal->autoNumber()->getRowArray();
        if (!$hasil) {
            $id = "JDW001";
        } else {
            $kode = $hasil['id_jadwal'];
            $noUrut = (int) substr($kode, -3);
            $noUrut++;
            $id = "JDW" . sprintf("%03s", $noUrut);
        }

        // Siapkan data untuk disimpan
        $dataSimpan = [
            'id_jadwal' => $id,
            'id_dokter' => $dokter,
            'hari' => $hari,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai,
            'is_delete_jadwal' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Simpan ke database
        $modelJadwal->saveDataJadwal($dataSimpan);

        session()->setFlashdata('success', 'Data Jadwal Berhasil Diperbaharui!');

    ?>
        <script>
            document.location = "<?= base_url('/admin/master-data-jadwal'); ?>";
        </script>
        <?php
    }
    public function edit_data_jadwal()
    {
        $modelDokter = new M_Dokter();
        $uri = service('uri');
        $idEdit = $uri->getSegment(3);
        $modelJadwal = new M_Jadwal();

        // Mengambil data admin dari table admin di database berdasarkan parameter yang dikirimkan
        $dataJadwal = $modelJadwal->getDataJadwal(['sha1(id_jadwal)' => $idEdit])->getRowArray();
        session()->set(['idUpdate' => $dataJadwal['id_jadwal']]);

        $page = $uri->getSegment(2);

        $data['page'] = $page;
        $data['web_title'] = "Edit Data Jadwal";
        $data['data_jadwal'] = $dataJadwal; // mengirim array data admin ke view
        $data['data_dokter'] = $modelDokter->getDataDokter(['is_delete_dokter' => '0'])->getResultArray();
        echo view('Backend/Template/header', $data);
        echo view('Backend/Template/sidebar', $data);
        echo view('Backend/MasterJadwal/edit-jadwal', $data);
        echo view('Backend/Template/footer', $data);
    }
    public function update_jadwal()
    {
        $modelJadwal = new M_Jadwal();

        $idUpdate = session()->get('idUpdate');
        $dokter = $this->request->getPost('id_dokter');
        $hari = $this->request->getPost('hari');
        $jam_mulai = $this->request->getPost('jam_mulai');
        $jam_selesai = $this->request->getPost('jam_selesai');

        $dataJadwalLama = $modelJadwal->getDataJadwal(['id_jadwal' => $idUpdate])->getRowArray();

        if ($dokter == "") {
            session()->setFlashdata('error', 'Isian tidak boleh kosong!!');
        ?>
            <script>
                history.go(-1);
            </script>
        <?php
        } else {
            $dataUpdate = [
                'id_dokter' => $dokter,
                'hari' => $hari,
                'jam_mulai' => $jam_mulai,
                'jam_selesai' => $jam_selesai,
                'updated_at' => date("Y-m-d H:i:s"),
            ];
            $whereUpdate = ['id_jadwal' => $idUpdate];

            $modelJadwal->updateDataJadwal($dataUpdate, $whereUpdate);
            session()->remove('idUpdate');
            session()->setFlashdata('success', 'Data Jadwal Berhasil Diperbaharui!');
        ?>
            <script>
                document.location = "<?= base_url('/admin/master-data-jadwal'); ?>";
            </script>
        <?php
        }
    }
    public function hapus_data_jadwal()
    {
        $modelJadwal = new M_Jadwal();

        $uri = service('uri');
        $idHapus = $uri->getSegment(3);

        $dataUpdate = [
            'is_delete_jadwal' => '1',
            'updated_at' => date("Y-m-d H:i:s"),
        ];
        $whereUpdate = ['sha1(id_jadwal)' => $idHapus];

        $result = $modelJadwal->updateDataJadwal($dataUpdate, $whereUpdate);

        if ($result) {
            session()->setFlashdata('success', 'Data Jadwal Berhasil Dihapus!');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data Jadwal!');
        }
        ?>
        <script>
            document.location = "<?= base_url('/admin/master-data-jadwal'); ?>";
        </script>
        <?php
    }
    public function simpan_data_booking()
    {
        $modelPasien = new M_Pasien();
        $modelJanji = new M_Janji();
        $modelJadwal = new M_Jadwal(); // Pastikan ini ada, atau sesuaikan

        $nama = $this->request->getPost('nama_pasien');
        $jamsos = $this->request->getPost('nomor_jamsos');
        $gender = $this->request->getPost('jenis_kelamin');
        $alamat = $this->request->getPost('alamat');
        $email = $this->request->getPost('email');
        $idJadwal = $this->request->getPost('id_jadwal');
        $tanggal = $this->request->getPost('tanggal');

        $cekUsername = $modelPasien->getDataPasien(['nama_pasien' => $nama])->getNumRows();
        if ($cekUsername > 0) {
            session()->setFlashdata('error', 'Nama sudah digunakan!');
        ?>
            <script>
                history.go(-1);
            </script>
        <?php
        } else {
            // Buat ID pasien baru
            $hasil = $modelPasien->autoNumber()->getRowArray();
            $id = !$hasil ? "PAS001" : "PAS" . sprintf("%03s", (int)substr($hasil['id_pasien'], -3) + 1);

            // Simpan data pasien
            $dataPasien = [
                'id_pasien' => $id,
                'nama_pasien' => $nama,
                'nomor_jamsos' => $jamsos,
                'jenis_kelamin' => $gender,
                'alamat' => $alamat,
                'email' => $email,
                'password_pasien' => password_hash('password_pasien', PASSWORD_DEFAULT),
                'is_delete_pasien' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            // Buat ID janji baru
            $identity = $modelJanji->autoNumber()->getRowArray();
            $idJanji = !$identity ? "JAN001" : "JAN" . sprintf("%03s", (int)substr($identity['id_janji'], -3) + 1);

            // Ambil id_dokter dari tabel jadwal
            $jadwal = $modelJadwal->where('id_jadwal', $idJadwal)->first();
            $idDokter = $jadwal['id_dokter'];

            // Hitung jumlah janji yang sudah ada pada tanggal dan dokter tersebut
            $jumlahJanji = $modelJanji->join('tbl_jadwal_dokter', 'tbl_jadwal_dokter.id_jadwal = tbl_janji_temu.id_jadwal')
                ->where([
                    'tbl_jadwal_dokter.id_dokter' => $idDokter,
                    'tbl_janji_temu.tanggal' => $tanggal
                ])
                ->countAllResults();

            $nomorAntrian = $jumlahJanji + 1;

            // Simpan data janji
            $dataJanji = [
                'id_janji' => $idJanji,
                'id_pasien' => $id,
                'id_jadwal' => $idJadwal,
                'tanggal' => $tanggal,
                'nomor_antrian' => $nomorAntrian,
                'is_delete_janji' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $modelPasien->saveDataPasien($dataPasien);
            $modelJanji->saveDataJanji($dataJanji);

            return redirect()->to('/reservasi/bukti/' . $idJanji);
        }
    }

    public function bukti($idJanji)
    {
        $modelJanji = new M_Janji();
        $data = $modelJanji
            ->select('tbl_janji_temu.*, tbl_pasien.nama_pasien, tbl_dokter.nama_dokter, tbl_dokter.spesialis, tbl_jadwal_dokter.hari, tbl_jadwal_dokter.jam_mulai, tbl_jadwal_dokter.jam_selesai')
            ->join('tbl_pasien', 'tbl_pasien.id_pasien = tbl_janji_temu.id_pasien')
            ->join('tbl_jadwal_dokter', 'tbl_jadwal_dokter.id_jadwal = tbl_janji_temu.id_jadwal')
            ->join('tbl_dokter', 'tbl_dokter.id_dokter = tbl_jadwal_dokter.id_dokter')
            ->where('tbl_janji_temu.id_janji', $idJanji)
            ->get()
            ->getRowArray();

        if (!$data) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Janji tidak ditemukan');
        }

        // Siapkan isi QR
        $qrText = "ID Janji: {$data['id_janji']}\nNama: {$data['nama_pasien']}\nDokter: {$data['nama_dokter']} ({$data['spesialis']})\nTanggal: {$data['tanggal']}\nJam: {$data['jam_mulai']} - {$data['jam_selesai']}";

        // Gunakan library Endroid\QrCode (pastikan sudah diinstall via composer)
        $qrCode = new QrCode($qrText);
        $qrCode->getSize(250);
        $qrCode->getMargin(10);
        $qrCode->getEncoding(new Encoding('UTF-8'));
        $qrCode->getErrorCorrectionLevel();

        $writer = new PngWriter();
        $qrResult = $writer->write($qrCode);

        // Konversi ke base64
        $qrImage = base64_encode($qrResult->getString());

        return view('Frontend/bukti_reservasi', [
            'data' => $data,
            'qr_image' => $qrImage
        ]);
    }
    public function master_data_janji()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_user') == "" || session()->get('ses_level') == "") {
            // session()->setFlashdata('error', 'Silakan login terlebih dahulu!');
            return redirect()->to('/admin/login')->with('warning', 'Silakan login terlebih dahulu!');
        } else {
            $modelJanji = new M_Janji();
            // inisiasi

            $uri = service('uri');
            $pages = $uri->getSegment(2);
            // $dataJadwal = $modelJadwal->getDataJadwalJoin(['tbl_jadwal_dokter.is_delete_jadwal' => '0'])->getResultArray();

            $data['data_janji'] = $modelJanji
                ->select('tbl_janji_temu.tanggal, tbl_janji_temu.nomor_antrian, tbl_janji_temu.status, tbl_janji_temu.id_janji, tbl_pasien.nama_pasien, tbl_dokter.nama_dokter, tbl_dokter.spesialis, tbl_jadwal_dokter.hari, tbl_jadwal_dokter.jam_mulai, tbl_jadwal_dokter.jam_selesai')
                ->join('tbl_pasien', 'tbl_pasien.id_pasien = tbl_janji_temu.id_pasien')
                ->join('tbl_jadwal_dokter', 'tbl_jadwal_dokter.id_jadwal = tbl_janji_temu.id_jadwal')
                ->join('tbl_dokter', 'tbl_dokter.id_dokter = tbl_jadwal_dokter.id_dokter')
                ->where('tbl_janji_temu.is_delete_janji', '0')
                ->get()
                ->getResultArray();

            echo view('Backend/Template/header', $data);
            echo view('Backend/Template/sidebar', $data);
            echo view('Backend/MasterJanji/master-data-janji', $data);
            echo view('Backend/Template/footer', $data);
        }
    }
    public function edit_data_janji()
    {
        if (
            session()->get('ses_id') == '' ||
            session()->get('ses_user') == '' ||
            session()->get('ses_level') == ''
        ) {
            session()->setFlashdata('error', 'Silakan login terlebih dahulu!');
            return redirect()->to('/admin/login');
        }

        $modelJanji = new M_Janji();
        $modelJadwal = new M_Jadwal();
        $modelPasien = new M_Pasien();

        $uri = service('uri');
        $idEdit = $uri->getSegment(3); // hash dari id_janji

        // Ambil data janji berdasarkan sha1(id_janji)
        $dataJanji = $modelJanji
            ->select('tbl_janji_temu.*, tbl_jadwal_dokter.hari, tbl_jadwal_dokter.jam_mulai, tbl_jadwal_dokter.jam_selesai, tbl_dokter.nama_dokter, tbl_dokter.spesialis')
            ->join('tbl_jadwal_dokter', 'tbl_jadwal_dokter.id_jadwal = tbl_janji_temu.id_jadwal')
            ->join('tbl_pasien', 'tbl_pasien.id_pasien = tbl_janji_temu.id_pasien')
            ->join('tbl_dokter', 'tbl_dokter.id_dokter = tbl_jadwal_dokter.id_dokter')
            ->where('sha1(tbl_janji_temu.id_janji)', $idEdit)
            ->get()
            ->getRowArray();

        if (!$dataJanji) {
            session()->setFlashdata('error', 'Data tidak ditemukan!');
            return redirect()->to('/admin/master-data-janji');
        }

        // Simpan id janji ke session untuk update
        session()->set(['idUpdateJanji' => $dataJanji['id_janji']]);

        $data['web_title'] = "Edit Data Janji";
        $data['page'] = 'edit-data-janji';
        $data['data_janji'] = $dataJanji;
        $data['list_jadwal'] = $modelJadwal
            ->join('tbl_dokter', 'tbl_dokter.id_dokter = tbl_jadwal_dokter.id_dokter')
            ->where('tbl_jadwal_dokter.is_delete_jadwal', '0')
            ->select('tbl_jadwal_dokter.*, tbl_dokter.nama_dokter, tbl_dokter.spesialis')
            ->findAll();

        echo view('Backend/Template/header', $data);
        echo view('Backend/Template/sidebar', $data);
        echo view('Backend/MasterJanji/edit-janji', $data); // ini harus kamu buat view-nya
        echo view('Backend/Template/footer', $data);
    }
    public function update_janji()
    {
        $modelJanji = new M_Janji();

        $idUpdate = session()->get('idUpdateJanji');
        $idJadwal = $this->request->getPost('id_jadwal');
        $tanggal  = $this->request->getPost('tanggal');

        if ($idJadwal == "" || $tanggal == "") {
            session()->setFlashdata('error', 'Semua isian wajib diisi!');
            return redirect()->back()->withInput();
        }

        // Validasi tanggal tidak boleh ke belakang
        if (strtotime($tanggal) < strtotime(date('Y-m-d'))) {
            session()->setFlashdata('error', 'Tanggal kunjungan tidak boleh di masa lalu!');
            return redirect()->back()->withInput();
        }

        $dataUpdate = [
            'id_jadwal'   => $idJadwal,
            'tanggal'     => $tanggal,
            'updated_at'  => date('Y-m-d H:i:s')
        ];

        $modelJanji->updateDataJanji(
            $dataUpdate,
            ['id_janji' => $idUpdate]
        );

        session()->remove('idUpdateJanji');
        session()->setFlashdata('success', 'Data Janji Berhasil Diperbarui!');
        return redirect()->to('/admin/master-data-janji');
    }
    public function hapus_data_janji()
    {
        $modelJanji = new M_Janji();

        $uri = service('uri');
        $idHapus = $uri->getSegment(3);

        $dataUpdate = [
            'is_delete_janji' => '1',
            'updated_at' => date("Y-m-d H:i:s"),
        ];
        $whereUpdate = ['sha1(id_janji)' => $idHapus];

        $result = $modelJanji->updateDataJanji($dataUpdate, $whereUpdate);

        if ($result) {
            session()->setFlashdata('success', 'Data JanjiBerhasil Dihapus!');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data Janji!');
        }
        ?>
        <script>
            document.location = "<?= base_url('/admin/master-data-janji'); ?>";
        </script>
<?php
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
