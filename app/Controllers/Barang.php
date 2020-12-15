<?php 
 
namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\MsBarangModel;
 
class Barang extends Controller
{
 
    public function __construct() {
 
        // Mendeklarasikan class MsPenggunaModel menggunakan $this->product
        $this->barang = new MsBarangModel();
        /* Catatan:
        Apa yang ada di dalam function construct ini nantinya bisa digunakan
        pada function di dalam class Product 
        */
    }
 
    public function index()
    {
        $data['barang'] = $this->barang->getBarang()->getResult();
        echo view('barang/index', $data);
    }
    
    public function create()
    {
        return view('barang/create');
    } 

    public function store()
    {
        // Mengambil value dari form dengan method POST
        $nama = $this->request->getPost('bar_nama');
        $kategori = $this->request->getPost('bar_kategori');
    
        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'bar_nama' => $nama,
            'bar_kategori' => $kategori,
            'bar_stok' => 0,
            'bar_status' => 1
        ];
    
        /* 
        Membuat variabel simpan yang isinya merupakan memanggil function 
        insert_pengguna dan membawa parameter data 
        */
        $simpan = $this->barang->insert_barang($data);
    
        // Jika simpan berhasil, maka ...
        if($simpan)
        {
            // Deklarasikan session flashdata dengan tipe success
            session()->setFlashdata('success', 'Data Barang Berhasil Disimpan!');
            // Redirect halaman ke product
            return redirect()->to(base_url('barang')); 
        }
    }
    
    public function edit($id)
    {
        // Memanggil function getPengguna($id) dengan parameter $id di dalam ProductModel dan menampungnya di variabel array product
        $data['barang'] = $this->barang->getBarang($id);
        // Mengirim data ke dalam view
        return view('barang/edit', $data);
    }
    
    public function update($id)
    {
        // Mengambil value dari form dengan method POST
        // $npk = $this->request->getPost('pen_npk');
        $nama = $this->request->getPost('bar_nama');
        $kategori = $this->request->getPost('bar_kategori');
    
        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'bar_nama' => $nama,
            'bar_kategori' => $kategori,
            'bar_status' => 1
        ];
    
        /* 
        Membuat variabel ubah yang isinya merupakan memanggil function 
        update_product dan membawa parameter data beserta id
        */
        $ubah = $this->barang->update_barang($data, $id);
        
        // Jika berhasil melakukan ubah
        if($ubah)
        {
            // Deklarasikan session flashdata dengan tipe info
            session()->setFlashdata('info', 'Data Barang Berhasil Diubah!');
            // Redirect ke halaman product
            return redirect()->to(base_url('barang')); 
        }
    }

    public function deactivate($id)
    {
        // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
        $data = [
            'bar_status' => 0
        ];
        $hapus = $this->barang->deactivate_barang($data, $id);
    
        // Jika berhasil melakukan hapus
        if($hapus)
        {
                // Deklarasikan session flashdata dengan tipe warning
            session()->setFlashdata('warning', 'Barang Berhasil Dinon-aktifkan!');
            // Redirect ke halaman product
            return redirect()->to(base_url('barang'));
        }
    } 
}