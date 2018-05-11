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
        $dataPragas['page_fim'] = $pagina;
        $dataPragas['page'] =  $config['per_page'];
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

    public function page() {
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

        $data['titulo'] = 'Praga Imagens';
        $this->load->model('Imgpraga_model', 'img');
        $data['id_praga'] = $id_praga;
        $data['populateForm'] = array('praga' => array('id_praga' => $id_praga));

        $post = $this->input->post();
        $get = $this->input->get();
        if (!empty($this->uri->segment('4'))) {
            $acao = $this->uri->segment('4');
            if ($acao == 'excluir') {
                if (!empty($this->uri->segment('5'))) {

                    $id_praga = $this->uri->segment('3');
                    $id_imagem = $this->uri->segment('5');
                    $dadosImagem = current($this->img->getDataGrid(array('id_imgpraga' => $id_imagem, 'id_praga' => $id_praga)));
                    $excluiu = $this->img->excluir($id_imagem);
                    $this->load->helper('file');
                    @unlink('./assets/img/praga/' . $dadosImagem['tx_url']);

                    redirect(site_url('praga/imagens') . '/' . $id_praga);


                    die();
                }
            }
        }

        if ($post) {

            $config['upload_path'] = './assets/img/praga';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '9999';
            $config['max_width'] = "9999";
            $config['max_height'] = "9999";

            $this->load->library('upload', $config);
            //$this->load->library('redimensiona');

            if (!$this->upload->do_upload()) {
                $data['mensagem'] = array('tipo' => 'danger', 'titulo' => 'Erro!', 'texto' => 'Erro ao salvar imagem!');

                $data['jquery'] = '';
                $this->layout->view('galeria/adcionar_view', $data);
            } else {
                $data['mensagem'] = array('tipo' => 'success', 'titulo' => 'Sucesso!', 'texto' => 'Foto salva com sucesso!');

                $imgdados = $this->upload->data();

                $dataImg['id_praga'] = $id_praga;
                $dataImg['tx_url'] = $imgdados['file_name'];
                $salvar = $this->img->salvar($dataImg);
            }
        }//end ifsss


        $imagens = $this->img->getDataGrid(array('id_praga' => $id_praga));

        $data['lista'] = $imagens;
        $this->layout->view('praga/imagens/listar_view', $data);
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
    