<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Medicos extends CI_Controller {

    /**
     * @author Vitor Hugo Bassetto <vitorhugobassetto@gmail.com>
     * 
     */
    public function index() {

             
       

        try {
            

            $this->crud->set_theme('datatables');
            $this->crud->set_table('tb_medico');
            $this->crud->set_subject('Cadastro de médicos');
            $this->crud->fields('nr_crm', 'tx_nome', 'dt_nasc', 'tx_cpf', 'tx_rg', 'tx_sobrenome');
            $this->crud->required_fields('nr_crm', 'tx_nome', 'dt_nasc', 'tx_cpf', 'tx_rg', 'tx_sobrenome');
            $this->crud->columns('nr_crm', 'tx_nome', 'dt_nasc', 'tx_cpf', 'tx_rg', 'tx_sobrenome');
            

            $this->crud->display_as('nr_crm', 'CRM');
            $this->crud->display_as('tx_nome', 'Nome');
            $this->crud->display_as('dt_nasc', 'Data de nascimento');
            $this->crud->display_as('tx_cpf', 'CPF');
            $this->crud->display_as('tx_rg', 'RG');
            $this->crud->display_as('tx_sobrenome', 'Sobrenome');
            
            
//            $crud->fields('nome');
//            $crud->edit_fields('nome');

            $this->data['crud'] = $this->crud->render();
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }

        $this->load->view('layouts/layout', $this->data);
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */
    