<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Funcionarios extends CI_Controller {

    
    /**
     * @author Vitor Hugo Bassetto <vitorhugobassetto@gmail.com>
     * 
     */
    public function index() {

             
        $this->load->model('Grocery_crud_model');
//        $data=array('output' => '' , 'js_files' => array() , 'css_files' => array());
        $this->data['titulo'] = "Funcionarios";
        $this->data['admin_name'] = "Funcioanrios";


        try {
            $crud = new grocery_CRUD();

            $crud->set_model('model_custom');
            $crud->get_tables_personalizadas('teste');
            
            
            $crud->set_theme('datatables');
            $crud->set_table('tb_funcionario AS f');
            $crud->set_table('tb_pessoa AS p');
            $crud->set_subject('Cadastro de Funcionario');
            $crud->fields('f.nr_salario', 'p.tx_nome', 'p.dt_nasc', 'p.tx_cpf', 'p.tx_rg', 'p.tx_sobrenome');
            $crud->required_fields('f.nr_salario', 'p.tx_nome', 'p.dt_nasc', 'p.tx_cpf', 'p.tx_rg', 'p.tx_sobrenome');
            $crud->columns('tx_nome', 'tx_sobrenome', 'tx_cpf1');
            

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
    