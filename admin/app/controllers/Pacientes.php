<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pacientes extends CI_Controller {

    /**
     * @author Vitor Hugo Bassetto <vitorhugobassetto@gmail.com>
     * 
     */
    public function index() {
        $this->load->model('pessoa_model', 'pessoa');
        $data['lista'] = $this->pessoa->listarTodosPacientes();
        $this->layout->view('paciente/listar_view', $data);
    }

    public function adicionar() {
        $this->load->model('pessoa_model', 'paciente');
        $this->load->model('endereco_model', 'end');

        $post = $this->input->post();
        $data = array();

        if ($post) {
            $this->load->model('paciente_model', 'paciente');
            
            $salvar = $this->paciente->salvar($post);
            redirect('/paciente/' . $salvar);
        }
        $estados = $this->end->getAllEstados();
      
        $this->data['estados'] = $estados;
      
        $this->layout->view('paciente/adicionar_view');
    }

    public function editar($id) {
        if (!$this->ion_auth->logged_in()) :
            redirect(site_url("login"));
        else :
            $data['usuario'] = $this->ion_auth->user()->row();
            $data['grupo'] = $this->ion_auth->get_users_groups($data['usuario']->id)->result();
        endif;

        $this->load->model('pessoa_model', 'pessoa');
        $post = $this->input->post();

        $data['item'] = $this->pessoa->listar_paciente($id);
        //print_r($data['item']);die();

        if ($post) {
            $post['id'] = $id;
            $salvar = $this->pessoa->editar($post);

            redirect('/paciente/' . $id);
        }//end if

        $this->layout->view('paciente/editar_view', $data);
    }

    public function ativar($id = "") {
        if (!$this->ion_auth->logged_in()) :

            redirect(site_url('login'));
        else :
            $data['usuario'] = $this->ion_auth->user()->row();
            $data['grupo'] = $this->ion_auth->get_users_groups($data['usuario']->id)->result();
        endif;

        if ($id == "") :
            redirect(site_url() . '/paciente/list');
        else :
            $this->load->model('paciente_model', 'paciente');

            $alterarOrdem = $this->paciente->ativar($id);
            redirect(site_url() . '/paciente/list');
        endif;
    }

    public function desativar($id = "") {
        if (!$this->ion_auth->logged_in()) :

            redirect(site_url('login'));
        else :
            $data['usuario'] = $this->ion_auth->user()->row();
            $data['grupo'] = $this->ion_auth->get_users_groups($data['usuario']->id)->result();
        endif;

        if ($id == "") :
            redirect(site_url() . '/noticia/list');
        else :
            $this->load->model('paciente_model', 'paciente');

            $alterarOrdem = $this->paciente->desativar($id);
            redirect(site_url() . '/paciente/list');
        endif;
    }

    public function excluir($id) {
        if (!$this->ion_auth->logged_in()) :
            redirect(site_url('login'));
        else :
            $data['usuario'] = $this->ion_auth->user()->row();
            $data['grupo'] = $this->ion_auth->get_users_groups($data['usuario']->id)->result();
        endif;

        if ($id == "") :
            redirect(site_url() . '/paciente/list');
        else :
            $this->load->model('pessoa_model', 'pessoa');

            $alterarOrdem = $this->pessoa->excluir($id);

            redirect('/paciente/list');
        endif;
    }

  
}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */
    