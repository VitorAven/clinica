<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

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
    public function index() {
        $this->load->model('banner_model', 'banner');
        $this->load->model('galeria_model', 'galeria');
        $this->load->model('noticias_model', 'noticias');


        $dados['banners'] = $this->banner->listarTodos();
        $dados['noticias'] = $this->noticias->listarTodos();
        
        $dados['galerias'] = $this->galeria->listarTodos();
        $dados['pag'] = 'paginas/home_view';
        $this->load->view('layout2', $dados);
    }

    public function noticias($id) {
        
        $this->load->model('noticias_model', 'noticias');

        $dados['noticia'] = $this->noticias->listar($id);
    
        $this->load->view('paginas/noticias_view', $dados);
    }
    public function galeria($id) {
        
        $this->load->model('galeria_model', 'galeria');

        $dados['galerias'] = $this->galeria->listarTodasImg($id);
        $dados['pag'] = 'paginas/galeria_view';
        $this->load->view('layout', $dados);
    }

    public function layout() {
        $dados['pag'] = 'home_view';
        $this->load->view('layout2', $dados);
    }

    public function contato() {
        $dados['pag'] = 'pagina/home_view';
        $this->load->view('layout', $dados);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */