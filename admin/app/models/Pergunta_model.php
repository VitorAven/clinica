<?php

class Pergunta_model extends CI_Model {

    const _tbname = 'tb_pergunta';
    const _pK = 'id_pergunta';
    const _ind = array(
        '(string)' => 'tx_nome',
        '(string)' => 'tx_email',
        '(string)' => 'tx_pergunta',
        '(int)' => 'id_pagina',
        '(int)' => 'dt_pergunta',
        '(int)' => 'st_ativa'
    );

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
                $id = $this->db->insert_id();
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
        return $id;
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
            if (!empty($params[self::_pK])) {
                $this->db->where(self::_pK, $params[self::_pK]);
            }
            //pega todos os campos default
            foreach (self::_ind as $type => $indice) {
                if (!empty($params[$indice])) {
                    if ($type == '(string)') {
                        $this->db->like($indice, (string) $params[$indice]);
                    } elseif ($type == '(int)') {
                        $this->db->where($indice, (int) $params[$indice]);
                    }
                }
            }


            if (!empty($params['order'])) {
                $this->db->order_by($params['order']);
            }

            if (!empty($params['page']) && !empty($params['page_fim'])) {
                $this->db->limit($params['page'], $params['page_fim']);
            } elseif (!empty($params['page'])) {
                $this->db->limit($params['page']);
            }
            if (!empty($params['limit'])) {
                $this->db->limit($params['limit']);
            }

            $data = $this->db->get()->result_array();
            if (!empty($params['debug'])) {
                echo '<pre>';
                print_r($this->db->last_query());
                die();
            }
        } catch (Exception $ex) {
            return array('erro' => $ex);
        }
        return $data;
    }

    public function getDataPerguntasPorPraga() {
        try {
            $this->db->select("tb_praga.*, COUNT(id_pergunta) AS qtn");
            $this->db->from(self::_tbname);
            $this->db->join("tb_praga", "tb_praga.id_praga = tb_pergunta.id_praga", 'INNER');
            $this->db->group_by('tb_praga.id_praga');
            $this->db->order_by('qtn', 'DESC');
            
            $data = $this->db->get()->result_array();
        } catch (Exception $ex) {
            return array('erro' => $ex);
        }
        return $data;
    }

    public function maxRegisters($params = null) {
        try {
            $this->db->select("COUNT(id_pergunta) AS qtn");
            $this->db->from(self::_tbname);
            if (!empty($params[self::_pK])) {
                $this->db->where(self::_pK, $params[self::_pK]);
            }

            if (!empty($params['tx_nomepraga'])) {
                $this->db->or_like('tx_nomecomum', $params['tx_nomepraga']);
                $this->db->or_like('tx_nomecientifico', $params['tx_nomepraga']);
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

    public function excluir($id) {
        try {
            if (empty($id)) {
                throw new Exception('Erro');
            }
            //exclui a medico
            $this->db->start_cache();
            $this->db->where(self::_pK, $id);
            $query = $this->db->delete(self::_tbname);
            $this->db->stop_cache();
            $this->db->flush_cache();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $query;
    }

}

?>