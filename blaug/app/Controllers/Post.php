<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;

defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends ResourcePresenter
{
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function __construct() {
        parent::__construct(); 
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Post_model', 'post');
   
     }
    public function index()
    {
        $data['posts'] = $this->post->get_all();
        $data['title'] = "CodeIgniter post Manager";
        $this->load->view('layout/header');       
        $this->load->view('post/index',$data);
        $this->load->view('layout/footer');
    }

    /**
     * Present a view to present a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show($id)
    {

        $data['post'] = $this->post->get($id);
        $data['title'] = "Show post";
        $this->load->view('layout/header');
        $this->load->view('post/show', $data);
        $this->load->view('layout/footer'); 
    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        $data['title'] = "Create Post";
        $this->load->view('layout/header');
        $this->load->view('post/create',$data);
        $this->load->view('layout/footer');
    }
    public function store()
  {
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('description', 'Description', 'required');
 
    if (!$this->form_validation->run())
    {
        $this->session->set_flashdata('errors', validation_errors());
        redirect(base_url('post/create'));
    }
    else
    {
       $this->post->store();
       $this->session->set_flashdata('success', "Saved Successfully!");
       redirect(base_url('post'));
    }
 
  }
 

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id)
    {
        //

        $data['post'] = $this->post->get($id);
        $data['title'] = "Edit Post";
        $this->load->view('layout/header');
        $this->load->view('post/edit', $data);
        $this->load->view('layout/footer'); 
    }

    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function update($id)
    {
        this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('description', 'Description', 'required');
 
    if (!$this->form_validation->run())
    {
        $this->session->set_flashdata('errors', validation_errors());
        redirect(base_url('post/edit/' . $id));
    }
    else
    {
       $this->post->update($id);
       $this->session->set_flashdata('success', "Updated Successfully!");
       redirect(base_url('post'));
    }
        
    
    }

    /**
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id = null)
    {
        //
    }

    /**
     * Process the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        $item = $this->post->delete($id);
        $this->session->set_flashdata('success', "Deleted Successfully!");
        redirect(base_url('post'));
    }
}
