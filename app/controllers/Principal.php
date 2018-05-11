<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Principal extends CI_Controller {

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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */