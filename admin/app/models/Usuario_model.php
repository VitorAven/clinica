<?php

class Usuario_model extends CI_Model {

    /**
     * @author Vitor Hugo Bassetto <vitorhugobassetto@gmail.com>
     * 
     */
    const _tbname = 'tb_usuario';
    const _pK = 'id_usuario';
    const _ind = array(
        'tx_nome_usuario' => '(string)',
        'tx_email_usuario' => '(string)',
        'tx_senha_usuario' => '(string)',
        'tx_login_usuario' => '(string)',
        'dt_nasc_usuario' => '(int)',
        'st_ativo_usuario' => '(int)'
    );

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

    public function _getUsuario($params = null) {

        unset($query);

        if (!empty($params['senha']) && !empty($params['login'])) {
            $this->db->where("tx_senha_usuario LIKE  '" . sha1($params['senha'] . sha1($params['login'])) . "'");
            $this->db->where("tx_login_usuario LIKE  '" . $params['login'] . "'");
        }
        if (!empty($params['sessao'])) {
            if ($params['sessao'] == (sha1(date('Y-m-d') . $params['login']))) {
                if ($params['email']) {
                    $this->db->where("tx_email_usuario LIKE  '" . $params['email'] . "'");
                }
                if ($params['nome']) {
                    $this->db->where("tx_nome_usuario LIKE  '" . $params['nome'] . "'");
                }
                if ($params['login']) {
                    $this->db->where("tx_nome_usuario LIKE  '" . $params['login'] . "'");
                }
                if ($params['id']) {
                    $this->db->where("id_usuario =  " . $params['id']);
                }
            }
        }
        $this->db->where("st_ativo_usuario = 1");
        $query = $this->db->get(self::_tbname)->row();
        if (!empty($query)) {
            if (!empty($params['senha']) && !empty($params['login'])) {
                if (!$query->id_usuario && !$query->is_suporte) {
                    $this->db->where('tb_permissao.id_usuario = ' . $query->id_usuario);
                    $this->db->join('tb_menu', 'tb_menu.id_menu = tb_permissao.id_menu');
                    $this->db->group_by('tb_permissao.id_menu');
                    $result['permissoes'] = $this->db->get('tb_permissao')->result_array();
                } elseif ($query->is_suporte) {
                    $this->db->join('tb_menu', 'tb_menu.id_menu = tb_permissao.id_menu');
                    $this->db->group_by('tb_permissao.id_menu');
                    $result['permissoes'] = $this->db->get('tb_permissao')->result_array();
                } else {
                    $result['permissoes'] = null;
                }
            }
            $result['usuario'] = $query;
            return $result;
        } else {
            return '';
        }
    }

    public function listarTodos() {
        unset($query);
        $query = $this->db->get('galeria')->result_array();
        return $query;
    }

    public function getDataGrid($params = null) {
        try {
            $this->db->select("*");
            $this->db->from(self::_tbname);
            if (!empty($params[self::_pK])) {
                $this->db->where(self::_pK, $params[self::_pK]);
            }
            //pega todos os campos default
            //pega todos os campos default
            foreach (self::_ind as $indice => $type) {
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
            $this->db->select("COUNT(" . self::_pK . ") AS qtn");
            $this->db->from(self::_tbname);
            if (!empty($params[self::_pK])) {
                $this->db->where(self::_pK, $params[self::_pK]);
            }
            //pega todos os campos default
            foreach (self::_ind as $indice => $type) {
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