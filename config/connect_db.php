<?php
// Thông tin kết nối
$servername = "localhost";  // Địa chỉ server, thường là 'localhost'
$username = "root";         // Tên người dùng MySQL
$password = "";             // Mật khẩu MySQL
$dbname = "lalihui_web"; // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);


// Đóng kết nối khi không sử dụng nữa
// $conn->close();
?>
