<?php

/**
 *
 */
class Province extends Controller
{
	public function base(){

		$codes = array(
			// ลำปาง
			'1' => array(
				'top' => '14',
				'left' => '20'
			),
			// เชียงใหม่
			'2' => array(
				'top' => '12',
				'left' => '16'
			),
			// นครสวรรค์
			'3' => array(
				'top' => '32',
				'left' => '30'
			),
			// พิษณุโลก
			'4' => array(
				'top' => '24',
				'left' => '33'
			)
		);

		$db = $this->load_db();
		$sql = "SELECT b.`name`,a.`hos_id`,COUNT(`hos_id`) AS `rows` 
		FROM `patients` AS a 
		LEFT JOIN `hospital` AS b ON b.`id` = a.`hos_id` 
		GROUP BY a.`hos_id`;";
		$db->select($sql);
        $items = $db->get_items();
		$i = 0;
		$new_items = array();
		foreach ($items as $key => $item) {
			$hos_id = trim($item['hos_id']);
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
