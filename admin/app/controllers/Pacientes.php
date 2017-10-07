<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pacientes extends CI_Controller {

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
            $crud->set_table('tb_paciente');
            $crud->set_subject('Cadastro de Pacientes');
            $crud->fields('nr_registro', 'tx_nome', 'dt_nasc', 'tx_cpf', 'tx_rg', 'tx_sobrenome');
            $crud->required_fields('nr_registro', 'tx_nome', 'dt_nasc', 'tx_cpf', 'tx_rg', 'tx_sobrenome');
            $crud->columns('nr_registro', 'tx_nome', 'dt_nasc', 'tx_cpf', 'tx_rg', 'tx_sobrenome');
            

            $crud->display_as('nr_registro', 'Registro');
            $crud->display_as('tx_nome', 'Nome');
            $crud->display_as('dt_nasc', 'Data de nascimento');
            $crud->display_as('tx_cpf', 'CPF');
            $crud->display_as('tx_rg', 'RG');
            $crud->display_as('tx_sobrenome', 'Sobrenome');
            
            
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
    