<?php

class Usuario_model extends CI_Model {

    /**
     * @author Vitor Hugo Bassetto <vitorhugobassetto@gmail.com>
     * 
     */
    private $_table_name = "tb_usuario";
    private $_id_table = "id_usuario";

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
        $query = $this->db->get($this->_table_name)->result_array();

        return $query;
    }

    public function listarTodos() {
        unset($query);
        $query = $this->db->get('galeria')->result_array();
        return $query;
    }

}

?>