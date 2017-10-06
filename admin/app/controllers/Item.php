<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Item extends CI_Controller {

    /**
     * @author Vitor Hugo Bassetto <vitorhugobassetto@gmail.com>
     * 
     */
    public function index() {

              
        $this->load->model('Grocery_crud_model');
//        $data=array('output' => '' , 'js_files' => array() , 'css_files' => array());
        $this->data['titulo'] = "Item";
        $this->data['admin_name'] = "Item";


        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('itens');
            $crud->set_subject('Tipos de itens do imovel');
            $crud->required_fields('nome');
            $crud->columns('nome');
            $crud->order_by("nome");
//            $crud->fields('nome');
//            $crud->edit_fields('nome');

            $this->data['crud'] = $crud->render();
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }

        $this->load->view('layouts/layout', $this->data);
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */
    