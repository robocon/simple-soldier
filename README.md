# ระบบรายงานการตรวจโรค
### ความต้องการระบบ
- PHP >= 5.2.17

### การติดตั้ง
- ไฟล์ config อยู่ใน applications/system/config.example.php ให้เปลี่ยนเป็น config.php
- ตัวอย่าง DB ชื่อ example-db.sql
- ถ้าหน้าเว็บไม่ขึ้นให้เช็กที่ไฟล์ .htaccess ตรง RewriteBase

### โครงสร้างคร่าวๆ
- **applications** 
    - **controllers** โค้ดในส่วนของ MC(Model และ Controller)
    - **helpers** เป็นตัวช่วยในการเรียกใช้งาน เขียนเรียกโค้ดนอกจากที่นี่ก็ได้
    - **libs** โค้ดนอกจะเอามาโปะไว้ในนี้
    - **system** ส่วน Core ของ (MC)V และไฟล์คอนฟิกต่างๆ
    - **views** ส่วนแสดงผลที่รับค่าจาก Controller
    - **bootstrap.php** split URL จากที่นี่ล่ะ
    - **functions.php** ฟังก์ชั่นต่างๆ
- **assets** ที่อยู่ไฟล์ js, css และ image ต่างๆของตัวเว็บ
- **logs** อ่าาาาาา ก็ log ไง

[ระบบรายงานการตรวจโรค PC Version](https://github.com/robocon/eCertificate)

### อ้างอิง
- [รายชื่อจังหวัดในประเทศไทย พร้อมอำเภอ](https://github.com/parsilver/thailand-provinces)
- [Bootstrap](https://getbootstrap.com/)