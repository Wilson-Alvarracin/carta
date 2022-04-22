<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akshar&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="menu">
        <nav>
            <ul>
            <li><a class="navbar-brand" href=".">Inicio</a></li>
                <?php
                if (file_exists('xml/carta.xml')) {
                    $carta = simplexml_load_file('xml/carta.xml');
                } else {
                    exit('Error abriendo encartelera.xml.');
                }
                $aux=[];
                foreach($carta->plato as $plato){
                    if(!in_array((string)$plato['tipo'],$aux)){
                      echo '<li>';
                      if (isset($_GET['tipo']) && $_GET['tipo']==(string)$plato['tipo']) {
                        echo '<a aria-current="page" href="?tipo='.$plato['tipo'].'">'.$plato['tipo'].'</a>';
                      }else {
                        echo '<a aria-current="page" href="?tipo='.$plato['tipo'].'">'.$plato['tipo'].'</a>';
                      }
                      echo '</li>';
                      array_push($aux,(string)$plato['tipo']);
                      }
                    }
                ?>
            </ul>
            </nav>
    </div>

    <!--------------------FIN BARRA DE NAVEGACIÓN--------------------->

    <div class="container3 flex">
        <div class="content row">
            <h1>SABOR LATINO</h1>
        </div>
    </div>
    <div class="container2"></div>

    <?php
    if (isset($_GET['tipo'])) {
        foreach ($carta ->plato as $plato) {
            if ($_GET['tipo']==$plato['tipo']) {
                echo '<div class="container">';
                echo '<div class="content row">';
                echo '<div class="column-2">';
                echo '<h1>'.$plato->nombre.'</h1>';
                echo '<div class="cnt">';
                echo '<p>'.$plato->descripcion.'</p>';
                if (isset($plato->icon)) {
                    echo '<img src="./icons/'.$plato->icon.'.svg" alt="" class="img-icons">';
                }
                if ($plato['tipo']=="Arroz") {
                    echo '<img src="./icons/arroz.svg" alt="" class="img-icons">';
                }
                if ($plato['tipo']=="Sopas") {
                    echo '<img src="./icons/sopas.svg" alt="" class="img-icons">';
                }
                echo '<p>Precio: '.$plato->precio.'</p>';
                echo '</div>';
                echo '</div>';
                echo '<div class="column-2 rlln">';
                echo '<img src=./img/'.$plato->foto.'.jpg alt="encebollado" class="img-pts">'; 
                echo '</div>';
                echo '</div>';
                echo '<div class="container2"></div>';
                echo '</div>';
            }
        }
    }else {
        foreach ($carta ->plato as $plato) {
            echo '<div class="container">';
            echo '<div class="content row">';
            echo '<div class="column-2">';
            echo '<h1>'.$plato->nombre.'</h1>';
            echo '<div class="cnt">';
            echo '<p>'.$plato->descripcion.'</p>';
            if (isset($plato->icon)) {
                echo '<img src="./icons/'.$plato->icon.'.svg" alt="" class="img-icons">';
            }
            if ($plato['tipo']=="Arroz") {
                echo '<img src="./icons/arroz.svg" alt="" class="img-icons">';
            }
            if ($plato['tipo']=="Ceviches" || $plato['tipo']=='Encebollados') {
                echo '<img src="./icons/sopas.svg" alt="" class="img-icons">';
            }
            echo '<p>Precio: '.$plato->precio.'</p>';
            echo '</div>';
            echo '</div>';
            echo '<div class="column-2 rlln">';
            echo '<img src=./img/'.$plato->foto.'.jpg alt="encebollado"class="img-pts">'; 
            echo '</div>';
            echo '</div>';
            echo '<div class="container2"></div>';
            echo '</div>';
        }
    }
    ?>
</body>