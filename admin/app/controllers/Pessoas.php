<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pessoas extends CI_Controller {

    public $id_pessoa;
    public $tx_nome;
    public $dt_nasc;
    public $tx_cpf;
    public $tx_rg;
    public $tx_sobrenome;

    /**
     * @author Vitor Hugo Bassetto <vitorhugobassetto@gmail.com>
     * 
     */
    public function index() {
        $this->load->model('Grocery_crud_model');
//        $data=array('output' => '' , 'js_files' => array() , 'css_files' => array());
        $this->data['titulo'] = "Pessoas";
        $this->data['admin_name'] = "Pessoas";


        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('tb_pessoa');
            $crud->set_subject('Cadastro de pessoa');
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

    public function validacpfajax($param) {
        
        
        $this->load->model('pessoa_model', 'pessoa');
        $pessoa = $this->pessoa->getPessoaByCpf($param);
        
        if(!empty($pessoa)){
            echo json_encode($pessoa);
        }else{
            echo json_encode('false');
        }
        die();
    }
     public function retornaCidadeajax($param) {       
        
        $this->load->model('endereco_model', 'end');
        $cidades = $this->end->getCidadesByUf($param);
        
        $opts ='';
        foreach ($cidades as $cid){
            $opts.=" <option value='{$cid['id_municipio']};' >{$cid['tx_nome']}</option>";
        }
      
        if(!empty($opts)){
            echo $opts;
        }else{
            echo json_encode('false');
        }
        die();
    }
    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
