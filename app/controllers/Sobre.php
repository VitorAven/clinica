<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sobre extends CI_Controller {

    function index() {
        $this->data['titulo'] = "Sobre";
        $this->data['admin_name'] = "Sobre";

         $this->load->model('Praga_model', 'praga');
        $dataPragas['limit'] = 4;
        $pragas = $this->praga->getDataGrid($dataPragas);
        $this->load->model('Imgpraga_model', 'img');
        foreach ($pragas as $key => $pra) {
            $pragas[$key]['img'] = current($this->img->getDataGrid(array('id_praga' => $pra['id_praga'], 'limit' => 1)));
        }

        $this->data['pragas'] = $pragas;
        $this->layout->view('sobre/interna', $this->data);
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */