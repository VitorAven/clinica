<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Praga extends CI_Controller {

    /**
     * @author Vitor Hugo Bassetto <vitorhugobassetto@gmail.com>
     * Classe controller, cadastro e alteração das informações da propiedades,
     * CRUD propiedade.
     */
    
    
    public function index() {
        
        
       $this->load->model('Praga_model', 'praga');

//       $pragas = $this->praga->listarTodos();
//       echo '<pre>';
//       print_r($pragas);
//       die();
        $data['lista'] = "teste";//$this->propiedade->listarTodasAsPropiedades();
        $this->layout->view('praga/listar_view', $data);
    }

    public function adicionar() {
        $this->load->model('propiedade_model', 'propiedade');

        $post = $this->input->post();
        $data = array();

        if ($post) {
            $salvar = $this->medipropiedadeco->salvar($post);
            redirect('/propiedade/' . $salvar);
        }
        $this->layout->view('propiedade/adicionar_view');
    }

    public function editar($id_pessoa) {

        $this->load->model('propiedade_model', 'medico');
        $post = $this->input->post();

        //pega o campo especialidades
        $this->load->model('especialidade_model', 'esp');
        $especialidade = $this->esp->getAllEspecialidade();
        $this->data['especialidades'] = $especialidade;

        if ($post) {
            $salvar = $this->medico->salvar($post);
        }

        $dadosMedico = $this->medico->listarMedico($id_pessoa);

        if (!empty($dadosMedico)) {
            $dadosMedico['nr_salario'] = str_replace('.', ',', $dadosMedico['nr_salario']);
            $data['populateForm'] = $dadosMedico;
        }

        //end if

        $this->layout->view('medico/adicionar_view', $data);
    }

    public function excluir($id_pessoa) {
        if ($id == "") :
            redirect(site_url() . '/medico/list');
        else :
            $this->load->model('propiedade_model', 'medico');

            $alterarOrdem = $this->medico->excluir($id_pessoa);

            redirect('/medico/list');
        endif;
    }


}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */
    