<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cultura extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function index() {
        $this->data['titulo'] = "Principal";
        $this->data['admin_name'] = "Principal";


        $this->load->model('Praga_model', 'praga');
        $dataPragas['limit'] = 4;
        $pragas = $this->praga->getDataGrid($dataPragas);
        $this->load->model('Imgpraga_model', 'img');
        foreach ($pragas as $key => $pra) {
            $pragas[$key]['img'] = current($this->img->getDataGrid(array('id_praga' => $pra['id_praga'], 'limit' => 1)));
        }

        $this->data['pragas'] = $pragas;
//        $this->load->view('layouts/home', $this->data);
        $this->layout->view('layouts/home', $this->data);
    }

    function cadastrapergunta() {
        $params = $this->input->get(null, true);
        $this->load->model('Pergunta_model', 'pergunta');

        $pertunta = $params;
        $pertunta['dt_pergunta'] = date('Y-m-d H:i:s');

       
        if (!empty($pertunta['id_praga'])) {
            $this->pergunta->salvar($pertunta);
         
            json_encode($pertunta);
        } else {
            $data['danger'] = 'Salvo com sucesso, aguarde até reposta via email.';
            json_encode($pertunta);
        }
    }

    function milho() {

        $this->load->model('Praga_model', 'praga');
        $dataPragas = array();
        $params = $this->input->post(null, true);
        if (!empty($params['praga'])) {
            $dataPragas = $params['praga'];
        }
        $dataPragas['st_milho'] = 1;
        $qtnRegistros = $this->praga->maxRegisters($dataPragas);

        $this->load->library('pagination');
        $config['base_url'] = site_url('cultura/milho/page');
        $config['total_rows'] = $qtnRegistros->qtn;
        $config['per_page'] = 12;


        if (!empty($this->uri->segment('4'))) {
            $pagina = $this->uri->segment('4');
        } else {
            $pagina = (int) 0;
        }

        $this->pagination->initialize($config);
//        $dataPragas['debug'] = true;
        $dataPragas['page_fim'] = $pagina;
        $dataPragas['page'] = $config['per_page'];
        $dataPragas['order'] = 'id_praga DESC';
        $pragas = $this->praga->getDataGrid($dataPragas);

        $this->load->model('Imgpraga_model', 'img');
        foreach ($pragas as $key => $pra) {
            $pragas[$key]['img'] = current($this->img->getDataGrid(array('id_praga' => $pra['id_praga'], 'limit' => 1)));
        }
//        $data['jquery'] = " $('.adicinarNovaPraga').click(function(){
//       console.log('teste');
//    });";
        $data['jquery'] = '';
        $data['populateForm'] = $params;
        $data['pragas'] = $pragas;
        $data['pagi'] = $this->pagination->create_links();
        $this->layout->view('milho/home', $data);
    }

    function soja() {

        $this->load->model('Praga_model', 'praga');
        $dataPragas = array();
        $params = $this->input->post(null, true);
        if (!empty($params['praga'])) {
            $dataPragas = $params['praga'];
        }
        $dataPragas['st_soja'] = 1;
        $qtnRegistros = $this->praga->maxRegisters($dataPragas);

        $this->load->library('pagination');
        $config['base_url'] = site_url('cultura/soja/page');
        $config['total_rows'] = $qtnRegistros->qtn;
        $config['per_page'] = 12;


        if (!empty($this->uri->segment('4'))) {
            $pagina = $this->uri->segment('4');
        } else {
            $pagina = (int) 0;
        }

        $this->pagination->initialize($config);
//        $dataPragas['debug'] = true;
        $dataPragas['page_fim'] = $pagina;
        $dataPragas['page'] = $config['per_page'];
        $dataPragas['order'] = 'id_praga DESC';
//        $dataPragas['debug']=true;
        $pragas = $this->praga->getDataGrid($dataPragas);

        $this->load->model('Imgpraga_model', 'img');
        foreach ($pragas as $key => $pra) {
            $pragas[$key]['img'] = current($this->img->getDataGrid(array('id_praga' => $pra['id_praga'], 'limit' => 1)));
        }
//        $data['jquery'] = " $('.adicinarNovaPraga').click(function(){
//       console.log('teste');
//    });";
        $data['jquery'] = '';
        $data['populateForm'] = $params;
        $data['pragas'] = $pragas;
        $data['pagi'] = $this->pagination->create_links();
        $this->layout->view('soja/home', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */