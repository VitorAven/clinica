<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Relatorio extends CI_Controller {

    /**
     * @author Vitor Hugo Bassetto <vitorhugobassetto@gmail.com>
     * Classe controller, cadastro e alteração das informações da perguntas,
     * CRUD pergunta.
     */
    public function index() {
        
    }

    public function rel1() {
        $data = array();
        $this->load->model('Praga_model', 'praga');
        $dataPragas = array();

        $dataPragas['order'] = 'nr_acesso DESC';
        $dataPragas['mais_acesso'] = 'nr_acesso > 0';
//        $dataPragas['debug'] = true ;

        $pragas = $this->praga->getDataGrid($dataPragas);

        $data['pragas'] = $pragas;
        $filename = time() . "_relatorio1.pdf";

        $html = $this->load->view('relatorio/relatorio1', $data, true);

// unpaid_voucher is unpaid_voucher.php file in view directory and $data variable has infor mation that you want to render on view.
//        echo '<pre>';
//        print_r($html);
//        die();

        $this->load->library('M_pdf');

        $this->m_pdf->pdf->WriteHTML($html);

//download it D save F.

        $this->m_pdf->pdf->Output("./uploads/" . $filename, "D");
    }

    public function rel2() {
        $data = array();
        $this->load->model('Pergunta_model', 'pergunta');
        $dataPragas = array();

        $dataPragas['order'] = 'nr_acesso DESC';
        $dataPragas['mais_acesso'] = 'nr_acesso > 0';
//        $dataPragas['debug'] = true ;
        
        $todasPerguntas = $this->pergunta->getDataPerguntasPorPraga($dataPragas);
//        echo '<pre>';
//        print_r($todasPerguntas);
//        die();
        $data['pragas'] = $todasPerguntas;
        $filename = time() . "_relatorio2.pdf";

        $html = $this->load->view('relatorio/relatorio2', $data, true);

// unpaid_voucher is unpaid_voucher.php file in view directory and $data variable has infor mation that you want to render on view.
//        echo '<pre>';
//        print_r($html);
//        die();

        $this->load->library('M_pdf');

        $this->m_pdf->pdf->WriteHTML($html);

//download it D save F.

        $this->m_pdf->pdf->Output("./uploads/" . $filename, "D");
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */
    