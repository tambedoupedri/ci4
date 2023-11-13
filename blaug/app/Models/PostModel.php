<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
    public function get_all()
    {
        $posts = $this->db->get("posts")->result();
        return $posts;
    }
    public function store()
    {    
        $data = [
            'name'        => $this->input->post('name'),
            'description' => $this->input->post('description')
        ];
 
        $result = $this->db->insert('posts', $data);
        return $result;
    }
    public function get($id)
    {
        $post = $this->db->get_where('posts', ['id' => $id ])->row();
        return $post;
    }
    
    public function update($id) 
    {
        $data = [
            'name'        => $this->input->post('name'),
            'description' => $this->input->post('description')
        ];
 
        $result = $this->db->where('id',$id)->update('posts',$data);
        return $result;
                 
    }

    public function delete($id)
    {
        $result = $this->db->delete('posts', array('id' => $id));
        return $result;
    }



    protected $DBGroup          = 'default';
    protected $table            = 'posts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'description'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = ['name' => 'required',
    'description' => 'required',];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
