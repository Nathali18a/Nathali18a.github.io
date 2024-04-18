<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "usuario";
$password = "contraseña";
$dbname = "nombre_base_de_datos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener los datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Consulta SQL para verificar las credenciales del usuario
$sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

// Verificar si se encontró un usuario con las credenciales proporcionadas
if ($result->num_rows > 0) {
    // Usuario autenticado correctamente
    echo "Login successful!";
} else {
    // Usuario no encontrado o credenciales incorrectas
    echo "Invalid username or password.";
}

// Cerrar la conexión
$conn->close();
?>
