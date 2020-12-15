<?php namespace App\Models;
 
use CodeIgniter\Model;

class MsSektorModel extends Model
{
    protected $table = "ms_sektor";
    public function getSektor($id = false)
    {
        // $builder = $this->db->table('ms_pengguna');
        // $sql = "select pen_npk, pen_nama, pen_role, 
        // pen_password, pen_status FROM ms_pengguna";
        if($id === false){
            // return $builder->get()->getRowArray();
            // return $this->table('ms_pengguna')
            //             ->get()
            //             ->getResultArray();
            $builder = $this->db->table('ms_sektor');
            $builder->select('*');
            $where = 'sek_status = 1';
            $builder->where($where);
            return $builder->get();
        } else {
            return $this->table('ms_sektor')
                        ->where('sek_id', $id)
                        ->get()
                        ->getRowArray();
        }   
    }
    
    public function insert_sektor($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function update_sektor($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['sek_id' => $id]);
    }

    public function deactivate_sektor($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['sek_id' => $id]);
    }
}