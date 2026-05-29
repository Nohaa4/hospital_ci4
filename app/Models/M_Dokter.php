<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Dokter extends Model
{
    protected $table = 'tbl_dokter';

    public function getDataDokter($where = false)
    {
        if ($where === false) {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->orderBy('nama_dokter', 'ASC');
            return $query = $builder->get();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where($where);
            $builder->orderBy('nama_dokter', 'ASC');
            return $query = $builder->get();
        }
    }

    public function saveDataDokter($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateDataDokter($data, $where)
    {
        $builder = $this->db->table($this->table);
        $builder->where($where);
        return $builder->update($data);
    }

    public function autoNumber()
    {
        $builder = $this->db->table($this->table);
        $builder->select("id_dokter");
        $builder->orderBy("id_dokter", "DESC");
        $builder->limit(1);
        return $query = $builder->get();
    }
}
