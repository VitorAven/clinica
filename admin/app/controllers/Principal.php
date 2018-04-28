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

        $this->layout->view('home_view', $this->data);
    }

    function pegaPragas() {
//        die();
//        file_put_contents('/path/to/local/file', file_get_contents('http://domain.com/path/to/remote/file'));
//$this->load->library('Simple_html_dom_node');
        require_once(APPPATH . 'libraries/Simple_html_dom_node.php');
//        require_once '../libraries/Simple_html_dom_node.php';
//        $url = 'http://54.94.188.1/listapragas/pragas.php?pagina=all';
//        $html = file_get_html($url);
//        $espressao = "/<a href=\'praga.php\?id\=(.*?)\'>(.*?)<\/a>/";
//        preg_match_all($espressao, $html, $result);
        set_time_limit(0);

        $this->load->model('Praga_model', 'praga');
        $this->load->model('ImgPraga_model', 'imgpraga');

        $pragas = $this->praga->getDatagrid();
        $this->load->helper('download');

        foreach ($pragas as $pra) {

//            $url = 'http://54.94.188.1/listapragas/praga.php?id=' . $pra['id_pagina'];
//            $html = file_get_html($url);
//            //<div class="tab-pane active" id="1">
//            $espressao = '/src=\'\.\.\/defesavegetal\/img\/pragas\/(.*?)\'/';
//            preg_match_all($espressao, $html, $result2);
//pega imagem
//            $urls = array();
//            $nomes = array();
//            foreach ($result2[0] as $key => $arrayTest){
//                $urls[$arrayTest] =$arrayTest;
//                $nomes[$arrayTest] =$result2[1][$key];
//            }
//            $urls = ksort($urls);s
//            echo '<pre>';
//            print_r($urls);
//            print_r($nomes);
//            die();
//            foreach ($urls as $key => $url) {
//                $url = str_replace('src=\'../', '', $url);
//                $url = str_replace('\'', '', $url);
//                echo $url;
//               $data = 'Here is some text!';
//$name = $result2[0][$key];
//$arquivo = force_download('http\://54.94.188.1/' .$url, $name);

//                $this->imgpraga->salvar(array('id_praga' => $pra['id_praga'], 'tx_url' => $nomes[$key]));
////          
//                copy('http://54.94.188.1/' . $url, $_SERVER['DOCUMENT_ROOT'] . '/clinica/admin/assets/img/praga/' . $nomes[$key]);
//            }
            //pega conteudo
//            $texto = '';
//
//            $arr_nomes = array(
//                'Nome Científico',
//                'Ordem', 'Família',
//                'Status Regulatório',
//                'Sinonímias',
//                'Nomes Comuns',
//                'Hospedeiros',
//                'Parte(s) afetada(s)',
//                'Fase(s) em que ocorre o ataque',
//                'Significado',
//                'Bioecologia',
//                'Sintomas',
//                'Controle',
//                'Referências'
//            );
//            $text = $result2[0];
//            echo '<pre>';
//            print_r($result2);
//            die();
//            $descricao_pragra = '';
//            foreach ($arr_nomes as $arr_n) {
//                foreach ($text as $res) {
//
////                    print_r($res);
////                    echo '<br>';
//                    if (strpos($res, $arr_n)) {
//                        $descricao_pragra .= trim($res, "\t\n\r\0\x0B") . "<br>";
//                    }
//                }
////                echo '<br>';
//            }
//$descricao_pragra = trim($descricao_pragra,'\t');
//            $this->praga->salvar(array('id_praga' => $pra['id_praga'], 'tx_descricao' => trim($descricao_pragra)));
//            die();
//            $save = array('id_pagina' => $result[1][$key], 'tx_nomecientifico' => $result[2][$key], 'tx_nomecomum' => $result[2][$key + 1]);
//            $this->load->model('Praga_model', 'praga');
//            $especialidade = $this->praga->salvar($save);
//            unset($result[1][$key + 1]);

//            echo $pra['tx_nomecomum'];
        }
        echo '<h1>FuncinouPorra!!!</h1>';
        die();
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