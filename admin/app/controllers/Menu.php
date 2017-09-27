<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu  extends CI_Controller {

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

        try {
            $data['titulo'] = "Menu do sistema";
            $data['admin_name'] = "Menu";

            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tb_menu');
            $crud->set_subject('Menu');
            $crud->fields(
                    'tx_nome_menu', 'tx_nome_controler', 'id_menu_pai');
            $crud->required_fields(
                    'tx_nome_menu', 'tx_nome_controler'
            );
            $crud->columns(
                    'tx_nome_menu', 'tx_nome_controler', 'id_menu_pai'
            );
            $crud->set_relation('id_menu_pai', 'tb_menu', 'tx_nome_menu');
            $crud->display_as('tx_nome_menu', 'Nome de exibição');
            $crud->display_as('tx_nome_controler', 'Nome da Controler');
            $crud->display_as('id_menu_pai', 'Menu Pai');
            
            $crud->order_by('id_menu');

//            $crud->fields('nome');
//            $crud->edit_fields('nome');
          //  $crud->callback_before_insert(array($this, 'geraSenha'));
           // $crud->callback_before_update(array($this, 'geraSenha'));


            $data['crud'] = $crud->render();
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }

        $this->load->view('layouts/layout', $data);
    }
    public function getMenuExibir(){
        if (!$this->sis_login->_isLogado()) {
            redirect(site_url("/login"));
        } else {
            $data['usuario'] = $this->session->userdata;
        }
        return 'teste666';
        
    }
}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */
    