<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Praga extends CI_Controller {

    public function index() {
//warning, success, danger

        $this->load->model('Praga_model', 'praga');
        $dataPragas = array();
        $params = $this->input->post(null, true);
        if (!empty($params['praga'])) {
            $dataPragas = $params['praga'];
        }

        $qtnRegistros = $this->praga->maxRegisters($dataPragas);

        $this->load->library('pagination');
        $config['base_url'] = site_url('praga/page');
        $config['total_rows'] = $qtnRegistros->qtn;
        $config['per_page'] = 12;


        if (!empty($this->uri->segment('3'))) {
            $pagina = $this->uri->segment('3');
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
        $this->layout->view('praga/listar', $data);
    }

    public function pragaId($id_praga) {
        $this->load->model('Praga_model', 'praga');
        $dataPragas['id_praga'] = $id_praga;
        $data['praga'] = $this->praga->getDataGrid($dataPragas);
        $this->load->model('Imgpraga_model', 'img');
        $data['imgens'] = $this->img->getDataGrid(array('id_praga' => $id_praga));
        $this->layout->view('praga/interna', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */