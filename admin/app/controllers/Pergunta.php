<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pergunta extends CI_Controller {

    /**
     * @author Vitor Hugo Bassetto <vitorhugobassetto@gmail.com>
     * Classe controller, cadastro e alteração das informações da perguntas,
     * CRUD pergunta.
     */
    public function index() {
//warning, success, danger

        $this->load->model('Pergunta_model', 'pergunta');
        $dataPergunta = array();
        $params = $this->input->post(null, true);
        if (!empty($params['pergunta'])) {
            $dataPergunta = $params['pergunta'];
        }
//        echo '<pre>';
//        print_r($dataPergunta);
//        die();
        $qtnRegistros = $this->pergunta->maxRegisters($dataPergunta);


        $this->load->library('pagination');
        $config['base_url'] = site_url('pergunta/page');
        $config['total_rows'] = $qtnRegistros->qtn;
        $config['per_page'] = 10;


        if (!empty($this->uri->segment('3'))) {
            $pagina = $this->uri->segment('3');
        } else {
            $pagina = (int) 0;
        }

        $this->pagination->initialize($config);
//        $dataPergunta['debug'] = true;
        $dataPergunta['page_fim'] = $pagina;
        $dataPergunta['page'] = $config['per_page'];
        $dataPergunta['order'] = 'id_pergunta DESC';
        $perguntas = $this->pergunta->getDataGrid($dataPergunta);

//        $data['jquery'] = " $('.adicinarNovaPraga').click(function(){
//       console.log('teste');
//    });";
        $data['jquery'] = '';
        $data['populateForm'] = $params;
        $data['lista'] = $perguntas;
        $data['pagi'] = $this->pagination->create_links();
        $this->layout->view('pergunta/list_view', $data);
    }

    public function page() {
        redirect('/pergunta');
    }

    public function adicionar() {
        $this->load->model('pergunta_model', 'pergunta');

        $post = $this->input->post();
        $data = array();

        if (!empty($post['pergunta'])) {
            $dataPraga = $post['pergunta'];
            $id = $this->pergunta->salvar($dataPraga);

            redirect('/pergunta/' . $id);
        }
        $this->layout->view('pergunta/form_view', $data);
    }

    public function editar($id_pergunta) {
//        $data['mensagem'] = array('tipo' => 'success', 'titulo' => 'Sucesso!', 'texto' => 'Registro excluido com sucesso!');

        $data['titulo'] = 'Pergunta';
        $this->load->model('Pergunta_model', 'pergunta');
        $post = $this->input->post();

        if ($post) {
            $salvar = $this->pergunta->salvar($post['pergunta']);
            $data['mensagem'] = array('tipo' => 'success', 'titulo' => 'Sucesso!', 'texto' => 'Registro excluido com sucesso!');
        }

        $dadosPergunta['pergunta'] = current($this->pergunta->getDataGrid(array('id_pergunta' => $id_pergunta, 'limit' => 1)));
        $dadosPergunta['pergunta']['dt_pergunta'] = date('d/m/Y H:i:s', strtotime($dadosPergunta['pergunta']['dt_pergunta']));
        if (!empty($dadosPergunta)) {
            $data['populateForm'] = $dadosPergunta;
        }

        $this->layout->view('pergunta/form_view', $data);
    }

    public function imagens($id_pergunta) {

        $data['titulo'] = 'Praga Imagens';
        $this->load->model('Imgpergunta_model', 'img');
        $data['id_pergunta'] = $id_pergunta;
        $data['populateForm'] = array('pergunta' => array('id_pergunta' => $id_pergunta));

        $post = $this->input->post();
        $get = $this->input->get();
        if (!empty($this->uri->segment('4'))) {
            $acao = $this->uri->segment('4');
            if ($acao == 'excluir') {
                if (!empty($this->uri->segment('5'))) {

                    $id_pergunta = $this->uri->segment('3');
                    $id_imagem = $this->uri->segment('5');
                    $dadosImagem = current($this->img->getDataGrid(array('id_imgpergunta' => $id_imagem, 'id_pergunta' => $id_pergunta)));
                    $excluiu = $this->img->excluir($id_imagem);
                    $this->load->helper('file');
                    @unlink('./assets/img/pergunta/' . $dadosImagem['tx_url']);

                    redirect(site_url('pergunta/imagens') . '/' . $id_pergunta);


                    die();
                }
            }
        }

        if ($post) {

            $config['upload_path'] = './assets/img/pergunta';
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

                $dataImg['id_pergunta'] = $id_pergunta;
                $dataImg['tx_url'] = $imgdados['file_name'];
                $salvar = $this->img->salvar($dataImg);
            }
        }//end ifsss


        $imagens = $this->img->getDataGrid(array('id_pergunta' => $id_pergunta));

        $data['lista'] = $imagens;
        $this->layout->view('pergunta/imagens/listar_view', $data);
    }

    public function excluir() {
        //warning, success, danger

        $post = $this->input->post();

        if (!empty($post['id_pergunta'])) {
            $this->load->model('pergunta_model', 'pergunta');
//            $alterarOrdem = $this->pergunta->excluir($post['id_pergunta']);
        }
        return true;
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */
    