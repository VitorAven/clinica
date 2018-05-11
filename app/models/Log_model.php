<?php

class Log_model extends CI_Model {

    /**
     * @author Vitor Hugo Bassetto <vitorhugobassetto@gmail.com>
     * 
     */
    private $_table_name = "tb_log";
    private $_id_table = "id_log";

    public function _saveLog($param) {
        $user_logado = $this->sis_login->_getUserLogado();
    }

}

?>