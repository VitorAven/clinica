<?php

class Galeria_model extends CI_Model {

    function listarTodos() {
        unset($query);
        $this->db->where('ativo', 1);
        $query = $this->db->get('galeria')->result_array();

        return $query;
    }

    function listarTodasImg($id) {
        unset($query);

        $this->db->where('id_galeria', $id);
        $query = $this->db->get('imagens')->result_array();

        return $query;
    }

    function listarImg($id) {
        unset($query);

        $this->db->where('id', $id);
        $query = $this->db->get('imagens')->row();

        return $query;
    }

    function listar($id) {
        unset($query);

        $this->db->where('id', $id);
        $query = $this->db->get('galeria')->row();

        return $query;
    }

}

?>