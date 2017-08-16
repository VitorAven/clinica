<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Imovel extends CI_Controller {

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

        $this->load->model('Grocery_crud_model');
//        $data=array('output' => '' , 'js_files' => array() , 'css_files' => array());
        $data['titulo'] = "Imoveis";
        $data['admin_name'] = "Imoveis";


        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('imoveis');
            $crud->set_subject('Imoveis');
            $crud->fields('tipo_imovel', 'area', 'venda', 'aluga', 'p_venda', 'p_aluga', 'id_cidade', 'id_bairro', 'id_rua', 'numero', 'itens');
            $crud->required_fields('tipo_imovel', 'venda', 'aluga', 'p_venda', 'p_aluga');
            $crud->display_as('id_rua', 'Rua');
            $crud->display_as('p_venda', 'Valor de venda');
            $crud->display_as('p_aluga', 'Valor de Aluguel');
            $crud->display_as('tipo_imovel', 'Tipo de Imovel');
            $crud->display_as('id_cidade', 'Cidade');
            $crud->display_as('id_bairro', 'Bairro');
            $crud->set_relation('id_rua', 'ruas', 'nome');
            $crud->set_relation('tipo_imovel', 'tipo', 'nome');
            $crud->set_relation('id_bairro', 'bairros', 'nome');
            $crud->set_relation('id_cidade', 'cidades', 'nome');

            $crud->add_action("Itens", "ui-icon-image", site_url('imovel/itens/') . "/");
            $crud->field_type('itens', 'multiselect');

            $crud->set_relation_n_n('itens', 'imoveis_item', 'itens', 'id_imovel', 'id_item', 'nome', 'qtn');
            $crud->columns('id_cidade', 'id_bairro', 'id_rua', 'venda', 'aluga', 'numero');
            $crud->order_by("id_cidade");
            $crud->order_by('id_bairro');
//            $crud->fields('nome');
//            $crud->edit_fields('nome');

            $data['crud'] = $crud->render();
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }

        $this->load->view('layouts/layout', $data);
    }

    public function itens($param) {
        if (!$this->sis_login->_isLogado()) {
            redirect(site_url("/login"));
        } else {
            $data['usuario'] = $this->session->userdata;
        }

        $this->load->model('Grocery_crud_model');
//        $data=array('output' => '' , 'js_files' => array() , 'css_files' => array());
        $data['titulo'] = "Imoveis";
        $data['admin_name'] = "Imoveis";


        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('imoveis_item');
            $crud->set_subject('imoveis item');
            $crud->fields('id_imovel', 'qtn', 'id_item');
            $crud->field_type('id_imovel', 'hidden', $param);
            $crud->required_fields('qtn', 'id_item');
            $crud->display_as('qtn', 'Quantidade');
            $crud->display_as('id_item', 'Item');

            $crud->set_relation('id_item', 'itens', 'nome');
            $crud->columns('id_item', 'qtn');
            $crud->where('id_imovel', $param);
//            $crud->fields('nome');
//            $crud->edit_fields('nome');
           


            $data['crud'] = $crud->render();
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }

        $this->load->view('layouts/layout', $data);
    }

  

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */
    