<?php 
 
namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\MsRakModel;
use App\Models\MsSektorModel;
 
class Rak extends Controller
{
 
    public function __construct() {
 
        // Mendeklarasikan class MsPenggunaModel menggunakan $this->product
        $this->rak = new MsRakModel();
        $this->sektor = new MsSektorModel();
        /* Catatan:
        Apa yang ada di dalam function construct ini nantinya bisa digunakan
        pada function di dalam class Product 
        */
    }
 
    public function index()
    {
        $data['rak'] = $this->rak->getRak()->getResult();
        echo view('rak/index', $data);
    }
    
    public function create()
    {
        $data['sektor'] = $this->sektor->getSektor()->getResult();
        return view('rak/create', $data);
    } 

    public function store()
    {
        // Mengambil value dari form dengan method POST
        $rak_sektor = $this->request->getPost('rak_sektor');
        $rak_nama = $this->request->getPost('rak_nama');
        $rak_max_capacity = $this->request->getPost('rak_max_capacity');
    
        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'rak_sektor' => $rak_sektor,
            'rak_nama' => $rak_nama,
            'rak_max_capacity' => $rak_max_capacity,
            'rak_jml_isi' => 0,
            'rak_status' => 1
        ];
    
        /* 
        Membuat variabel simpan yang isinya merupakan memanggil function 
        insert_pengguna dan membawa parameter data 
        */
        $simpan = $this->rak->insert_rak($data);
    
        // Jika simpan berhasil, maka ...
        if($simpan)
        {
            // Deklarasikan session flashdata dengan tipe success
            session()->setFlashdata('success', 'Data Rak Berhasil Disimpan!');
            // Redirect halaman ke product
            return redirect()->to(base_url('rak')); 
        }
    }
    
    public function edit($id)
    {
        // Memanggil function getPengguna($id) dengan parameter $id di dalam ProductModel dan menampungnya di variabel array product
        $data['rak'] = $this->rak->getRak($id);
        $data['sektor'] = $this->sektor->getSektor()->getResult();
        // Mengirim data ke dalam view
        return view('rak/edit', $data);
    }
    
    public function update($id)
    {
        // Mengambil value dari form dengan method POST
        // $npk = $this->request->getPost('pen_npk');
        $rak_sektor = $this->request->getPost('rak_sektor');
        $rak_nama = $this->request->getPost('rak_nama');
        $rak_max_capacity = $this->request->getPost('rak_max_capacity');
    
        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'rak_sektor' => $rak_sektor,
            'rak_nama' => $rak_nama,
            'rak_max_capacity' => $rak_max_capacity
        ];
    
        /* 
        Membuat variabel ubah yang isinya merupakan memanggil function 
        update_product dan membawa parameter data beserta id
        */
        $ubah = $this->rak->update_rak($data, $id);
        
        // Jika berhasil melakukan ubah
        if($ubah)
        {
            // Deklarasikan session flashdata dengan tipe info
            session()->setFlashdata('info', 'Data Rak Berhasil Diubah!');
            // Redirect ke halaman product
            return redirect()->to(base_url('rak')); 
        }
    }

    public function deactivate($id)
    {
        // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
        $data = [
            'rak_status' => 0
        ];
        $hapus = $this->rak->deactivate_rak($data, $id);
    
        // Jika berhasil melakukan hapus
        if($hapus)
        {
                // Deklarasikan session flashdata dengan tipe warning
            session()->setFlashdata('warning', 'Rak Berhasil Dinon-aktifkan!');
            // Redirect ke halaman product
            return redirect()->to(base_url('rak'));
        }
    } 
}