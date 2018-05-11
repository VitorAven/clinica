<?php

class Medico_model extends CI_Model {

    public function salvar($post) {
        unset($query);

        $medico = array();
        $funcionario = array();
        try {
           


            $this->load->model('pessoa_model', 'pessoa');
            $id_pessoa = $this->pessoa->adicionarPessoa($post);
            $post['id_pessoa'] = $id_pessoa;

            $this->load->model('funcionario_model', 'funcionario');
            $this->funcionario->adicionarFuncionario($post);

            $this->adicionarMedico($post);

            return $id_pessoa;
        } catch (Exception $exc) {
            return null;
        }
    }

    public function getEspecialidades($params = array()) {
        
    }

    public function adicionarMedico($param) {
        $this->db->start_cache();
//Adiciona o medico na tabela de medicos
        if (!empty($param['id_pessoa'])) {
            $medico['id_pessoa'] = $param['id_pessoa'];
        }
        if (!empty($post['nr_crm'])) {
            $medico['nr_crm'] = $post['nr_crm'];
        }
        if (!empty($post['id_especialidade1'])) {
            $medico['id_especialidade1'] = $post['id_especialidade1'];
        }
        if (!empty($post['id_especialidade2'])) {
            $medico['id_especialidade2'] = $post['id_especialidade2'];
        }



        if (!empty($post['id_pessoa'])) {
            $this->db->where('id_pessoa = ' . $post['id_pessoa']);
            $query = $this->db->update('tb_medico', $medico);
        } else {
            $query = $this->db->insert('tb_medico', $medico);
        }
        $this->db->stop_cache();
        $this->db->flush_cache();
    }

    public function listarTodosMedicos() {
        unset($query);
        $this->db->select("tb_pessoa.*, tb_medico.*, tb_funcionario.*");
        $this->db->from("tb_pessoa");
        $this->db->join("tb_medico", "tb_medico.id_pessoa = tb_pessoa.id_pessoa");
        $this->db->join("tb_funcionario", "tb_funcionario.id_pessoa = tb_pessoa.id_pessoa");
        $query = $this->db->get()->result_array();
        /* print_r($this->db->last_query());
          die(); */
        return $query;
    }

    public function excluir($id_pessoa) {
        try {
            if (empty($id_pessoa)) {
                throw new Exception('Infome um id');
            }
            //exclui a medico
            $this->db->start_cache();
            $this->db->where('id_pessoa', $id_pessoa);
            $query = $this->db->delete('tb_medico');
            $this->db->stop_cache();
            $this->db->flush_cache();

            //quanto se exclui um medico so deleta as informaçoes de medico
            /*
              //exclui a Funcionario
              $this->db->start_cache();
              $this->db->where('id_pessoa', $id_pessoa);
              $query = $this->db->delete('tb_funcionario');
              $this->db->stop_cache();
              $this->db->flush_cache();


              //exclui a pessoa
              $this->db->start_cache();
              $this->db->where('id_pessoa', $id_pessoa);
              $query = $this->db->delete('pessoa');
              $this->db->stop_cache();
              $this->db->flush_cache();
             */
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $query;
    }

    function listarMedico($id_pessoa) {
        unset($query);
        $this->db->select("tb_pessoa.*, tb_medico.*, tb_funcionario.*");
        $this->db->from("tb_pessoa");
        $this->db->join("tb_medico", "tb_medico.id_pessoa = tb_pessoa.id_pessoa", 'left');
        $this->db->join("tb_funcionario", "tb_funcionario.id_pessoa = tb_pessoa.id_pessoa", 'left');
        $this->db->where('tb_pessoa.id_pessoa = ' . $id_pessoa);
        $query = $this->db->get()->result_array();
        $query = current($query);
        /* print_r($this->db->last_query());
          die(); */
        return $query;
    }
    public function getMedicoByIdPessoa($id_pessoa) {
        if(empty($id_pessoa)){
            return null;
        }
        unset($query);
        $this->db->select("tb_medico.*");
        $this->db->from("tb_medico");
        $this->db->where("tb_medico.id_pessoa = ".$id_pessoa);
        $query = $this->db->get()->result_array();
        /* print_r($this->db->last_query());
          die(); */
        return $query;
    }

    public function getMedicoByCpf($tx_cpf) {
         if (empty($tx_cpf)) {
            return null;
        }
        unset($query);
        $this->db->select("tb_medico.*, tb_pessoa.*");
        $this->db->from("tb_medico");
        $this->db->join("tb_pessoa", "tb_medico.id_pessoa = tb_pessoa.id_pessoa");
        $this->db->where("tb_pessoa.tx_cpf LIKE '" .$tx_cpf."'");
        $query = $this->db->get()->result_array();
        /* print_r($this->db->last_query());
          die(); */
        return $query;
    }

}


?>