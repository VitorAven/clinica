<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trabalhe extends CI_Controller {
OIEEEEEEEEEEEEEEEEEEEEEEEE
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
        $post = $this->input->post();
        if ($post) {
            //print_r($post);die();
            $config1['upload_path'] = './uploads/curriculos/';
            $config1['allowed_types'] = 'doc|pdf|docx';

            $this->load->library('upload', $config1);

            if (!$this->upload->do_upload()) {
                redirect(site_url("trabalhe"));
            } else {
                $imgdados = $this->upload->data();
                $curriculo = $imgdados['file_name'];

                // Array ( [nome] => teste [email] => teste@webzero.com.br [telefone] => (11) 11111-1111 [obj_prof] => obj prof [msg] => teste [enviar] => Enviar )

                $menssagem = "Contato"
                        . "\r\nNome: " . $post['nome']
                        . "\r\nEmail: " . $post['email']
                        . "\r\nTelefone: " . $post['telefone']
                        . "\r\nEmail: " . $post['email']
                        . "\r\nObjetivo Profissional: " . $post['obj_prof']
                        . "\r\nMensagem: " . $post['msg']
                        . "\r\nCurriículo: <a href='" . base_url() . $curriculo . "'>" . base_url() . $curriculo . "</a>"
                ;

                $this->load->library('email');
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'smtp.hotelpousadaourinhos.com.br';
                $config['smtp_port'] = '587';
                $config['smtp_timeout'] = '7';
                $config['smtp_user'] = 'contato_site@hotelpousadaourinhos.com.br';
                $config['smtp_pass'] = '50gjjsfl4';
                $config['charset'] = 'utf-8';
                $config['newline'] = "\r\n";
                $config['mailtype'] = 'html'; // or html
                //  $config['validation'] = TRUE; // bool whether to validate email or not      

                $this->email->initialize($config);

                $this->email->from('contato_site@hotelpousadaourinhos.com.br', 'myname');
                $this->email->to('vitorhugobassetto@gmail.com');

                $this->email->subject('Email Test');
                $this->email->message($mensagem);

                $this->email->send();

                //echo $this->email->print_debugger();
                //Array ( [nome] => asd [tel] => asdasd [email] => asdasd [assunto] => asdasd [mensagem] => adsasd );
            }
        }

        $data['conteudo'] = 'paginas/trabalhe_view';
        $data['item_menu'] = 7;
        $this->load->view('layouts/layout', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
