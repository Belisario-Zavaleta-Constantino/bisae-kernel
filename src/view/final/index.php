
<?php
require_once __DIR__ . '/kernel/UI/Carousel/Carousel.php';
require_once __DIR__ . '/kernel/UI/Lista/Lista.php';
require_once __DIR__ . '/kernel/UI/MenuResponsivo/MenuResponsivo.php';
require_once __DIR__ . '/kernel/UI/TF/TF.php';
require_once __DIR__ . '/kernel/UI/TH/TH.php';

use BISAE\UI\Carousel\Carousel;
use BISAE\UI\Lista\Lista;
use BISAE\UI\MenuResponsivo\MenuResponsivo;
use BISAE\UI\TF\TF;
use BISAE\UI\TH\TH;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>BISAE Demo</title>
    <link rel="stylesheet" href="public/css/bisae.css">
</head>
<body>

<?php
$menu = new MenuResponsivo(["Inicio", "Productos", "Contacto"]);
echo $menu->render();

$carousel = new Carousel([
    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQN7ZS1iWhsLxfW9-ZdiGiWERqKNvO7ApcYfhaGPT9faQLSw-3TdRiLkGp4aKol8PmTdj-y6N5hdiRSerhzCfJgVSFj_YYYtgUcnTQsA&s=10",
    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgPApXtNaMEA2msGeBIAjZWXwLrzRww29P0ApcNos0aQ4YJxSUHDFW6aHjNnLmaz7GdGSMd_zg6cZe1A4W9ERA8hzg8g7vOm8SUoUXEg&s=10"
]);
echo $carousel->render();

$lista = new Lista(["Uno", "Dos", "Tres"]);
echo $lista->render();

$th = new TH(["ID", "Nombre", "Correo"]);
echo $th->render();

$tf = new TF(["Nombre", "Correo"]);
echo $tf->render();
?>

</body>
</html>
