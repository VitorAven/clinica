<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu extends CI_Controller {

    /**
     * @author Vitor Hugo Bassetto <vitorhugobassetto@gmail.com>
     * Classe controller, cadastro e alteração das informações da menus,
     * CRUD menu.
     */
    public function index() {
//warning, success, danger

        $this->load->model('Menu_model', 'menu');
        $dataPergunta = array();
        $params = $this->input->post(null, true);
        if (!empty($params['menu'])) {
            $dataPergunta = $params['menu'];
        }
//        echo '<pre>';
//        print_r($dataPergunta);
//        die();
        $qtnRegistros = $this->menu->maxRegisters($dataPergunta);


        $this->load->library('pagination');
        $config['base_url'] = site_url('menu/page');
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
        $dataPergunta['order'] = 'id_menu DESC';
        $menus = $this->menu->getDataGrid($dataPergunta);

//        $data['jquery'] = " $('.adicinarNovaPraga').click(function(){
//       console.log('teste');
//    });";
        $data['jquery'] = '';
        $data['populateForm'] = $params;
        $data['lista'] = $menus;
        $data['pagi'] = $this->pagination->create_links();
        
        $this->layout->view('menu/list_view', $data);
    }

    public function page() {
        redirect('/menu');
    }

    public function adicionar() {
        $this->load->model('Menu_model', 'menu');

        $post = $this->input->post();
        $data = array();

        if (!empty($post['menu'])) {
            $dataPraga = $post['menu'];
            $id = $this->menu->salvar($dataPraga);

            redirect('/menu/' . $id);
        }
        $this->layout->view('menu/form_view', $data);
    }


    public function editar($id_menu) {
//        $data['mensagem'] = array('tipo' => 'success', 'titulo' => 'Sucesso!', 'texto' => 'Registro excluido com sucesso!');

        $data['titulo'] = 'Menu';
        $this->load->model('Menu_model', 'menu');
        
        $post = $this->input->post();

        if (!empty($post['menu'])) {

            $dataMenu = $post['menu'];

            $salvar = $this->menu->salvar($dataMenu);
            $data['mensagem'] = array('tipo' => 'success', 'titulo' => 'Sucesso!', 'texto' => 'Registro excluido com sucesso!');
        }
        // verifica se a menu tem resposta
        
        $dadosMenu['menu'] = current($this->menu->getDataGrid(array('id_menu' => $id_menu, 'limit' => 1)));
//        echo '<pre>';
//        print_r($dadosMenu);
//        die();
        if (!empty($dadosMenu)) {
            $data['populateForm'] = $dadosMenu;
        }

        $this->layout->view('menu/form_view', $data);
    }

   

    public function excluir() {
        //warning, success, danger

        $post = $this->input->post();

        if (!empty($post['id_menu'])) {
            $this->load->model('menu_model', 'menu');
            $alterarOrdem = $this->menu->excluir($post['id_menu']);
        }
        return true;
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */
    