d<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Usuario extends CI_Controller {

    /**
     * @author Vitor Hugo Bassetto <vitorhugobassetto@gmail.com>
     * 
     */
    public function index() {

        try {
            $data['titulo'] = 'Pergunta';
            $this->load->model('Pergunta_model', 'pergunta');
            $post = $this->input->post();

            echo '<pre>';
            print_r($post);
            die();
            $this->data['crud'] = $crud->render();
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }

        $this->load->view('layouts/layout', $this->data);
    }

    public function geraSenha($post) {
        $post['tx_senha_usuario'] = sha1($post['tx_senha_usuario'] . sha1($post['tx_login_usuario']));
        return $post;
    }

    function login() {
        try {
            if ($this->sis_login->_isLogado()) {
                redirect(site_url('Principal'));
            }
            $this->title = 'Faça o Login';
            $post = $this->input->post();
            $dataLogin = array();
            if (!empty($post)) {
//                echo '<pre>';
//                print_r($post);
//                die();
            }
            if (!empty($post['login'])) {
                $login = $this->input->post('login');
                $credenciais['login'] = $login['login'];
                $credenciais['senha'] = $login['senha'];
                $credenciais['lembrar'] = empty($login['lembrar']) ? "N" : $login['lembrar'];

                if ($this->sis_login->_doLogin($credenciais)) {
                    redirect(site_url('Principal'));
                } else {
                    echo "<script>alert('Login ou senha invalido!');</script>";
                    $this->layout->definirTitulo('Efetue o Login');
                    $this->layout->definirLayout('layouts/login');
                    $this->layout->view('login');
                }
            } elseif (!empty($post['usuario'])) {//cadastro de um novo voluntario
                $voluntario = $post['usuario'];

                if ($voluntario['tx_senha_usuario'] == $voluntario['tx_senha_usuario_rep']) {
                    unset($voluntario['tx_senha_usuario_rep']);
                    $dataVol = $voluntario;
                    $dataVol['tx_senha_usuario'] = sha1($voluntario['tx_senha_usuario'] . sha1($voluntario['tx_email_usuario']));
                    $dataVol['is_suporte'] = 0;
                    $dataVol['st_ativo_usuario'] = 1;
                    $dataVol['tx_login_usuario'] = $voluntario['tx_email_usuario'] ;
                    
                    $this->load->model('Usuario_model', 'usuario');

                    $existeEmailCad = $this->usuario->getDataGrid(array('tx_email_usuario'=>$voluntario['tx_email_usuario']));
                    
                    if(!empty($existeEmailCad)){
                        $dataLogin['danger'] = array('texto'=>'Email já cadastrado', 'titulo'=> 'Erro');
                    }else{
                        $this->usuario->salvar($dataVol);
                        $dataLogin['success'] = array('texto'=>'Cadastrado com sucesso, aguarde a confirmação por email', 'titulo'=> 'Sucesso!');
                    }
                    
                } else {
                   $dataLogin['danger'] = array('texto'=>'erro', 'titulo'=> 'Erro');
                }
               
            }
            $this->layout->definirTitulo('Efetue o Login');
            $this->layout->definirLayout('layouts/login');
            $this->layout->view('login', $dataLogin);
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
    