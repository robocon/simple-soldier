<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <h3 class="page-header">แก้ไขรหัสผ่าน</h3>
        <form class="adminForm" action="<?=getUrl();?>user/save_password_form" method="post">
            <div class="form-group">
                <label for="old_password">รหัสผ่านเก่า</label>
                <input type="text" class="form-control" id="old_password" name="old_password" placeholder="Old password">
            </div>
            <div class="form-group">
                <label for="password">รหัสผ่านใหม่</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="New password">
            </div>
            <div class="form-group">
                <label for="confirm_password">ยืนยันรหัสผ่านใหม่</label>
                <input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm new password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-save">บันทึก</button>
                <input type="hidden" name="token" value="<?=generate_token('save_edit_password');?>">
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(function(){

        $('document').on('click', '.btn-save', function(){
            // var pass = $('#password').val();
            // var confirm_pass = $('#confirm_password').val();
            //
            // console.log(pass);
            // console.log(confirm_pass);

            console.log(123412341234);

            return false;


            /*
            if( $.trim(pass).length == 0 ){
                return false;
            }

            if( $.trim(pass).length < 6 ){
                alert('รหัสผ่านต้องมีความยาวอย่างน้อย 6ตัวอักษร');
                return false;
            }

            if( $.trim(pass) != $.trim(confirm_pass) ){
                alert('กรุณายืนยันรหัสผ่านให้ตรงกัน');
                return false;
            }
            */
            
        });


    });
</script>
