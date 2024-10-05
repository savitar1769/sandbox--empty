$host = 'localhost';
$db = 'user_registraion';
$user = 'your_username';
$pass = 'your_password';

try {
    $pdo = new PDO("mysql:$host;dbname=$db", $user, $pass);
    $pdo = setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)


    if ($_server['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (!empty($username) && !empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("INSERT INTO users (useranme, password) VALUES (:username, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashedPassowrd);

            if ($stmt->execute()) {
                echo "register success";
            } else{
                echo "register unsuccess";
            }
        } else {
            echo "請填寫所有字段";}
        }
} catch (PDOException $e) {
    exho "database error" . $e->getMessage();
}

<form method="POST" action=" ">
    username : <input type="text" name="username" required><br>
    password : <input type="password" name="password" required><br>
    <button type = "submit">register</button>
</form>
