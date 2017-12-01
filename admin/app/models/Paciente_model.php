<?php

class Paciente_model extends CI_Model {

    function salvar($post) {
        unset($query);
        $pessoa = array();
        $medico = array();
        $funcionario = array();
        try {

            $this->db->start_cache();
            if (!empty($post['tx_nome'])) {
                $pessoa['tx_nome'] = $post['tx_nome'];
            }
            if (!empty($post['tx_sobrenome'])) {
                $pessoa['tx_sobrenome'] = $post['tx_sobrenome'];
            }
            if (!empty($post['dt_nasc'])) {
                $pessoa['dt_nasc'] = $post['dt_nasc'];
            }
            if (!empty($post['tx_cpf'])) {
                $pessoa['tx_cpf'] = $post['tx_cpf'];
            }
            if (!empty($post['tx_rg'])) {
                $pessoa['tx_rg'] = $post['tx_rg'];
            }
            if (!empty($post['tx_rg'])) {
                $pessoa['tx_rg'] = $post['tx_rg'];
            }
            if (!empty($post['id_pessoa'])) {
                $pessoa['id_pessoa'] = $post['id_pessoa'];
                $pessoaLastId = $post['id_pessoa'];
                $this->db->where('id_pessoa = ' . $pessoaLastId);
                $query = $this->db->update('tb_pessoa', $pessoa);
            } else {
                $query = $this->db->insert('tb_pessoa', $pessoa);
                $pessoaLastId = $this->db->insert_id();
            }

            $this->db->stop_cache();
            $this->db->flush_cache();



            /*
             *     [tx_nome] => vitor hugo
              [tx_sobrenome] => borges basseto
              [dt_nasc] => 1992-10-31
              [tx_rg] => 48.760.209-2_
              [tx_cpf] => 421.240.548-21
              [nr_salario] => 01.600,00
              [nr_crm] => 6666
              [id_especialidade1] => 2
              )
             */
            $this->db->start_cache();
            //Adiciona o medico na tabela de Funcionarios 
            if (!empty($pessoaLastId)) {
                $paciente['id_pessoa'] = $pessoaLastId;
            }
            if (!empty($post['nr_salario'])) {
                $paciente['nr_salario'] = $post['nr_salario'];
            }
            //Setor do medico depois de fazer o cadastro de setor
            //if (!empty($post['id_especialidade1'])) {
            //    $medico['id_especialidade1'] = $post['id_especialidade1'];
            //}

            if (!empty($post['id_pessoa'])) {
                $this->db->where('id_pessoa = ' . $pessoaLastId);
                $query = $this->db->update('tb_funcionario', $paciente);
            } else {
                $query = $this->db->insert('tb_funcionario', $paciente);
            }
            $this->db->stop_cache();
            $this->db->flush_cache();


            $this->db->start_cache();
//Adiciona o medico na tabela de medicos
            if (!empty($pessoaLastId)) {
                $medico['id_pessoa'] = $pessoaLastId;
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
                $this->db->where('id_pessoa = ' . $pessoaLastId);
                $query = $this->db->update('tb_medico', $medico);
            } else {
                $query = $this->db->insert('tb_medico', $medico);
            }
            $this->db->stop_cache();
            $this->db->flush_cache();


            return $pessoaLastId;
        } catch (Exception $exc) {
            return null;
        }
    }

    function getEspecialidades($params = array()) {
        
    }

    function listarTodosMedicos() {
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

    function excluir($id_pessoa) {
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

    function listar_medico($id_pessoa) {
        unset($query);
        $this->db->select("tb_pessoa.*, tb_medico.*, tb_funcionario.*");
        $this->db->from("tb_pessoa");
        $this->db->join("tb_medico", "tb_medico.id_pessoa = tb_pessoa.id_pessoa", 'left');
        $this->db->join("tb_funcionario", "tb_funcionario.id_pessoa = tb_pessoa.id_pessoa", 'left');
        $this->db->where('tb_pessoa.id_pessoa = ' . $id_pessoa);
        $query = $this->db->get()->result_array();
        $query = current($query);
        /* print_r($this->db->last_query());
          die();*/
        return $query;
    }

    

}

?>