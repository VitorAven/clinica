<?php

class Imgpraga_model extends CI_Model {

    const _tbname = 'tb_imgpraga';
    const _pK = 'id_imgpraga';
    const _ind = array(
        '(int)' => 'id_praga',
        '(string)' => 'tx_url'
    );

    public function __construct() {
        parent::__construct();
    }




    public function getDataGrid($params = null) {
        try {
            $this->db->select("*");
            $this->db->from(self::_tbname);
            //pega a PK

            if (!empty($params[self::_pK])) {
                $this->db->where(self::_pK, $params[self::_pK]);
            }

            //pega todos os campos default

            foreach (self::_ind as $type => $indice) {
                if (!empty($params[$indice])) {
                    if ($type == '(string)') {
                        $this->db->like($indice, (string) $params[$indice]);
                    } elseif ($type == '(int)') {
                        $this->db->where($indice, (int) $params[$indice]);
                    }
                }
            }

            if (!empty($params['page_ini']) && !empty($params['page_fim'])) {
                $this->db->limit($params['page_ini'], $params['page_fim']);
            } elseif (!empty($params['page_fim'])) {
                $this->db->limit($params['page_fim']);
            }
            if (!empty($params['limit'])) {
                $this->db->limit($params['limit']);
            }

            $data = $this->db->get()->result_array();
            if (!empty($params['debug'])) {
                echo '<pre>';
                print_r($this->db->last_query());
                die();
            }

//           echo '<pre>';
//           print_r($this->db->last_query());
//           die();
        } catch (Exception $ex) {
            return array('erro' => $ex);
        }
        return $data;
    }

    public function maxRegisters($params = null) {
        try {
            $this->db->select("COUNT(" . self::_pK . ") AS qtn");
            $this->db->from(self::_tbname);
            if (!empty($params[self::_pK])) {
                $this->db->where(self::_pK, $params[self::_pK]);
            }

            if (!empty($params['tx_url'])) {
                $this->db->or_like('tx_nomecomum', $params['tx_nomepraga']);
                $this->db->or_like('tx_nomecientifico', $params['tx_nomepraga']);
            }

            $data = $this->db->get()->row();
//             echo '<pre>';
//           print_r($this->db->last_query());
//           die();
        } catch (Exception $ex) {
            return array('erro' => $ex);
        }
        return $data;
    }


}

?>