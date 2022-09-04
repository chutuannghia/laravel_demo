<h1> Các điều cần làm khi tải sources về</h1>
<h3>Đầu tiên</h3>
<p>mở file .env.example copy nội dung sau đó tạo file .env và dán nội dung vào và lưu lại</p>
<h3>Thứ 2</h3>
<p>Mở terminal(or CMD) lên sau gõ lệnh : composer install </p>
<h3>Thứ 3 </h3>\
<p> import cơ sở dữ liệu 'Chú ý:tạo cơ sở dữ liệu có tên "laravel_demo" và thuộc utf8_general_ci'</p>
<p>Chú ý do source này được làm với cổng port localhost:82 đường dẫn có dang localhost:82/laravel_demo/... Nên nếu không đăng nhập đc bằng với google hay github thì nhứ chú ý cổng port và uri</p>
<h3>Cuối cùng<h3>
<p>Nhớ chú ý chỉnh lại file .env :
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=laravel_demo
DB_USERNAME=root
DB_PASSWORD=

sao cho giống với trên máy đang sử dụng
<p>
