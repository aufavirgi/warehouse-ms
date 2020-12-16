<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\MsPenggunaModel;
 
class Login extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('login');
    } 
 
    public function auth()
    {
        $session = session();
        $model = new MsPenggunaModel();
        $npk = $this->request->getVar('pen_npk');
        $password = $this->request->getVar('pen_password');
        $data = $model->where('pen_npk', $npk)->where('pen_status', 1)->first(); //fungsi ini harusnya ada di model
        if($data){
            $pass = $data['pen_password'];
            // $verify_pass = password_verify($password, $pass); // fungsi ini dipakai apabila password di-hash terlebih dahulu

            if(strcmp($password, $pass)==0){
                $ses_data = [
                    'pen_npk'       => $data['pen_npk'],
                    'pen_nama'      => $data['pen_nama'],
                    'pen_role'      => $data['pen_role'],
                    'logged_in'     => TRUE
                ];
                $role=$data['pen_role'];
                $session->set($ses_data);
                switch ($role) {
                    case "Super Admin":
                        return redirect()->to('/dashboard/index');
                      break;
                    case "Admin Gudang":
                        return redirect()->to('/dashboard/admin');
                      break;
                    case "Receiver":
                        return redirect()->to('/dashboard/receiver');
                      break;
                    case "Dispatcher":
                        return redirect()->to('/dashboard/dispatcher');
                      break;
                    default:
                        return redirect()->to('/dashboard/index');
                  }
                
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/login');
        }
    }
 
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
} 