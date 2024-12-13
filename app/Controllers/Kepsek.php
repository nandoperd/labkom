<?php

namespace App\Controllers;

use App\Models\ModelKepsek;

class Kepsek extends BaseController
{    // mendeklarasikan form pada v_login agar bisa berjalan
    public function __construct()
    {
        helper('form');
        $this->ModelKepsek = new ModelKepsek();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin Labkom',
            'jmlLabkom' => $this->ModelKepsek->jmlLabkom(),
            'jmlKategori' => $this->ModelKepsek->jmlKategori(),
            'jmlPengelolaan' => $this->ModelKepsek->jmlPengelolaan(),
            'jmlPerbaikan' => $this->ModelKepsek->jmlPerbaikan(),
            'jmlPerbaikanSetuju' => $this->ModelKepsek->jmlPerbaikanSetuju(),
            'jmlPerbaikanAll' => $this->ModelKepsek->jmlPerbaikanAll(),
            'jmlPengajuan' => $this->ModelKepsek->jmlPengajuan(),
            'jmlPengajuanSetuju' => $this->ModelKepsek->jmlPengajuanSetuju(),
            'jmlPengajuanAll' => $this->ModelKepsek->jmlPengajuanAll(),
        ];
        return view('kepsek/v_index', $data);
    }

    public function labkom()
    {
        $data = [
            'title' => 'Data Labkom',
            'labkomData' => $this->ModelKepsek->getAllLabkom(),
        ];
        return view('kepsek/v_labkom', $data);
    }

    public function inventaris()
    {
        $data = [
            'title' => 'Data Inventaris Lab',
            'pengelolaanData' => $this->ModelKepsek->getAllPengelolaan(),
        ];
        return view('kepsek/v_pengelolaan', $data);
    }

    public function pengajuan()
    {
        $data = [
            'title' => 'Data Pengajuan Barang',
            'pengajuanData' => $this->ModelKepsek->pengajuanData(),
        ];
        return view('kepsek/v_pengajuan', $data);
    }

    public function verif($id)
    {
        $data = [
            'id' => $id,
            'verifikasi_keprog' => 1,
            'status' => "Sudah diverifikasi Kepala program"
        ];
        $this->ModelKepsek->verifPengajuan($data);
        session()->setFlashdata('pesan', 'Pengajuan Barang Berhasil Disetujui');
        echo "<script>history.go(-1);</script>";
        exit();
    }

    public function perbaikan()
    {
        $data = [
            'title' => 'Data Perbaikan Barang',
            'perbaikanData' => $this->ModelKepsek->perbaikanData(),
        ];
        return view('kepsek/v_perbaikan', $data);
    }

    public function editPerbaikan($id)
    {
        $data = [
            'title' => 'Edit Data',
            'd' => $this->ModelKepsek->detailDataPerbaikan($id) // Ambil data spesifik
        ];

        return view('kepsek/v_edit_perbaikan', $data);
    }

    public function updatePerbaikan($id)
    {
        if ($this->validate([
            'status' => [
                'label' => 'Persetujuan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ]
            ],
            'catatan' => [
                'label' => 'Catatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ]
            ],
        ])) {
            // Jika valid
            $data = [
                'id' => $id,
                'status' => $this->request->getPost('status'),
                'catatan' => $this->request->getPost('catatan'),
            ];

            $this->ModelKepsek->editPerbaikan($data);
            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('kepsek/perbaikan'));
        } else {
            // Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('kepsek/editPerbaikan/' . $id));
        }
    }

    public function editPengajuan($id)
    {
        $data = [
            'title' => 'Edit Data',
            'd' => $this->ModelKepsek->detailDataPengajuan($id) // Ambil data spesifik
        ];

        return view('kepsek/v_edit_pengajuan', $data);
    }

    public function updatePengajuan($id)
    {
        if ($this->validate([
            'status' => [
                'label' => 'Persetujuan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ]
            ],
            'catatan' => [
                'label' => 'Catatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ]
            ],
        ])) {
            // Jika valid
            $data = [
                'id' => $id,
                'status' => $this->request->getPost('status'),
                'catatan' => $this->request->getPost('catatan'),
            ];

            $this->ModelKepsek->editPengajuan($data);
            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('kepsek/pengajuan'));
        } else {
            // Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('kepsek/editPengajuan/' . $id));
        }
    }

    public function laporan_perbaikan()
    {
        $data = [
            'title' => 'Laporan Perbaikan Barang',
            'd' => $this->ModelKepsek->dataLaporanPerbaikan(),
        ];
        return view('keprog/v_laporan_perbaikan', $data);
    }

    public function laporan_pengajuan()
    {
        $data = [
            'title' => 'Laporan Pengajuan Barang',
            'd' => $this->ModelKepsek->dataLaporanPengajuan(),
        ];
        return view('keprog/v_laporan_pengajuan', $data);
    }

}