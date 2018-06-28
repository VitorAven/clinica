<?php

class Permissao_model extends CI_Model {

    const _tbname = 'tb_permissao';
    const _pK = 'id_permissao';
    const _ind = array(
        'tx_nome_permissao' => '(string)',
        'tx_nome_controller' => '(string)',
        'id_permissao_pai' => '(int)'
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

    public function getDataGrid($params = null) {
        try {
            $this->db->select("*");
            $this->db->from(self::_tbname);
            if (!empty($params[self::_pK])) {
                $this->db->where(self::_pK, $params[self::_pK]);
            }
            //pega todos os campos default
            $this->db->join("tb_usuario", "tb_usuario.id_usuario = " . self::_tbname . ".id_usuario", 'left');
            $this->db->join("tb_menu", "tb_menu.id_menu = " . self::_tbname . ".id_menu", 'left');
            $this->db->where("is_suporte !=", 1);
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

    public function maxRegisters($params = null) {
        try {
            $this->db->select("COUNT(id_permissao) AS qtn");
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