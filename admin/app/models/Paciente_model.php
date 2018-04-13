<?php

class Paciente_model extends CI_Model {

    function salvar($param) {
        unset($query);
        $pessoa = array();
        try {
             $this->load->model('pessoa_model', 'pessoa');
            $id_pessoa = $this->pessoa->adicionarPessoa($param);
            
            $param['id_pessoa'] = $id_pessoa;
            $this->adicionarPaciente($param);
            
            return $id_pessoa;
        } catch (Exception $exc) {
            return $exc;
        }
    }
     public function listarTodosPacientes() {
        unset($query);
        $this->db->select("tb_pessoa.*, tb_paciente.*");
        $this->db->from("tb_paciente");
        $this->db->join("tb_pessoa", "tb_paciente.id_pessoa = tb_pessoa.id_pessoa");
        $query = $this->db->get()->result_array();
        /* print_r($this->db->last_query());
          die(); */
        return $query;
    }
    public function listarPaciente($id_pessoa) {
        unset($query);
        $this->db->select("tb_pessoa.*, tb_paciente.*");
        $this->db->from("tb_paciente");
        $this->db->join("tb_pessoa", "tb_pessoa.id_pessoa = tb_paciente.id_pessoa", "left");

        $this->db->where('tb_pessoa.id_pessoa', $id_pessoa);
        $query = $this->db->get()->row();

        return $query;
    }


    function getPacienteByCpf($tx_cpf) {
        if (empty($tx_cpf)) {
            return null;
        }
        unset($query);
        $this->db->select("tb_paciente.*, tb_pessoa.*");
        $this->db->from("tb_paciente");
        $this->db->join("tb_pessoa", "tb_paciente.id_pessoa = tb_pessoa.id_pessoa");
        $this->db->where("tb_pessoa.tx_cpf LIKE '" . $tx_cpf . "'");
        $query = $this->db->get()->result_array();
        /* print_r($this->db->last_query());
          die(); */
        return $query;
    }

    public function getPacienteByIdPessoa($id_pessoa) {
        if (empty($id_pessoa)) {
            return null;
        }
        unset($query);
        $this->db->select("tb_paciente.*");
        $this->db->from("tb_paciente");
        $this->db->where("tb_paciente.id_pessoa = " . $id_pessoa);
        $query = $this->db->get()->result_array();
        /* print_r($this->db->last_query());
          die(); */
        return $query;
    }

    public function adicionarPaciente($param) {
        $this->db->start_cache();
//Adiciona o medico na tabela de medicos
        if (!empty($param['id_pessoa'])) {
            $paciente['id_pessoa'] = $param['id_pessoa'];
        }
        if (!empty($param['tx_bairro'])) {
            $paciente['tx_bairro'] = $param['tx_bairro'];
        }
        if (!empty($param['tx_endereco'])) {
            $paciente['tx_endereco'] = $param['tx_endereco'];
        }
        if (!empty($param['id_cidade'])) {
            $paciente['id_cidade'] = $param['id_cidade'];
        }
        if (!empty($param['id_estado'])) {
            $paciente['id_estado'] = $param['id_estado'];
        }
        if (!empty($param['tx_telefone'])) {
            $paciente['tx_telefone'] = $param['tx_telefone'];
        }
        if (!empty($param['nr_endereco'])) {
            $paciente['nr_endereco'] = $param['nr_endereco'];
        }

        if (!empty($param['id_pessoa'])) {
            $pacPessoa = $this->getPacienteByIdPessoa($param['id_pessoa']);

            if (!empty($pacPessoa)) {
                $this->db->where('id_pessoa = ' . $param['id_pessoa']);
                $query = $this->db->update('tb_paciente', $paciente);
            } else {
                $query = $this->db->insert('tb_paciente', $paciente);
            }
        } else {
            $query = $this->db->insert('tb_paciente', $paciente);
        }
        
        
        
        $this->db->stop_cache();
        $this->db->flush_cache();
    }
}

?>