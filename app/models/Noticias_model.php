<?php

class Noticias_model extends CI_Model {

    function listarTodos() {
        unset($query);
        $this->db->where('ativo', 1);
        $query = $this->db->get('noticias')->result_array();

        return $query;
    }

    function listar($id) {
        unset($query);

        $this->db->where('id', $id);
        $query = $this->db->get('noticias')->row();

        return $query;
    }

}

?>