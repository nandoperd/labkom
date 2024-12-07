<?php

namespace App\Controllers;

use App\Models\ModelPerbaikan;

use App\Controllers\BaseController;

class Perbaikan extends BaseController
{
    protected $ModelPerbaikan;

    public function __construct()
    {
        helper('form');
        $this->ModelPerbaikan = new ModelPerbaikan();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Perbaikan Barang',
            'd' => $this->ModelPerbaikan->allData(),
            'labkom' => $this->ModelPerbaikan->dataLabkom(),
            'kategori' => $this->ModelPerbaikan->dataKategori()
        ];
        return view('perbaikan/v_index', $data);
    }

    public function add()
    {
        if ($this->validate([
            'id_labkom' => [
                'label' => 'Labkom',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'id_kategori_barang' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'id_barang' => [
                'label' => 'Barang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'tgl_barang_masuk' => [
                'label' => 'Tanggal barang masuk',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'kd_perolehan_brg' => [
                'label' => 'Sumber pengadaan barang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'catatan' => [
                'label' => 'Catatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
        ])) {
            //if valid
            $data = [
                'id_labkom' => $this->request->getPost('id_labkom'),
                'id_kategori_barang' => $this->request->getPost('id_kategori_barang'),
                'id_barang' => $this->request->getPost('id_barang'),
                'tgl_barang_masuk' => $this->request->getPost('tgl_barang_masuk'),
                'kd_perolehan_brg' => $this->request->getPost('kd_perolehan_brg'),
                'kondisi' => $this->request->getPost('kondisi'),
                'catatan' => $this->request->getPost('catatan'),
                'status' => $this->request->getPost('status'),
            ];
            $this->ModelPerbaikan->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('pengelolaan'));
        } else {
            //if not valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('pengelolaan'));
        }
    }

    public function edit($id)
{
    $data = [
        'title' => 'Edit Data',
        'd' => $this->ModelPerbaikan->detailData($id) // Ambil data spesifik
    ];

    return view('pengelolaan/v_edit', $data);
}

public function update($id)
{
    if ($this->validate([
        'kondisi' => [
            'label' => 'Kondisi Barang',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Wajib diisi!'
            ]
        ],
        'tgl_barang_keluar' => [
            'label' => 'Tanggal Barang Keluar',
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
            'kondisi' => $this->request->getPost('kondisi'),
            'tgl_barang_keluar' => $this->request->getPost('tgl_barang_keluar'),
            'catatan' => $this->request->getPost('catatan'),
        ];

        $this->ModelPerbaikan->edit($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(base_url('pengelolaan'));
    } else {
        // Jika tidak valid
        session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        return redirect()->to(base_url('pengelolaan/edit/' . $id));
    }
}

    public function delete($id)
    {
        $data = [
            'id' => $id,
        ];
        $this->ModelPerbaikan->deleteData($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('pengelolaan'));
    }

    public function getBarangByKategori($id_kategori_barang)
    {
        $data_barang = $this->ModelPerbaikan->getBarangByKategori($id_kategori_barang);
        return $this->response->setJSON($data_barang);
    }

    public function verifAdmin($id)
    {
        $data = [
            'id' => $id,
            'status' => 2
        ];
        $this->ModelPerbaikan->verifAdmin($data);
        session()->setFlashdata('pesan', 'Pengajuan Perbaikan Barang Berhasil Dikirim');
        echo "<script>history.go(-1);</script>";
        exit();
    }

}
