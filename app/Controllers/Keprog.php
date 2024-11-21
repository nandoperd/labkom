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
            'title' => 'Admin Labkom',
            'jmlLabkom' => $this->ModelKeprog->jmlLabkom(),
            'jmlKategori' => $this->ModelKeprog->jmlKategori(),
            'jmlPengelolaan' => $this->ModelKeprog->jmlPengelolaan(),
            'jmlPengajuan' => $this->ModelKeprog->jmlPengajuan(),
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

    public function pengelolaan()
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
}