<?php

class Especialidade_model extends CI_Model {

    function adicionarEspecialidades($post) {
        unset($query);
        try {
            if (!empty($post['tx_nomeespecialidade'])) {
                $especialidade['tx_nomeespecialidade'] = $post['tx_nomeespecialidade'];
            } else {
                $error = 'Campo nome especialidade não informado';
                throw new Exception($error);
            }
            $query = $this->db->insert('tb_especialidade', $especialidade);
            $especialidadeLast = $insert_id = $this->db->insert_id();
            return $especialidadeLast;
        } catch (Exception $exc) {
            return $exc;
        }
    }

    function getAllEspecialidade() {
        unset($query);
        try {
            $this->db->select("tb_especialidade.*");
            $this->db->from("tb_especialidade");
            $query = $this->db->get()->result_array();
            return $query;
        } catch (Exception $exc) {
            return $exc;
        }
    }

}

?>