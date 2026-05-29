<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Pasien extends Model
{
    protected $table = 'tbl_pasien';

    public function getDataPasien($where = false)
    {
        if ($where === false) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->orderBy('nama_pasien', 'ASC');
            return $query = $builder->get();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where($where);
            $builder->orderBy('nama_pasien', 'ASC');
            return $query = $builder->get();
        }
    }

    public function saveDataPasien($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateDataPasien($data, $where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);
        return $builder->update($data);
    }

    public function autoNumber()
    {
        $builder = $this->db->table($this->table);
        $builder->select("id_pasien");
        $builder->orderBy("id_pasien", "DESC");
        $builder->limit(1);
        return $query = $builder->get();
    }
}
