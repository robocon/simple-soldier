<?php 
class Printpt extends Controller
{
    public function base($id = false, $token)
    {
        global $full_months;
        $get_token = check_token($token, 'print_pt');
        if ( $get_token !== true OR $this->user === false OR $id === false ) {
            redirect('error');
        }
        
        $db = $this->load_db();
        $sql = "SELECT *, CONCAT(`firstname`,' ',`lastname`) AS `ptname` 
        FROM `patients` 
        WHERE `id` = '$id' 
        AND `status` = 1 ";
        $db->select($sql);
        $data = $db->get_item();

        $hosId = $data['hos_id'];
        $db->select("SELECT `name` FROM `hospital` WHERE `id` = '$hosId' ");
        $hos = $db->get_item();

        $doctorList = json_decode($data['doctor'],true);
        ?>
        <div>
            <table>
                <tr>
                    <td align="right"><b>ชื่อ-สกุล :</b></td>
                    <td><?=$data['ptname'];?></td>
                </tr>
                <tr>
                    <td align="right"><b>เลขบัตรประชาชน :</b></td>
                    <td><?=$data['idcard'];?></td>
                </tr>
                <tr>
                    <td align="right"><b>โรคที่ตรวจพบ :</b></td>
                    <td><?=$data['diag'];?></td>
                </tr>
                <tr>
                    <td align="right"><b>กฎกระทรวง :</b></td>
                    <td><?=$data['regula'];?></td>
                </tr>
                <tr valign="top">
                    <td align="right"><b>แพทย์ผู้ตรวจ :</b></td>
                    <td>
                    <?php 
                    $i = 1;
                    foreach($doctorList AS $dt)
                    {
                        ?><p><?=$i;?>.)<?=$dt;?></p><?php
                        $i++;
                    }
                    ?>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b>ที่อยู่ :</b></td>
                    <td>
                        <?php 
                        $address = "";
                        if($data['house_no'])
                        {
                            $address .= $data['house_no'];
                        }
                        if($data['tambon'])
                        {
                            $address .= " ต.".$data['tambon'];
                        }
                        if($data['province'])
                        {
                            $address .= " จ.".$data['province'];
                        }
                        if($data['zipcode'])
                        {
                            $address .= " ".$data['zipcode'];
                        }
                        echo $address;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b>วันที่ได้รับการตรวจ :</b></td>
                    <td>
                    <?php 
                    list($y,$m,$d) = explode('-', $data['date_add']);
                    echo $d.' '.$full_months[$m].' '.($y+543);
                    ?>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b>โรงพยาบาล :</b></td>
                    <td>
                    <?php 
                    echo $hos['name'];
                    ?>
                    </td>
                </tr>
            </table>
        </div>
        <script type="text/javascript">
        window.print();
        setTimeout(() => {
            window.close();
        }, 2000);
        </script>
        <?php
        exit;
    }
}