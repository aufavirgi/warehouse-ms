<?php 
 
namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\MsSektorModel;
 
class Sektor extends Controller
{
 
    public function __construct() {
 
        // Mendeklarasikan class MsPenggunaModel menggunakan $this->product
        $this->sektor = new MsSektorModel();
        /* Catatan:
        Apa yang ada di dalam function construct ini nantinya bisa digunakan
        pada function di dalam class Product 
        */
    }
 
    public function index()
    {
        $data['sektor'] = $this->sektor->getSektor()->getResult();
        echo view('sektor/index', $data);
    }
    
    public function create()
    {
        return view('sektor/create');
    } 

    public function store()
    {
        // Mengambil value dari form dengan method POST
        // $npk = $this->request->getPost('pen_npk');
        $nama = $this->request->getPost('sek_nama');
        $kategori = $this->request->getPost('sek_kategori');
    
        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'sek_nama' => $nama,
            'sek_kategori' => $kategori,
            'sek_status' => 1
        ];
    
        /* 
        Membuat variabel simpan yang isinya merupakan memanggil function 
        insert_pengguna dan membawa parameter data 
        */
        $simpan = $this->sektor->insert_sektor($data);
    
        // Jika simpan berhasil, maka ...
        if($simpan)
        {
            // Deklarasikan session flashdata dengan tipe success
            session()->setFlashdata('success', 'Data Sektor Berhasil Disimpan!');
            // Redirect halaman ke product
            return redirect()->to(base_url('sektor')); 
        }
    }
    
    public function edit($id)
    {
        // Memanggil function getPengguna($id) dengan parameter $id di dalam ProductModel dan menampungnya di variabel array product
        $data['sektor'] = $this->sektor->getSektor($id);
        // Mengirim data ke dalam view
        return view('sektor/edit', $data);
    }
    
    public function update($id)
    {
        // Mengambil value dari form dengan method POST
        // $npk = $this->request->getPost('pen_npk');
        $nama = $this->request->getPost('sek_nama');
        $kategori = $this->request->getPost('sek_kategori');
    
        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'sek_nama' => $nama,
            'sek_kategori' => $kategori,
            'sek_status' => 1
        ];
    
        /* 
        Membuat variabel ubah yang isinya merupakan memanggil function 
        update_product dan membawa parameter data beserta id
        */
        $ubah = $this->sektor->update_sektor($data, $id);
        
        // Jika berhasil melakukan ubah
        if($ubah)
        {
            // Deklarasikan session flashdata dengan tipe info
            session()->setFlashdata('info', 'Data Sektor Berhasil Diubah!');
            // Redirect ke halaman product
            return redirect()->to(base_url('sektor')); 
        }
    }

    public function deactivate($id)
    {
        // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
        $data = [
            'sek_status' => 0
        ];
        $hapus = $this->pengguna->deactivate_sektor($data, $id);
    
        // Jika berhasil melakukan hapus
        if($hapus)
        {
                // Deklarasikan session flashdata dengan tipe warning
            session()->setFlashdata('warning', 'Sektor Berhasil Dinon-aktifkan!');
            // Redirect ke halaman product
            return redirect()->to(base_url('sektor'));
        }
    } 
}