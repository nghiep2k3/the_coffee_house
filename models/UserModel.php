<?php
include '../config/config.php';
class UserModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
        $this->db->connect();
    }
    public function getUser($username, $password) {
        $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
        $result = $this->db->execute($sql);
        if ($result && $result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
}
?>
<?php
require_once 'UserModel.php';

// Tạo một đối tượng UserModel
$userModel = new UserModel();

// Gọi phương thức getUser với tên người dùng và mật khẩu cụ thể để kiểm tra
$user = $userModel->getUser('username_here', 'password_here');

// Kiểm tra kết quả trả về từ hàm getUser
if ($user) {
    // Đăng nhập thành công, in thông tin người dùng
    echo "Đăng nhập thành công. Thông tin người dùng:<br>";
    echo "Username: " . $user['username'] . "<br>";
    echo "Password: " . $user['password'] . "<br>";
} else {
    // Đăng nhập thất bại
    echo "Đăng nhập thất bại.";
}
?>

