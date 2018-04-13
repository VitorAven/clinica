<?php

class Funcionario_model extends CI_Model {

    public function salvar($param) {
        unset($query);
        try {
            $this->load->model('pessoa_model', 'pessoa');
            $id_pessoa = $this->pessoa->adicionarPessoa($param);
            $param['id_pessoa'] = $id_pessoa;
            $this->adicionarFuncionario($param);
            return $id_pessoa;
        } catch (Exception $exc) {
            return null;
        }
    }

    public function listarTodosFuncionarios() {
        unset($query);
        $this->db->select("tb_pessoa.*, tb_funcionario.*");
        $this->db->from("tb_pessoa");
        $this->db->join("tb_funcionario", "tb_funcionario.id_pessoa = tb_pessoa.id_pessoa");
        $query = $this->db->get()->result_array();
        /* print_r($this->db->last_query());
          die(); */
        return $query;
    }

    public function adicionarFuncionario($param) {
        $this->db->start_cache();

        $param['nr_salario'] = str_replace('.', '', $param['nr_salario']);
        $param['nr_salario'] = str_replace(',', '.', $param['nr_salario']);
        //Adiciona o medico na tabela de Funcionarios 
        if (!empty($param['id_pessoa'])) {
            $funcionario['id_pessoa'] = $param['id_pessoa'];
        }
        if (!empty($param['nr_salario'])) {
            $funcionario['nr_salario'] = $param['nr_salario'];
        }
        //Setor do medico depois de fazer o cadastro de setor
        //if (!empty($param['id_especialidade1'])) {
        //    $medico['id_especialidade1'] = $param['id_especialidade1'];
        //}


        if (!empty($param['id_pessoa'])) {
            $funPessoa = $this->getFuncionarioByIdPessoa($param['id_pessoa']);

            if (!empty($funPessoa)) {
                $this->db->where('id_pessoa = ' . $param['id_pessoa']);
                $query = $this->db->update('tb_funcionario', $funcionario);
            } else {
                $query = $this->db->insert('tb_funcionario', $funcionario);
            }
        } else {
            $query = $this->db->insert('tb_funcionario', $funcionario);
        }
        $this->db->stop_cache();
        $this->db->flush_cache();
    }

    public function getFuncionarioByIdPessoa($id_pessoa) {
        if (empty($id_pessoa)) {
            return null;
        }
        unset($query);
        $this->db->select("tb_funcionario.*");
        $this->db->from("tb_funcionario");
        $this->db->where("tb_funcionario.id_pessoa = " . $id_pessoa);
        $query = $this->db->get()->result_array();
        /* print_r($this->db->last_query());
          die(); */
        return $query;
    }

    function listar_funcionario($id_pessoa) {
        unset($query);
        $this->db->select("tb_pessoa.*, tb_funcionario.*");
        $this->db->from("tb_pessoa");
        $this->db->join("tb_funcionario", "tb_funcionario.id_pessoa = tb_pessoa.id_pessoa", 'left');
        $this->db->where('tb_pessoa.id_pessoa = ' . $id_pessoa);
        $query = $this->db->get()->result_array();
        $query = current($query);
        /* print_r($this->db->last_query());
          die(); */
        return $query;
    }

    public function excluir($id_pessoa) {
        try {
            if (empty($id_pessoa)) {
                throw new Exception('Infome um id');
            }
            //exclui a Funcionario
            $this->db->start_cache();
            $this->db->where('id_pessoa', $id_pessoa);
            $query = $this->db->delete('tb_funcionario');
            $this->db->stop_cache();
            $this->db->flush_cache();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $query;
    }

}

?>