<?php

namespace App\Controllers;

use App\Models\ModelBarang;

use App\Controllers\BaseController;

class Barang extends BaseController
{
    protected $ModelBarang;

    public function __construct()
    {
        helper('form');
        $this->ModelBarang = new ModelBarang();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Barang',
            'd' => $this->ModelBarang->allData(),
            'kategori' => $this->ModelBarang->dataKategori()
        ];
        return view('barang/v_index', $data);
    }

    // public function add()
    // {
    //     if ($this->validate([
    //         'id_kategori_barang' => [
    //             'label' => 'Kategori Barang',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Wajib diisi!',
    //             ]
    //         ],
    //         'nama_barang' => [
    //             'label' => 'Nama Barang',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Wajib diisi!',
    //             ]
    //         ],
    //         'kode_barang' => [
    //             'label' => 'Kode Barang',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} Wajib diisi!',
    //             ]
    //         ],
    //         'foto' => [
    //         'label' => 'Foto',
    //         'rules' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2048]',
    //         'errors' => [
    //             'uploaded' => '{field} Wajib diisi!',
    //             'is_image' => '{field} Harus berupa gambar!',
    //             'mime_in' => '{field} Harus berupa gambar dengan format jpg, jpeg, gif, atau png!',
    //             'max_size' => '{field} Ukuran maksimal 2MB!',
    //         ]
    //     ],
    //     ])) {
    //         //if valid
    //         $foto = $this->request->getFile('foto');
    //         $fotoName = $foto->getRandomName(); // Generate a random name for the file
    //         $foto->move('foto', $fotoName); 

    //         $data = [
    //             'id_kategori_barang' => $this->request->getPost('id_kategori_barang'),
    //             'nama_barang' => $this->request->getPost('nama_barang'),
    //             'kode_barang' => $this->request->getPost('kode_barang'),
    //             'foto' => $fotoName,
    //         ];
    //         $this->ModelBarang->add($data);
    //         session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
    //         return redirect()->to(base_url('barang'));
    //     } else {
    //         //if not valid
    //         session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
    //         return redirect()->to(base_url('barang'));
    //     }
    // }

    public function add()
{
    if ($this->validate([
        'id_kategori_barang' => [
            'label' => 'Kategori Barang',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Wajib diisi!',
            ]
        ],
        'nama_barang' => [
            'label' => 'Nama Barang',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Wajib diisi!',
            ]
        ],
        'kode_barang' => [
            'label' => 'Kode Barang',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Wajib diisi!',
            ]
        ],
        'foto' => [
            'label' => 'Foto',
            'rules' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2048]',
            'errors' => [
                'uploaded' => '{field} Wajib diisi!',
                'is_image' => '{field} Harus berupa gambar!',
                'mime_in' => '{field} Harus berupa gambar dengan format jpg, jpeg, gif, atau png!',
                'max_size' => '{field} Ukuran maksimal 2MB!',
            ]
        ],
    ])) {
        // If valid
        $foto = $this->request->getFile('foto');
        $fotoName = $foto->getRandomName(); // Generate a random name for the file
        $foto->move('foto', $fotoName); // Move the file to the 'foto' directory

        $data = [
            'id_kategori_barang' => $this->request->getPost('id_kategori_barang'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'kode_barang' => $this->request->getPost('kode_barang'),
            'foto' => $fotoName, // Save the filename in the database
        ];
        $this->ModelBarang->add($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('barang'));
    } else {
        // If not valid
        session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        return redirect()->to(base_url('barang'));
    }
}

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Labkom',
            'data' => $this->ModelBarang->allData(),
            'd' => $this->ModelBarang->detailData($id)
        ];
        return view('barang/v_edit', $data);
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
            $this->ModelBarang->edit($data);
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
        $this->ModelBarang->deleteData($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('barang'));
    }

}
