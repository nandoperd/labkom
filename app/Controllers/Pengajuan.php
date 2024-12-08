<?php

namespace App\Controllers;

use App\Models\ModelPengajuan;
use App\Models\ModelPengelolaan;

use App\Controllers\BaseController;

class Pengajuan extends BaseController
{
    protected $ModelPengajuan;
    protected $ModelPengelolaan;

    public function __construct()
    {
        helper('form');
        $this->ModelPengajuan = new ModelPengajuan();
        $this->ModelPengelolaan = new ModelPengelolaan();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Pengelolaan Barang',
            'd' => $this->ModelPengajuan->allData(),
            'labkom' => $this->ModelPengajuan->dataLabkom(),
            'kategori' => $this->ModelPengajuan->dataKategori(),
            'dataBarang' => $this->ModelPengelolaan->allData()
        ];
        return view('pengajuan/v_index', $data);
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
                'label' => 'Kategori barang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'nama_barang' => [
                'label' => 'Nama barang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'kode_barang' => [
                'label' => 'Nama barang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'tgl_barang_masuk' => [
                'label' => 'Tanggal pengajuan',
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
                'nama_barang' => $this->request->getPost('nama_barang'),
                'kode_barang' => $this->request->getPost('kode_barang'),
                'tgl_barang_masuk' => $this->request->getPost('tgl_barang_masuk'),
                'kd_perolehan_brg' => $this->request->getPost('kd_perolehan_brg'),
                'catatan' => $this->request->getPost('catatan'),
                'status' => $this->request->getPost('status')
            ];
            $this->ModelPengajuan->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('pengajuan'));
        } else {
            //if not valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('pengajuan'));
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Labkom',
            'data' => $this->ModelPengajuan->allData(),
            'd' => $this->ModelPengajuan->detailData($id)
        ];
        return view('pengajuan/v_edit', $data);
    }

    public function update($id)
    {
        if ($this->validate([
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ]
            ],
        ])) {
            $data = array(
                'id' => $id,
                'nama' => $this->request->getPost('nama'),
            );
            $this->ModelPengajuan->edit($data);
            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('data'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('data/edit/' . $id));
        }
    }

    public function delete($id)
    {
        $data = [
            'id' => $id,
        ];
        $this->ModelPengajuan->deleteData($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('pengajuan'));
    }

    public function verifData($id)
    {
        $dataPengajuan = $this->ModelPengajuan->detailData($id);

        if ($dataPengajuan) {
            $dataBarang = [
                'id_kategori_barang' => $dataPengajuan['id_kategori_barang'],
                'nama_barang' => $dataPengajuan['nama_barang'],
                'kode_barang' => $dataPengajuan['kode_barang'],
            ];

            $this->ModelPengajuan->addDataBarang($dataBarang);

            $this->ModelPengajuan->updateStatus($id, 6);

            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        } else {
            session()->setFlashdata('pesan', 'Data tidak ditemukan');
        }

        return redirect()->to(base_url('pengajuan'));
    }

}
