<?php

/**
 *
 */
class Updateidcard extends Controller
{

	private function convert($number){
		global $th_number;

		$arabic = array_keys($th_number);
		$thai = array_values($th_number);

		$idcard = str_replace($thai, $arabic, $number);
		return $idcard;
	}

	public function base(){

		$db = $this->load_db();

		$sql = "SELECT * FROM `patients` WHERE `hos_id` = '1' ";
		$db->select($sql);
		$items = $db->get_items();
		?>
		<table>
		<?php
		foreach ($items as $key => $item) {

			$idcard = $this->convert($item['idcard']);
			$idcard = preg_replace('/\s/', '', $idcard);
			if ( strlen($idcard) < 13 ) {
				// echo $idcard."<br>";
				?>
				<tr>
					<td><?=$idcard;?></td>
					<td><?=$item['firstname'];?></td>
				</tr>
				<?php
			}

		}
		?>
		</table>
		<?php
		exit;

	}


}
