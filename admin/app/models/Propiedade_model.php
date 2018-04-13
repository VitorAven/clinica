<?php

class Propiedade_model extends CI_Model {

    const _tbname = 'tb_propiedade';
    const _pK = 'id_propiedade';

    public function __construct() {
        parent::__construct();
    }

    public function salvar($post) {
        unset($data);
        $this->db->trans_start();
        try {
            if (!empty($post['id_propiedade'])) {
                $this->db->where('id_propiedade = ' . $post['id_propiedade']);
                $data = $this->db->update(self::_tbname, $post);
            } else {
                $data = $this->db->insert(self::_tbname, $post);
            }

            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
            }
        } catch (Exception $ex) {
            return array('erro' => $ex);
        }
        return $data;
    }

    public function listarTodasAsPropiedades() {
        unset($data);
        $this->db->trans_start();

        try {
            $this->db->select("*");
            $this->db->from(self::_tbname);
            echo '<pre>';
            print_r($this->session->userdata());
            die();
            $this->db->where('id_usuario',$this->session->userdata('id'));
            $data = $this->db->get()->result_array();


            $this->db->trans_complete();
            if ($this->db->trans_statuss() === FALSE) {
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
            }
        } catch (Exception $ex) {
            return array('erro' => $ex);
        }
        return $data;
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
        if (empty($id_pessoa)) {
            return null;
        }
        unset($query);
        $this->db->select("tb_medico.*");
        $this->db->from("tb_medico");
        $this->db->where("tb_medico.id_pessoa = " . $id_pessoa);
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
        $this->db->where("tb_pessoa.tx_cpf LIKE '" . $tx_cpf . "'");
        $query = $this->db->get()->result_array();
        /* print_r($this->db->last_query());
          die(); */
        return $query;
    }

}

?>