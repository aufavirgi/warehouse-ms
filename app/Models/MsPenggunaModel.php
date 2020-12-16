<?php namespace App\Models;
 
use CodeIgniter\Model;

class MsPenggunaModel extends Model
{
    protected $table = "ms_pengguna";
    public function getPengguna($id = false)
    {
        // $builder = $this->db->table('ms_pengguna');
        // $sql = "select pen_npk, pen_nama, pen_role, 
        // pen_password, pen_status FROM ms_pengguna";
        if($id === false){
            // return $builder->get()->getRowArray();
            // return $this->table('ms_pengguna')
            //             ->get()
            //             ->getResultArray();
            $builder = $this->db->table('ms_pengguna');
            $builder->select('*');
            $where = 'pen_status = 1';
            $session = session();
            $builder->where('pen_npk !=' .$session->get('pen_npk'));
            $builder->where($where);
            return $builder->get();
        } else {
            return $this->table('ms_pengguna')
                        ->where('pen_npk', $id)
                        ->get()
                        ->getRowArray();
        }   
    }
    
    public function insert_pengguna($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function update_pengguna($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['pen_npk' => $id]);
    }

    public function deactivate_pengguna($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['pen_npk' => $id]);
    }
}