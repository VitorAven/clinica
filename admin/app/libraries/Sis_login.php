<?php

class Sis_login {

    public $_usuario;
    public $usuario_model;
    public $_permissao;
    private $_session;
    private $_cookie;

    /**
     *
     * Constructor
     *
     * @access	public
     */
    public function _getUserLogado() {
        
    }

    /**
     * Verifica se o usuario possui aquela permissão no sistema
     * @param String $nomeController
     */
    public $ci;

    public function __construct() {
        $CI = & get_instance();
        $CI->load->model('Usuario_model');
        $CI->load->library('session');
        $this->ci = $CI;
    }

    public function _getPermissao($nomeController = null) {
        
    }

    public function _doLogin($params = null) {

        $result = $this->ci->Usuario_model->_getUsuario($params);
        if(empty($result)){
            return false;            
        }
        
         $permissoes = $result['permissoes'];
        $usuario = $result['usuario'];
        
        /* Array ( 
         * [id_usuario] => 1 
         * [tx_nome_usuario] => teste 
         * [dt_nasc_usuario] => 2017-03-09 
         * [tx_email_usuario] => teste 
         * [tx_senha_usuario] => 6749d8779ed9609db8407097fa77c76ce3736f65 
         * [tx_login_usuario] => teste 
         * [id_cliente] => 0 
         * [st_ativo_usuario] => 1 
         * [is_suporte] => 1 ) )
         */
     
        if (!empty($usuario) && ($permissoes != null)) {
            
            $admin = array(
                'sessao' => sha1(date('Y-m-d') . $usuario->tx_login_usuario),
                'email' => $usuario->tx_email_usuario,
                'nome' => $usuario->tx_nome_usuario,
                'id' => $usuario->id_usuario,
                'login' => $usuario->tx_login_usuario,
                'admin' =>$usuario->is_suporte
            );            
            $this->ci->session->set_userdata('permissao',$permissoes);
            $this->ci->session->set_userdata('admin',$admin);
            return true;
        } else {
            return false;
        }
    }

    public function _doLogout() {
        $this->ci->session->userdata();
        $usuario = current($this->ci->Usuario_model->_getUsuario($params));

        if (!empty($usuario)) {

            $admin = array(
                'sessao' => sha1(date('Y-m-d') . $usuario['tx_login_usuario']),
                'email' => $usuario['tx_email_usuario'],
                'nome' => $usuario['tx_nome_usuario'],
                'id' => $usuario['id_usuario'],
                'login' => $usuario['tx_login_usuario']
            );
            $this->ci->session->set_userdata($admin);
            return true;
        } else {
            return false;
        }
    }

    public function _isLogado() {
        
        if (!empty($this->ci->session->userdata('admin'))) {
            $params = $this->ci->session->userdata;
            $usuario = current($this->ci->Usuario_model->_getUsuario($params));
            if (!empty($usuario)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
