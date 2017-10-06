<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permissoes extends CI_Controller {

    /**
     * @author Vitor Hugo Bassetto <vitorhugobassetto@gmail.com>
     * 
     */
    public function index() {
        try {
            $data['titulo'] = "Permissões";
            $data['admin_name'] = "Permissões";

            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tb_permissao');
            $crud->set_subject('Menu');
            $crud->fields(
                    'id_usuario', 'id_menu', 'st_incluir_pagina', 'st_editar_pagina', 'st_deletar_pagina', 'st_visualizar_pagina'
            );
            $crud->required_fields(
                    'id_usuario', 'id_menu', 'st_incluir_pagina', 'st_editar_pagina', 'st_deletar_pagina', 'st_visualizar_pagina'
            );
            $crud->columns(
                    'id_usuario', 'id_menu'
            );


            $crud->set_relation('id_menu', 'tb_menu', 'tx_nome_menu');
            $crud->set_relation('id_usuario', 'tb_usuario', 'tx_nome_usuario');
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

    public function getMenuExibir() {

        return 'teste666';
    }

    public function usuario($id_usuario) {
        try {

            $this->data['titulo'] = "Permissões";
            $this->data['admin_name'] = "Permissões";

            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tb_permissao');
            $crud->set_subject('Menu');
            $crud->fields(
                    'id_usuario', 'id_menu', 'st_incluir_pagina', 'st_editar_pagina', 'st_deletar_pagina', 'st_visualizar_pagina'
            );
            $crud->required_fields(
                    'id_usuario', 'id_menu', 'st_incluir_pagina', 'st_editar_pagina', 'st_deletar_pagina', 'st_visualizar_pagina'
            );
            $crud->columns(
                    'id_usuario', 'id_menu'
            );

            $crud->display_as('st_incluir_pagina', 'Incluir novo');
            $crud->display_as('st_editar_pagina', 'Editar');
            $crud->display_as('st_deletar_pagina', 'Deletar');
            $crud->display_as('st_visualizar_pagina', 'Visualizar');
            $crud->display_as('id_usuario', 'Usuário');
            $crud->display_as('id_menu', 'Menu');

            $crud->set_relation('id_menu', 'tb_menu', 'tx_nome_menu');
            $crud->set_relation('id_usuario', 'tb_usuario', 'tx_nome_usuario');


            $crud->where('tb_permissao.id_usuario =' . $id_usuario);
            $crud->order_by('id_menu');

//            $crud->fields('nome');
//            $crud->edit_fields('nome');
            //  $crud->callback_before_insert(array($this, 'geraSenha'));
            // $crud->callback_before_update(array($this, 'geraSenha'));


            $data['crud'] = $crud->render();
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }

        $this->load->view('layouts/layout', $this->data);
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */
    