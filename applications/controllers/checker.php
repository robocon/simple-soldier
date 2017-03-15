<?php

/**
 *
 */
class Checker extends Controller
{
	public function idcard(){

		$db = $this->load_db();

		$sql = "SELECT *FROM `patients`";
		$db->select($sql);
		$items = $db->get_items();

        ?>
        <table>
        <?php
        $i = 1;

        foreach ($items as $key => $item) {

            $idcard_clean = preg_replace('/\s/', '', $item['idcard']);
            $idcard = to_arabic_number($idcard_clean);
            if( strlen($idcard) < 13 ){
                ?>
                <tr>
                    <td><?=$i;?></td>
                    <td><?=$item['idcard'];?></td>
                    <td><?=$item['firstname'] . ' ' . $item['lastname'];?></td>
                    <td><?=$item['owner'];?></td>
                </tr>
                <?php
                $i++;
            }
        }

        ?>
        </table>
        <?php
		exit;

	}

    public function cleanup(){
        $db = $this->load_db();

		$sql = "SELECT *FROM `patients`";
		$db->select($sql);
		$items = $db->get_items();

// UPDATE `soldier`.`patients`
// SET
// `id` = <{id: }>,
// `firstname` = <{firstname: }>,
// `lastname` = <{lastname: }>,
// `idcard` = <{idcard: }>,
// `house_no` = <{house_no: }>,
// `tambon` = <{tambon: }>,
// `amphur` = <{amphur: }>,
// `province` = <{province: }>,
// `zipcode` = <{zipcode: }>,
// `diag` = <{diag: }>,
// `regula` = <{regula: }>,
// `doctor` = <{doctor: }>,
// `date_add` = <{date_add: }>,
// `diag_etc` = <{diag_etc: }>,
// `hos_id` = <{hos_id: }>,
// `owner` = <{owner: }>,
// `date` = <{date: }>,
// `cert` = <{cert: }>,
// `status` = <{status: }>
// WHERE `id` = <{expr}>;
        
        foreach ($items as $key => $item) {
            $id = $item['id'];
            $update_sql = '';

            $firstname = trim($item['firstname']);
            $firstname_check = mb_substr($firstname, 0, 3, "UTF-8");
            if( $firstname_check === 'นาย' ){
                $update_firstname = trim(mb_substr($firstname, 3, mb_strlen($firstname), "UTF-8"));
                $update_sql .= "`firstname` = '$update_firstname',";
            }else{
                $update_sql .= "`firstname` = '$firstname',";
            }

            $tambon = trim($item['tambon']);
            $tambon_check = mb_substr( $tambon, 0, 2, "UTF-8");
            if( $tambon_check === 'ต.' ){
                $update_tambon = trim(mb_substr( $tambon, 2, mb_strlen( $tambon), "UTF-8"));
                $update_sql .= "`tambon` = '$update_tambon',";
            }

            $amphur = trim($item['amphur']);
            $amphur_check = mb_substr($amphur, 0, 2, "UTF-8");
            if( $amphur_check === 'อ.' ){
                $update_amphur = trim(mb_substr($amphur, 2, mb_strlen($amphur), "UTF-8"));
                $update_sql .= "`amphur` = '$update_amphur',";
            }

            $prevince = trim($item['province']);
            $province_check = mb_substr($prevince, 0, 2, "UTF-8");
            if( $province_check === 'จ.' ){
                $update_province = trim(mb_substr($prevince, 2, mb_strlen($prevince), "UTF-8"));
                $update_sql .= "`province` = '$update_province',";
            }else{
                $update_sql .= "`province` = '$prevince',";
            }

            $update_regula = str_replace(array('ข้อ ', 'ข้อ'), '', $item['regula']);
            $update_regula = str_replace('74/2540', '', $update_regula);
            
            $update_sql .= "`regula` = '$update_regula'";

            $sql = "UPDATE `patients` 
            SET 
            $update_sql 
            WHERE `id` = '$id'";

            dump($sql);
            $update = $db->update($sql);
            dump($update);

        }

    }
}
