<?php 
 
namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\MsPenggunaModel;
 
class Pengguna extends Controller
{
 
    public function __construct() {
 
        // Mendeklarasikan class MsPenggunaModel menggunakan $this->product
        $this->pengguna = new MsPenggunaModel();
        /* Catatan:
        Apa yang ada di dalam function construct ini nantinya bisa digunakan
        pada function di dalam class Product 
        */
    }
 
    public function index()
    {
        $data['pengguna'] = $this->pengguna->getPengguna()->getResult();
        echo view('pengguna/index', $data);
    }
    
    public function create()
    {
        return view('pengguna/create');
    } 

    public function store()
    {
        // Mengambil value dari form dengan method POST
        $npk = $this->request->getPost('pen_npk');
        $nama = $this->request->getPost('pen_nama');
        $role = $this->request->getPost('pen_role');
        $pass = $this->request->getPost('pen_password');
    
        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'pen_npk' => $npk,
            'pen_nama' => $nama,
            'pen_role' => $role,
            'pen_password' => $pass,
            'pen_status' => 1
        ];
    
        /* 
        Membuat variabel simpan yang isinya merupakan memanggil function 
        insert_pengguna dan membawa parameter data 
        */
        $simpan = $this->pengguna->insert_pengguna($data);
    
        // Jika simpan berhasil, maka ...
        if($simpan)
        {
            // Deklarasikan session flashdata dengan tipe success
            session()->setFlashdata('success', 'Data Pengguna Berhasil Disimpan!');
            // Redirect halaman ke product
            return redirect()->to(base_url('pengguna')); 
        }
    }
    
    public function edit($id)
    {
        // Memanggil function getPengguna($id) dengan parameter $id di dalam ProductModel dan menampungnya di variabel array product
        $data['pengguna'] = $this->pengguna->getPengguna($id);
        // Mengirim data ke dalam view
        return view('pengguna/edit', $data);
    }
    
    public function update($id)
    {
        // Mengambil value dari form dengan method POST
        // $npk = $this->request->getPost('pen_npk');
        $nama = $this->request->getPost('pen_nama');
        $role = $this->request->getPost('pen_role');
        $pass = $this->request->getPost('pen_password');
    
        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'pen_nama' => $nama,
            'pen_role' => $role,
            'pen_password' => $pass,
            'pen_status' => 1
        ];
    
        /* 
        Membuat variabel ubah yang isinya merupakan memanggil function 
        update_product dan membawa parameter data beserta id
        */
        $ubah = $this->pengguna->update_pengguna($data, $id);
        
        // Jika berhasil melakukan ubah
        if($ubah)
        {
            // Deklarasikan session flashdata dengan tipe info
            session()->setFlashdata('info', 'Data Pengguna Berhasil Diubah!');
            // Redirect ke halaman product
            return redirect()->to(base_url('pengguna')); 
        }
    }

    public function deactivate($id)
    {
        // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
        $data = [
            'pen_status' => 0
        ];
        $hapus = $this->pengguna->deactivate_pengguna($data, $id);
    
        // Jika berhasil melakukan hapus
        if($hapus)
        {
                // Deklarasikan session flashdata dengan tipe warning
            session()->setFlashdata('warning', 'Pengguna Berhasil Dinon-aktifkan!');
            // Redirect ke halaman product
            return redirect()->to(base_url('pengguna'));
        }
    } 
}