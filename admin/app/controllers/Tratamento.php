<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tratamento extends CI_Controller {

    /**
     * @author Vitor Hugo Bassetto <vitorhugobassetto@gmail.com>
     *
     */
    public function index() {
        $this->load->model('funcionario_model', 'funcionario');
        $data['lista'] = $this->funcionario->listarTodosTratamento();

        $this->layout->view('funcionario/listar_view', $data);
    }

    public function adicionar() {
        $this->load->model('funcionario_model', 'funcionario');

        $post = $this->input->post();
        $data = array();

        if ($post) {
            $salvar = $this->funcionario->salvar($post);
            redirect('/funcionario/' . $salvar);
        }

        $this->layout->view('funcionario/adicionar_view');
    }

    public function editar($id_pessoa) {

        $this->load->model('funcionario_model', 'funcionario');
        $post = $this->input->post();

        if ($post) {
            $post['id_pessoa'] = $id_pessoa;
            $salvar = $this->funcionario->salvar($post);
        }

        $dadosFuncionario = $this->funcionario->listar_funcionario($id_pessoa);

        if (!empty($dadosFuncionario)) {
            $dadosFuncionario['nr_salario'] = str_replace('.', ',', $dadosFuncionario['nr_salario']);
            $data['populateForm'] = $dadosFuncionario;
        }

        //end if

        $this->layout->view('funcionario/adicionar_view', $data);
    }

    public function getFunByIdPessoaajax($id_pessoa) {
        $this->load->model('funcionario_model', 'funcionario');
        $funcionario = $this->paciente->getFuncionarioByIdPessoa($id_pessoa);

        if (!empty($funcionario)) {
            echo json_encode($funcionario);
        } else {
            echo json_encode('false');
        }
        die();
    }

    public function excluir($id_pessoa) {
        if ($id == "") {
            redirect(site_url() . '/funcionario/list');
        } else {
            $this->load->model('funcionario_model', 'funcionario');

            $alterarOrdem = $this->funcionario->excluir($id_pessoa);

            redirect('/funcionario/list');
        }
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */
