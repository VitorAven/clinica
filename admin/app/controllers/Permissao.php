<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permissao extends CI_Controller {

    /**
     * @author Vitor Hugo Bassetto <vitorhugobassetto@gmail.com>
     * Classe controller, cadastro e alteração das informações da permissaos,
     * CRUD permissao.
     */
    public function index() {
//warning, success, danger

        $this->load->model('Permissao_model', 'permissao');
        $dataPergunta = array();
        $params = $this->input->post(null, true);
        if (!empty($params['permissao'])) {
            $dataPergunta = $params['permissao'];
        }
//        echo '<pre>';
//        print_r($dataPergunta);
//        die();
        $qtnRegistros = $this->permissao->maxRegisters($dataPergunta);


        $this->load->library('pagination');
        $config['base_url'] = site_url('permissao/page');
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
        $dataPergunta['order'] = 'id_permissao DESC';
        $permissaos = $this->permissao->getDataGrid($dataPergunta);
//        echo '<pre>';
//        print_r($permissaos);
//        die();
//        $data['jquery'] = " $('.adicinarNovaPraga').click(function(){
//       console.log('teste');
//    });";
        $data['jquery'] = '';
        $data['populateForm'] = $params;
        $data['lista'] = $permissaos;
        $data['pagi'] = $this->pagination->create_links();

        $this->layout->view('permissao/list_view', $data);
    }

    public function page() {
        redirect('/permissao');
    }

    public function adicionar() {
        $this->load->model('Permissao_model', 'permissao');
        $this->load->model('Usuario_model', 'usuario');
        $this->load->model('Menu_model', 'menu');

        $data = array();
        $data['usuario'] = $this->usuario->getDataGrid();
        $data['menu'] = $this->menu->getDataGrid();

        $post = $this->input->post();


        if (!empty($post['permissao'])) {
            $dataPermissao = $post['permissao'];

            $dataPermissao['st_incluir_pagina'] = 1;
            $dataPermissao['st_editar_pagina'] = 1;
            $dataPermissao['st_deletar_pagina'] = 1;
            $dataPermissao['st_visualizar_pagina'] = 1;
            $id = $this->permissao->salvar($dataPermissao);

            redirect('/permissao/' . $id);
        }
        $this->layout->view('permissao/form_view', $data);
    }

    public function editar($id_permissao) {
//        $data['mensagem'] = array('tipo' => 'success', 'titulo' => 'Sucesso!', 'texto' => 'Registro excluido com sucesso!');

        $data['titulo'] = 'Permissao';
        $this->load->model('Permissao_model', 'permissao');
        $this->load->model('Usuario_model', 'usuario');
        $this->load->model('Menu_model', 'menu');


        $data['usuario'] = $this->usuario->getDataGrid();
        $data['menu'] = $this->menu->getDataGrid();

        $post = $this->input->post();

        if (!empty($post['permissao'])) {

            $dataPermissao = $post['permissao'];

            $salvar = $this->permissao->salvar($dataPermissao);
            $data['mensagem'] = array('tipo' => 'success', 'titulo' => 'Sucesso!', 'texto' => 'Registro excluido com sucesso!');
        }
        // verifica se a permissao tem resposta

        $dadosPermissao['permissao'] = current($this->permissao->getDataGrid(array('id_permissao' => $id_permissao, 'limit' => 1)));
//        echo '<pre>';
//        print_r($dadosPermissao);
//        die();
        if (!empty($dadosPermissao)) {
            $data['populateForm'] = $dadosPermissao;
        }

        $this->layout->view('permissao/form_view', $data);
    }

    public function excluir() {
        //warning, success, danger

        $post = $this->input->post();
       
        if (!empty($post['id_permissao'])) {
            $this->load->model('permissao_model', 'permissao');
            $alterarOrdem = $this->permissao->excluir($post['id_permissao']);
        }
        return true;
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */
    