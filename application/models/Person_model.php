<?php
class Person_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_people() {
        $query = $this->db->get('people');
        return $query->result();
    }

    public function get_person($id) {
        $query = $this->db->get_where('people', array('id' => $id));
        return $query->row();
    }

    public function create_person($data) {
        $this->db->insert('people', $data);
    }

    public function update_person($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('people', $data);
    }

    public function delete_person($id) {
        $this->db->where('id', $id);
        $this->db->delete('people');
    }
}
