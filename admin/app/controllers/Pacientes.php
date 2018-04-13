<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pacientes extends CI_Controller {

    /**
     * @author Vitor Hugo Bassetto <vitorhugobassetto@gmail.com>
     * 
     */
    public function index() {
        $this->load->model('paciente_model', 'paciente');
        $data['lista'] = $this->paciente->listarTodosPacientes();
        $this->layout->view('paciente/listar_view', $data);
    }

    public function getPacienteAjax($param) {
        $this->load->model('paciente_model', 'paciente');
        $paciente = $this->paciente->getPacienteByCpf($param);

        if (!empty($paciente)) {
            echo json_encode($paciente);
        } else {
            echo json_encode('false');
        }
        die();
    }

    public function adicionar() {
        $this->load->model('paciente_model', 'paciente');

        // pega todos os estados
        $this->load->model('endereco_model', 'end');
        $estados = $this->end->getAllEstados();
        $this->data['estados'] = $estados;

        $post = $this->input->post();
        $data = array();

        if ($post) {
            $salvar = $this->paciente->salvar($post);
            redirect('/paciente/' . $salvar);
        }

        $this->layout->view('paciente/adicionar_view');
    }

    public function editar($id_pessoa) {
        $data['jquery'] ='';
        $this->load->model('paciente_model', 'paciente');
        $post = $this->input->post();

        // pega todos os estados
        $this->load->model('endereco_model', 'end');
        $estados = $this->end->getAllEstados();
        $this->data['estados'] = $estados;

        if ($post) {
            $salvar = $this->paciente->salvar($post);
        }

        $dadosPaciente = $this->paciente->listarPaciente($id_pessoa);

        if (!empty($dadosPaciente)) {
            
            $cidades = $this->retornaCidade($dadosPaciente->id_estado);
            $data['cidades'] = $cidades;
            $data['populateForm'] = $dadosPaciente;
        }


        //end if

        $this->layout->view('paciente/adicionar_view', $data);
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

    public function retornaCidade($id_estado) {

        $this->load->model('endereco_model', 'end');
        $cidades = $this->end->getCidadesByUf($id_estado);

        return $cidades;
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */
    