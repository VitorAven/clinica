<?php

class Banner_model extends CI_Model {

    function listarTodos() {
        unset($query);
        $this->db->where('ativo', 1);
        $query = $this->db->get('banners')->result_array();

        return $query;
    }

    function listar($usuario) {
        unset($query);

        $this->db->where('id', $usuario);
        $query = $this->db->get('banners')->row();

        return $query;
    }

}

?>