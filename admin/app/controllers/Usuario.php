<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuario extends CI_Controller {

    /**
     * @author Vitor Hugo Bassetto <vitorhugobassetto@gmail.com>
     * 
     */
    public function index() {

        if (!$this->sis_login->_isLogado()) {
            redirect(site_url("/login"));
        } else {
            $data['usuario'] = $this->session->userdata;
        }

        try {
            $data['titulo'] = "Usuarios";
            $data['admin_name'] = "Usuarios";

            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tb_usuario');
            $crud->set_subject('Usuarios');
            $crud->fields(
                    'tx_nome_usuario', 'dt_nasc_usuario', 'tx_email_usuario', 'tx_senha_usuario', 'tx_login_usuario', 'st_ativo_usuario', 'is_suporte'
            );
            $crud->required_fields(
                    'tx_nome_usuario', 'dt_nasc_usuario', 'tx_email_usuario', 'tx_senha_usuario', 'tx_login_usuario', 'st_ativo_usuario'
            );
            $crud->columns(
                    'tx_nome_usuario', 'dt_nasc_usuario', 'tx_email_usuario', 'st_ativo_usuario'
            );
            $crud->unset_read_fields(
                    'tx_senha_usuario', 'id_cliente', 'is_suporte'
            );
            $crud->display_as('tx_nome_usuario', 'Nome');
            $crud->display_as('dt_nasc_usuario', 'Data Nasc');
            $crud->display_as('tx_email_usuario', 'Email');
            $crud->display_as('tx_senha_usuario', 'Senha');
            $crud->display_as('tx_login_usuario', 'Login');
            $crud->display_as('st_ativo_usuario', 'Status');
            $crud->field_type('tx_senha_usuario', 'password');
            $crud->field_type('tx_email_usuario', 'email');
            $crud->order_by('tx_nome_usuario');

//            $crud->fields('nome');
//            $crud->edit_fields('nome');
            $crud->callback_before_insert(array($this, 'geraSenha'));
            $crud->callback_before_update(array($this, 'geraSenha'));


            $data['crud'] = $crud->render();
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }

        $this->load->view('layouts/layout', $data);
    }

    public function geraSenha($post) {
        $post['tx_senha_usuario'] = sha1($post['tx_senha_usuario'] . sha1($post['tx_login_usuario']));
        return $post;
    }

    function login() {
        try {
            if ($this->sis_login->_isLogado()) {
                redirect(site_url('principal'));
            } else {
                $this->title = 'Faça o Login';
//echo sha1('admin123' . sha1('teste'));die();
                if (!empty($this->input->post('login'))) {
                    $login = $this->input->post('login');
                    $credenciais['login'] = $login['login'];
                    $credenciais['senha'] = $login['senha'];
                    $credenciais['lembrar'] = empty($login['lembrar']) ? "N" : $login['lembrar'];

                    if ($this->sis_login->_doLogin($credenciais)) {
                        redirect(site_url());
                    } else {
                        echo "<script>alert('Login ou senha invalido!');</script>";
                        $this->layout->definirTitulo('Efetue o Login');
                        $this->layout->definirLayout('layouts/login');
                        $this->layout->view('login');
                    }
                } else {
                    $this->layout->definirTitulo('Efetue o Login');
                    $this->layout->definirLayout('layouts/login');
                    $this->layout->view('login');
                }
            }
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function logout() {
        try {
            $this->session->sess_destroy();
            redirect(site_url("/login"));
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */
    