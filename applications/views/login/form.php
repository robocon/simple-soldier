<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center logo-home">
        <img src="<?=getUrl();?>assets/images/e-med-logo.png" width="360" class="img-responsive" >
    </div>
</div>
<div class="row">
    <div class="col-sm-4"></div>
    <form class="col-sm-4" action="<?=getUrl();?>login" method="post">
        <div class="form-group">
            <label for="username">ชื่อผู้ใช้งาน</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="password">รหัสผ่าน</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <center><button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button></center>
            <input type="hidden" name="token" value="<?=generate_token('login_user');?>">
        </div>
    </form>
</div>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center">
        <a class="btn btn-primary btn-lg" href="<?=getUrl();?>download/emedical.rar" role="button">ดาวโหลดโปรแกรม PC Version<br>ใช้สำหรับครื่องอ่านบัตรประชาชน<br> <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-cloud-arrow-down" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M7.646 10.854a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 9.293V5.5a.5.5 0 0 0-1 0v3.793L6.354 8.146a.5.5 0 1 0-.708.708l2 2z"></path>
        <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"></path>
        </svg></a> 
    </div>
</div>
