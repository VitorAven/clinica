<?php

class ImgPraga_model extends CI_Model {

    const _tbname = 'tb_imgpraga';
    const _pK = 'id_imgpraga';

    public function __construct() {
        parent::__construct();
    }

    public function salvar($post) {
        unset($data);
        $this->db->trans_start();
        try {
            if (!empty($post[self::_pK])) {
                $id = $post[self::_pK];
                unset($post[self::_pK]);

                $data = $this->db->update(self::_tbname, $post, self::_pK . "=" . $id);
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
    public function salvarImg($post) {
        unset($data);
        $this->db->trans_start();
        try {
            if (!empty($post[self::_pK])) {
                $id = $post[self::_pK];
                unset($post[self::_pK]);

                $data = $this->db->update(self::_tbname, $post, self::_pK . "=" . $id);
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

//    $this->db->trans_begin();
//   if ($this->db->trans_status() === FALSE) {
//                $this->db->trans_rollback();
//            } else {
//                $this->db->trans_commit();
//            }
    public function getDataGrid($params = null) {
        try {
            $this->db->select("*");
            $this->db->from(self::_tbname);
            if (!empty($params['id_praga'])) {
                $this->db->where('id_praga', $params['id_praga']);
            }

            if (!empty($params['tx_nomepraga'])) {
                $this->db->or_like('tx_nomecomum',  $params['tx_nomepraga'] );
                $this->db->or_like('tx_nomecientifico',  $params['tx_nomepraga'] );
            }
            if (!empty($params['page_ini']) && !empty($params['page_fim'])) {
                $this->db->limit($params['page_ini'], $params['page_fim']);
            }
            $this->db->order_by('id_praga');
            $data = $this->db->get()->result_array();

//           echo '<pre>';
//           print_r($this->db->last_query());
//           die();
        } catch (Exception $ex) {
            return array('erro' => $ex);
        }
        return $data;
    }

    public function maxRegisters($params = null) {
        try {
            $this->db->select("COUNT(id_praga) AS qtn");
            $this->db->from(self::_tbname);
            if (!empty($params['id_praga'])) {
                $this->db->where('id_praga', $params['id_praga']);
            }

            if (!empty($params['tx_nomepraga'])) {
                $this->db->or_like('tx_nomecomum',  $params['tx_nomepraga'] );
                $this->db->or_like('tx_nomecientifico',  $params['tx_nomepraga'] );
            }

            $data = $this->db->get()->row();
//             echo '<pre>';
//           print_r($this->db->last_query());
//           die();
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