<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterKeprog implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // situasi jika user belum login
        if (session()->get('username') == '') {
            session()->setFlashdata('pesan', 'Silahkan Login terlebih dahulu');
            return redirect()->to(base_url('auth'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        if (session()->get('level') == 2) {
            return redirect()->to(base_url('keprog'));
        }
    }
}
?>