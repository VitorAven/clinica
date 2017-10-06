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



        $this->data['lista'] = $this->pessoa->listarTodosPacientes();

        $this->layout->view('paciente/listar_view', $this->data);
    }

   
}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */
    