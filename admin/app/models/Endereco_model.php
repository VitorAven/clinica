<?php

class Endereco_model extends CI_Model {

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

    function getAllEstados() {
        unset($query);
        try {
            $this->db->select("tb_estados.*");
            $this->db->from("tb_estados");
            $query = $this->db->get()->result_array();
            return $query;
        } catch (Exception $exc) {
            return $exc;
        }
    }

    function getCidadesByUf($id_estado) {
        unset($query);
        $this->db->select("tb_municipio.*");
        $this->db->from("tb_municipio");
        $this->db->where('tb_municipio.id_estado =' . $id_estado);
        $this->db->order_by('tb_municipio.tx_nome');
        $query = $this->db->get()->result_array();
        
        return $query;
    }

}

?>