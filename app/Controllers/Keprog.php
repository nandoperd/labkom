<?php

namespace App\Controllers;

use App\Models\ModelKeprog;

class Keprog extends BaseController
{    // mendeklarasikan form pada v_login agar bisa berjalan
    public function __construct()
    {
        helper('form');
        $this->ModelKeprog = new ModelKeprog();
    }

    public function index()
    {
        $data = [
            'title' => 'Kepala Program Labkom',
            'jmlLabkom' => $this->ModelKeprog->jmlLabkom(),
            'jmlKategori' => $this->ModelKeprog->jmlKategori(),
            'jmlPengelolaan' => $this->ModelKeprog->jmlPengelolaan(),
            'jmlPerbaikan' => $this->ModelKeprog->jmlPerbaikan(),
            'jmlPerbaikanSetuju' => $this->ModelKeprog->jmlPerbaikanSetuju(),
            'jmlPerbaikanAll' => $this->ModelKeprog->jmlPerbaikanAll(),
            'jmlPengajuan' => $this->ModelKeprog->jmlPengajuan(),
            'jmlPengajuanSetuju' => $this->ModelKeprog->jmlPengajuanSetuju(),
            'jmlPengajuanAll' => $this->ModelKeprog->jmlPengajuanAll(),
        ];
        return view('keprog/v_index', $data);
    }

    public function labkom()
    {
        $data = [
            'title' => 'Data Labkom',
            'labkomData' => $this->ModelKeprog->getAllLabkom(),
        ];
        return view('keprog/v_labkom', $data);
    }

    public function inventaris()
    {
        $data = [
            'title' => 'Data Inventaris Lab',
            'pengelolaanData' => $this->ModelKeprog->getAllPengelolaan(),
        ];
        return view('keprog/v_pengelolaan', $data);
    }

    public function pengajuan()
    {
        $data = [
            'title' => 'Data Pengajuan Barang',
            'pengajuanData' => $this->ModelKeprog->allData(),
        ];
        return view('keprog/v_pengajuan', $data);
    }

    public function verif($id)
    {
        $data = [
            'id' => $id,
            'verifikasi_keprog' => 1,
            'status' => "Sudah diverifikasi Kepala program"
        ];
        $this->ModelKeprog->verifPengajuan($data);
        session()->setFlashdata('pesan', 'Pengajuan Barang Berhasil Disetujui');
        echo "<script>history.go(-1);</script>";
        exit();
    }

    public function perbaikan()
    {
        $data = [
            'title' => 'Data Perbaikan Barang',
            'perbaikanData' => $this->ModelKeprog->perbaikanData(),
        ];
        return view('keprog/v_perbaikan', $data);
    }

    public function editPerbaikan($id)
    {
        $data = [
            'title' => 'Edit Data',
            'd' => $this->ModelKeprog->detailDataPerbaikan($id) // Ambil data spesifik
        ];

        return view('keprog/v_edit_perbaikan', $data);
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

            $this->ModelKeprog->editPerbaikan($data);
            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('keprog/perbaikan'));
        } else {
            // Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('keprog/editPerbaikan/' . $id));
        }
    }

    public function editPengajuan($id)
    {
        $data = [
            'title' => 'Edit Data',
            'd' => $this->ModelKeprog->detailDataPengajuan($id) // Ambil data spesifik
        ];

        return view('keprog/v_edit_pengajuan', $data);
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

            $this->ModelKeprog->editPengajuan($data);
            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('keprog/pengajuan'));
        } else {
            // Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('keprog/editPengajuan/' . $id));
        }
    }

    public function laporan_perbaikan()
    {
        $data = [
            'title' => 'Laporan Perbaikan Barang',
            'd' => $this->ModelKeprog->dataLaporanPerbaikan(),
        ];
        return view('keprog/v_laporan_perbaikan', $data);
    }

    public function laporan_pengajuan()
    {
        $data = [
            'title' => 'Laporan Pengajuan Barang',
            'd' => $this->ModelKeprog->dataLaporanPengajuan(),
        ];
        return view('keprog/v_laporan_pengajuan', $data);
    }

}