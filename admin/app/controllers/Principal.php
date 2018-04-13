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
//        die();
//$this->load->library('Simple_html_dom_node');
//        require_once(APPPATH . 'libraries/Simple_html_dom_node.php');

//        require_once '../libraries/Simple_html_dom_node.php';
//        $url = 'http://54.94.188.1/listapragas/pragas.php?pagina=all';
//        $html = file_get_html($url);
//        $espressao = "/<a href=\'praga.php\?id\=(.*?)\'>(.*?)<\/a>/";
//        preg_match_all($espressao, $html, $result);
//        set_time_limit(0);

//        $this->load->model('Praga_model', 'praga');
//        $pragas = $this->praga->listarTodos();

//        foreach ($pragas as $pra) {
//            echo '<pre>';
//            print_r($pra);
//            die();
////            $url = 'http://54.94.188.1/listapragas/praga.php?id=' . $pra['id_pagina'];
////            $html = file_get_html($url);
////            //<div class="tab-pane active" id="1">
////            $espressao = '/<p>(.*?)<\/p>/';
////            preg_match_all($espressao, $html, $result2);
////
////            $texto = '';
////
////            $arr_nomes = array(
////                'Nome Científico', 
////                'Ordem', 'Família', 
////                'Status Regulatório',
////                'Sinonímias',
////                'Nomes Comuns',
////                'Hospedeiros',
////                'Parte(s) afetada(s)',
////                'Fase(s) em que ocorre o ataque',
////                'Significado',
////                'Bioecologia',
////                'Sintomas',
////                'Controle'
////                );
////            $text = $result2[0];
////            $descricao_pragra ='';
////            foreach ($text as $res) {
////                foreach ($arr_nomes as $arr_n){
////                   
////                    if(strpos($res, $arr_n)){
////                        $descricao_pragra .= $res."<br>";
////                    }
////                }
////            }
////            $this->praga->salvar(array('id_praga'=>$pra['id_praga'], 'tx_descricao'=>$descricao_pragra));
//            
////die();
////            $save = array('id_pagina' => $result[1][$key], 'tx_nomecientifico' => $result[2][$key], 'tx_nomecomum' => $result[2][$key + 1]);
////            $this->load->model('Praga_model', 'praga');
////            $especialidade = $this->praga->salvar($save);
////            unset($result[1][$key + 1]);
//        }
//
//
//        echo '<pre>';
//        print_r('Funcionou ');
//        die();
        $this->data['titulo'] = "Principal";
        $this->data['admin_name'] = "Principal";

        $this->layout->view('home_view', $this->data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */