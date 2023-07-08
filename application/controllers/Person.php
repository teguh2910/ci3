<?php
class Person extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('person_model');
    }

    public function index() {
        $data['people'] = $this->person_model->get_people();
        $this->load->view('person/index', $data);
    }

    public function create() {
        $this->load->view('person/create');
    }

    public function store() {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone')
        );
        $this->person_model->create_person($data);
        redirect('person/index');
    }

    public function edit($id) {
        $data['person'] = $this->person_model->get_person($id);
        $this->load->view('person/edit', $data);
    }

    public function update($id) {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone')
        );
        $this->person_model->update_person($id, $data);
        redirect('person/index');
    }

    public function delete($id) {
        $this->person_model->delete_person($id);
        redirect('person/index');
    }
}
