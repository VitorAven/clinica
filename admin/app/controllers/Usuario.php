<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuario extends CI_Controller {

    /**
     * @author Vitor Hugo Bassetto <vitorhugobassetto@gmail.com>
     * Classe controller, cadastro e alteração das informações da usuarios,
     * CRUD usuario.
     */
    public function index() {
//warning, success, danger

        $this->load->model('Usuario_model', 'usuario');
        $dataPergunta = array();
        $params = $this->input->post(null, true);
        if (!empty($params['usuario'])) {
            $dataPergunta = $params['usuario'];
        }
//        echo '<pre>';
//        print_r($dataPergunta);
//        die();
        $qtnRegistros = $this->usuario->maxRegisters($dataPergunta);


        $this->load->library('pagination');
        $config['base_url'] = site_url('usuario/page');
        $config['total_rows'] = $qtnRegistros->qtn;
        $config['per_page'] = 10;


        if (!empty($this->uri->segment('3'))) {
            $pagina = $this->uri->segment('3');
        } else {
            $pagina = (int) 0;
        }

        $this->pagination->initialize($config);
//        $dataPergunta['debug'] = true;
        $dataPergunta['page_fim'] = $pagina;
        $dataPergunta['page'] = $config['per_page'];
        $dataPergunta['order'] = 'id_usuario DESC';
        $usuarios = $this->usuario->getDataGrid($dataPergunta);

//        $data['jquery'] = " $('.adicinarNovaPraga').click(function(){
//       console.log('teste');
//    });";
        $data['jquery'] = '';
        $data['populateForm'] = $params;
        $data['lista'] = $usuarios;
        $data['pagi'] = $this->pagination->create_links();

        $this->layout->view('usuario/list_view', $data);
    }

    public function page() {
        redirect('/usuario');
    }

    public function adicionar() {
        $this->load->model('Usuario_model', 'usuario');

        $post = $this->input->post();
        $data = array();

        if (!empty($post['usuario'])) {
            $dataPraga = $post['usuario'];
            $id = $this->usuario->salvar($dataPraga);

            redirect('/usuario/' . $id);
        }
        $this->layout->view('usuario/form_view', $data);
    }

    public function editar($id_usuario) {
//        $data['mensagem'] = array('tipo' => 'success', 'titulo' => 'Sucesso!', 'texto' => 'Registro excluido com sucesso!');

        $data['titulo'] = 'Usuario';
        $this->load->model('Usuario_model', 'usuario');

        $post = $this->input->post();

        if (!empty($post['usuario'])) {

            $dataUsuario = $post['usuario'];

            $salvar = $this->usuario->salvar($dataUsuario);
            $data['mensagem'] = array('tipo' => 'success', 'titulo' => 'Sucesso!', 'texto' => 'Registro excluido com sucesso!');
        }
        // verifica se a usuario tem resposta

        $dadosUsuario['usuario'] = current($this->usuario->getDataGrid(array('id_usuario' => $id_usuario, 'limit' => 1)));
//        echo '<pre>';
//        print_r($dadosUsuario);
//        die();
        if (!empty($dadosUsuario)) {
            $data['populateForm'] = $dadosUsuario;
        }

        $this->layout->view('usuario/form_view', $data);
    }

    public function excluir() {
        //warning, success, danger

        $post = $this->input->post();

        if (!empty($post['id_usuario'])) {
            $this->load->model('usuario_model', 'usuario');
//            $alterarOrdem = $this->usuario->excluir($post['id_usuario']);
        }
        return true;
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
            if (!empty($post['login'])) {// efetura login
                $login = $this->input->post('login');
                $credenciais['login'] = $login['login'];
                $credenciais['senha'] = $login['senha'];
//                $credenciais['lembrar'] = empty($login['lembrar']) ? "N" : $login['lembrar'];

                if ($this->sis_login->_doLogin($credenciais)) {
                    redirect(site_url('Principal'));
                } else {
                    echo "<script>alert('Login ou senha invalido!');</script>";
//                    $this->layout->definirTitulo('Efetue o Login');
//                    $this->layout->definirLayout('layouts/login');
//                    $this->layout->view('login');
                }
            } elseif (!empty($post['usuario'])) {//cadastro de um novo voluntario
                $voluntario = $post['usuario'];

                if ($voluntario['tx_senha_usuario'] == $voluntario['tx_senha_usuario_rep']) {
                    unset($voluntario['tx_senha_usuario_rep']);
                    $dataVol = $voluntario;
                    $dataVol['tx_senha_usuario'] = sha1($voluntario['tx_senha_usuario'] . sha1($voluntario['tx_email_usuario']));
                    $dataVol['is_suporte'] = 0;
                    $dataVol['st_ativo_usuario'] = 1;
                    $dataVol['tx_login_usuario'] = $voluntario['tx_email_usuario'];

                    $this->load->model('Usuario_model', 'usuario');

                    $existeEmailCad = $this->usuario->getDataGrid(array('tx_email_usuario' => $voluntario['tx_email_usuario']));

                    if (!empty($existeEmailCad)) {
                        $dataLogin['danger'] = array('texto' => 'Email já cadastrado', 'titulo' => 'Erro');
                    } else {
                        $this->usuario->salvar($dataVol);
                        $dataLogin['success'] = array('texto' => 'Cadastrado com sucesso, aguarde a confirmação por email', 'titulo' => 'Sucesso!');
                    }
                } else {
                    $dataLogin['danger'] = array('texto' => 'erro', 'titulo' => 'Erro');
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
    