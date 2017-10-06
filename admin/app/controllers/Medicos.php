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
            $this->data['titulo'] = "Usuarios";
            $this->data['admin_name'] = "Usuarios";

            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tb_medico');
            $crud->set_subject('Médicos');
            $crud->fields(
                    'nr_crm', 'tx_nome', 'dt_nasc', 'tx_cpf', 'tx_rg', 'tx_sobrenome'
            );
            $crud->required_fields(
                    'nr_crm', 'tx_nome', 'dt_nasc', 'tx_cpf', 'tx_rg', 'tx_sobrenome'
            );
            $crud->columns(
                    'nr_crm', 'tx_nome', 'dt_nasc', 'tx_cpf', 'tx_rg', 'tx_sobrenome'
            );

            $crud->display_as('nr_crm', 'CRM');
            $crud->display_as('tx_nome', 'Nome');
            $crud->display_as('dt_nasc', 'Data de nascimento');
            $crud->display_as('tx_cpf', 'CPF');
            $crud->display_as('tx_rg', 'RG');
            $crud->display_as('tx_sobrenome', 'Sobrenome');

//            $crud->fields('nome');
//            $crud->edit_fields('nome');
            $crud->add_action("Permissões", "ui-icon-image", site_url('permissoes/usuario/') . "/");
            $crud->callback_before_insert(array($this, 'geraSenha'));
            $crud->callback_before_update(array($this, 'geraSenha'));


            $this->data['crud'] = $crud->render();
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }

        $this->load->view('layouts/layout', $this->data);
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */
    