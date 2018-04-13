<?php

class Pessoa_model extends CI_Model {

    public function getPessoaByCpf($cpf) {
        unset($query);
        $this->db->select("tb_pessoa.*");
        $this->db->from("tb_pessoa");
        $this->db->where('tb_pessoa.tx_cpf like "' . $cpf . '"');
        $query = $this->db->get()->result_array();
        $query = current($query);
        /* print_r($this->db->last_query());
          die(); */
        return $query;
    }

    public function adicionarPessoa($param) {
        $pessoa = array();
        $this->db->start_cache();
        if (!empty($param['tx_nome'])) {
            $pessoa['tx_nome'] = $param['tx_nome'];
        }
        if (!empty($param['tx_sobrenome'])) {
            $pessoa['tx_sobrenome'] = $param['tx_sobrenome'];
        }
        if (!empty($param['dt_nasc'])) {
            $pessoa['dt_nasc'] = $param['dt_nasc'];
        }
        if (!empty($param['tx_cpf'])) {
            $pessoa['tx_cpf'] = $param['tx_cpf'];
        }
        if (!empty($param['tx_rg'])) {
            $pessoa['tx_rg'] = $param['tx_rg'];
        }
        if (!empty($param['tx_rg'])) {
            $pessoa['tx_rg'] = $param['tx_rg'];
        }
        if (!empty($param['id_pessoa'])) {
            $pessoa['id_pessoa'] = $param['id_pessoa'];
            $pessoaLastId = $param['id_pessoa'];
            $this->db->where('id_pessoa = ' . $pessoaLastId);
            $query = $this->db->update('tb_pessoa', $pessoa);
        } else {
            $query = $this->db->insert('tb_pessoa', $pessoa);
            $pessoaLastId = $this->db->insert_id();
        }

        $this->db->stop_cache();
        $this->db->flush_cache();
        return $pessoaLastId;
    }

    private function listarUltimo() {
        unset($query);
        $this->db->select("pessoa.id");
        $this->db->from("pessoa");
        $this->db->order_by('pessoa.id', 'DESC');
        $query = $this->db->get()->row();

        return $query->id;
    }

    public function editar($post) {
        unset($query);
        $id = $post['id'];
        $dados = array(
            'nome' => $post['nome'],
            'sobre_nome' => $post['sobre_nome'],
            'dt_nasc' => $post['dt_nasc'],
            'cpf' => $post['cpf'],
            'rg' => $post['rg']
        );

        $this->db->where('id', $id);
        $query = $this->db->update('pessoa', $dados);

        return $query;
    }

    public function excluir($id) {
        unset($query);

        $this->db->where('id', $id);
        $query = $this->db->delete('pessoa');

        return $query;
    }

}

?>