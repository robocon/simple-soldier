<?php

/**
 *
 */
class Province extends Controller
{
	public function base(){

		$codes = array(
			'กรุงเทพมหานคร' => array( 'top' => '44', 'left' => '37' ),
			'ตาก' => array( 'top' => '24', 'left' => '21' ),
			'น่าน' => array( 'top' => '12', 'left' => '40' ),
			'พะเยา' => array( 'top' => '9', 'left' => '33' ),
			'พิจิตร' => array( 'top' => '29', 'left' => '36' ),
			'ลำพูน' => array( 'top' => '16', 'left' => '21' ),
			'สุโขทัย' => array( 'top' => '22', 'left' => '29' ),
			'อุตรดิตถ์' => array( 'top' => '19', 'left' => '35' ),
			'เชียงราย' => array( 'top' => '5', 'left' => '30' ),
			'แพร่' => array( 'top' => '16', 'left' => '33' ),
			'ลำปาง' => array( 'top' => '14', 'left' => '26' ),
			'เชียงใหม่' => array( 'top' => '12', 'left' => '18' ),

			'กำแพงเพชร' => array( 'top' => '29', 'left' => '28' ),
			'ชลบุรี' => array( 'top' => '49', 'left' => '46' ),
			'ชัยนาท' => array( 'top' => '36', 'left' => '33' ),
			'นครราชสีมา' => array( 'top' => '37', 'left' => '52' ),
			'นครสวรรค์' => array( 'top' => '32', 'left' => '32' ),
			'พิษณุโลก' => array( 'top' => '24', 'left' => '39' ),
			'สระบุรี' => array( 'top' => '40', 'left' => '43' ),
			'สุราษฎร์ธานี' => array( 'top' => '77', 'left' => '24' ),
			'หนองคาย' => array( 'top' => '17', 'left' => '61' ),
			'อุทัยธานี' => array( 'top' => '34', 'left' => '27' ),
			'เพชรบูรณ์' => array( 'top' => '27', 'left' => '45' ),
		);

		$db = $this->load_db();
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
