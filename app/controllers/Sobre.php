<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sobre extends CI_Controller {

    function index() {
        $this->data['titulo'] = "Sobre";
        $this->data['admin_name'] = "Sobre";

        $this->layout->view('sobre/interna', $this->data);
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */