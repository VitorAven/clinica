<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Praga extends CI_Controller {

    /**
     * @author Vitor Hugo Bassetto <vitorhugobassetto@gmail.com>
     * Classe controller, cadastro e alteração das informações da pragas,
     * CRUD praga.
     */
    public function index() {
//warning, success, danger

        $this->load->model('Praga_model', 'praga');
        $dataPragas = array();
        $params = $this->input->post(null, true);
        if (!empty($params['praga'])) {
            $dataPragas = $params['praga'];
        }
//        echo '<pre>';
//        print_r($dataPragas);
//        die();
        $qtnRegistros = $this->praga->maxRegisters($dataPragas);


        $this->load->library('pagination');
        $config['base_url'] = site_url('praga/page');
        $config['total_rows'] = $qtnRegistros->qtn;
        $config['per_page'] = 10;


        if (!empty($this->uri->segment('3'))) {
            $pagina = $this->uri->segment('3');
        } else {
            $pagina = (int) 0;
        }

        $this->pagination->initialize($config);
//        $dataPragas['debug'] = true;
        $dataPragas['page_fim'] = $pagina+ $config['per_page'];
        $dataPragas['page_ini'] = $pagina;
        $dataPragas['order'] = 'id_praga DESC';
        $pragas = $this->praga->getDataGrid($dataPragas);

//        $data['jquery'] = " $('.adicinarNovaPraga').click(function(){
//       console.log('teste');
//    });";
        $data['jquery'] = '';
        $data['populateForm'] = $params;
        $data['lista'] = $pragas;
        $data['pagi'] = $this->pagination->create_links();
        $this->layout->view('praga/list_view', $data);
    }
public function page(){
    redirect('/praga');
}

public function adicionar() {
        $this->load->model('praga_model', 'praga');

        $post = $this->input->post();
        $data = array();

        if (!empty($post['praga'])) {
            $dataPraga = $post['praga'];
            $id = $this->praga->salvar($dataPraga);

            redirect('/praga/' . $id);
        }
        $this->layout->view('praga/form_view', $data);
    }

    public function editar($id_praga) {
//        $data['mensagem'] = array('tipo' => 'success', 'titulo' => 'Sucesso!', 'texto' => 'Registro excluido com sucesso!');

        $data['titulo'] = 'Praga';
        $this->load->model('Praga_model', 'praga');
        $post = $this->input->post();

        //pega o campo especialidades
        $this->load->model('ImgPraga_model', 'img');
//        $this->data['especialidades'] = $especialidade;

        if ($post) {
            $salvar = $this->praga->salvar($post['praga']);
            $data['mensagem'] = array('tipo' => 'success', 'titulo' => 'Sucesso!', 'texto' => 'Registro excluido com sucesso!');
        }

        $dadosPraga['praga'] = current($this->praga->getDataGrid(array('id_praga' => $id_praga, 'limit' => 1)));

        if (!empty($dadosPraga)) {
            $data['populateForm'] = $dadosPraga;
        }


        //end if

        $this->layout->view('praga/form_view', $data);
    }
    public function imagens($id_praga) {
        echo '<pre>';
        print_r($id_praga);
        die();
    }

    public function excluir() {
        //warning, success, danger

        $post = $this->input->post();

        if (!empty($post['id_praga'])) {
            $this->load->model('praga_model', 'praga');
//            $alterarOrdem = $this->praga->excluir($post['id_praga']);
        }
        return true;
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */
    