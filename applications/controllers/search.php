<?php
class Search extends Controller{

    public function base(){

        if( $this->user === false ){
            redirect('error');
        }

        // default
        $idcard = input_post('idcard');
        $name = input_post('name');
        $province = input_post('province');
        $hos_select = input_post('hos_id', $this->user->hos_id);
        $def_year = input_post('year', date('Y'));
        $year_range = range(2016, date('Y'));

        $db = $this->load_db();

        $sql = "SELECT `id`, `name`
        FROM `hospital`
        ORDER BY `id` DESC;";
        $db->select($sql);
        $hospitals = $db->get_items();

        $action = input_post('action');
        $patient_list = array();
        if ( $action === 'start_search' ) {

            $token = check_token(input_post('token'), 'search_patient');
            if ( $token !== true ) {
                redirect('error');
            }

            $sql = "SELECT `id`,
                CONCAT(`firstname`,' ',`lastname`) AS `name`,
                `idcard`,
                `diag`,
                `house_no`,
                `tambon`,
                `amphur`,
                `province`,
                `zipcode`,
                `regula`,
                `doctor`,
                `hos_id`,
                `date_add`,
                `status`
            FROM `patients`
            WHERE `status` = '1'
            AND `date_add` LIKE '$def_year%' ";

            if( $idcard !== false ){
                $sql .= "AND `idcard` LIKE '$idcard%' ";
            }

            if( $hos_select !== 'all' ){
                $sql .= "AND `hos_id` = '$hos_select' ";
            }

            if( $name !== false ){
                $sql .= "AND ( `firstname` LIKE '%$name%' OR `lastname` LIKE '%$name%' ) ";
            }

            if( $province !== false ){
                $sql .= "AND `province` LIKE '$province' ";
            }

            $sql .= "ORDER BY `hos_id` DESC, `firstname` ASC ;";
            $db->select($sql);
            $patient_list = $db->get_items();

        }

        $data = array(
            'idcard' => $idcard,
            'hospitals' => $hospitals,
            'hos_select' => $hos_select,
            'year_range' => $year_range,
            'name' => $name,
            'province' => $province,
            'def_year' => $def_year,
            'patient_list' => $patient_list
        );

        $view = $this->load_view('search/index');
        $view->set_val($data);
        $view->render();

    }

    public function pdf_preview($item_id, $token){

        exit;

        $get_token = check_token($token, 'item'.$item_id);
        if ( $get_token !== true OR $this->user === false ) {
            redirect('error');
        }

        $item_id = (int) $item_id;

        $db = $this->load_db();
        $sql = "SELECT `cert`
        FROM `patients`
        WHERE `id` = :item_id ;";
        $db->select($sql, array(':item_id' => $item_id));
        $item = $db->get_item();

        $view = $this->load_view('patient/detail');
        $view->set_val($item);
        $view->render();

    }

}
