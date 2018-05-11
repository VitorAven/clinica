<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_custom
 *
 * @author VitorHugo
 */
class model_custom extends Grocery_crud_model {

//put your code here
    function get_tables_personalizadas($tables = null) {
        $selection_primary_key = $this->get_primary_key($field_info->selection_table);

        if(!empty($tables)){
            $this->db->get($tables)->result();
        }
//$this->db->where(....);
//$this->db->order_by("{$field_info->selection_table}.{$field_info->title_field_selection_table}");
//$results = $this->db->get($field_info->selection_table)->result();

        $this->db->where();
     //   $results_array = array();
     //   foreach ($results as $row) {
     //       if (!isset($selected_values[$row->{$field_info->primary_key_alias_to_selection_table}]))
     //           $results_array[$row->{$field_info->primary_key_alias_to_selection_table}] = $row->{$field_info->title_field_selection_table};
     //   }


        return $results_array;
    }

}
