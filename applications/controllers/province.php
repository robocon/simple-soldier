<?php

/**
 *
 */
class Province extends Controller
{
	public function base(){

		$db = $this->load_db();

		// Map จุด x, y บนแผนที่
		$sql = "SELECT `name_th`,`map_x`,`map_y` 
		FROM `provinces` ";
		$db->select($sql);
		$pre_items = $db->get_items();
		$codes = array();
		foreach ($pre_items as $key => $item) {
			$pv_key = $item['name_th'];
			$codes[$pv_key] = array('top' => $item['map_x'], 'left' => $item['map_y']);
		}

		$sql = "SELECT a.*, COUNT(`province`) AS `rows` 
		FROM (
			SELECT TRIM(`province`) AS `province` 
			FROM `patients` 
			WHERE `status` = '1'
		) AS a 
		GROUP BY a.`province`";
		$db->select($sql);
        $items = $db->get_items();

		$i = 0;
		$new_items = array();
		foreach ($items as $key => $item) {
			$hos_id = trim($item['province']);
			if( isset($codes[$hos_id]) ){
				$item['position'] = $codes[$hos_id];
				$new_items[] = $item;
			}
			$i++;
		}

		$view = $this->load_view('province/index');
		$view->set_val(array('items' => $new_items));
		$view->render();

	}
}
