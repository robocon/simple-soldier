<?php

/**
 *
 */
class Pdf extends Controller
{
	public function base($id = false, $token){

		$get_token = check_token($token, 'view_pdf');
        if ( $get_token !== true OR $this->user === false OR $id === false ) {
            redirect('error');
        }

		$db = $this->load_db();

		$sql = "SELECT `cert`
		FROM `patients`
		WHERE `id` = :item_id";

		$db->select($sql, array(':item_id' => $id));
		$item = $db->get_item();

        header("Content-type: application/pdf");
        echo file_get_contents('files/'.$item['cert']);
		exit;


	}
}
