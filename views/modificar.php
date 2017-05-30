<?php
  include_once("../controllers/AgregarController.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Productos</title>
<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- my css file -->
    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>
<header>
  <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">Pizzeria</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
              <li><a href="pedido.php">Agregar pedido</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opciones de producto <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="verproductos.php">Visualizar productos (Modificar y eliminar)</a></li>
                  <li><a href="productos.php">Agregar productos</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
</header>
  <div class="video-container">
    <video class="video" src="../public/video.mp4" autoplay loop=""></video>
  </div>

  <!--Formularioo ´para mostrar los productos registrados   -->
  <div class="video-container vertical-center">
   <div class="front absolute card col-xs-12">
     <br>
     <h2 class="white-text">Modifique o elimine el producto que desea</h2>

         <?php
          foreach ($productos as $producto) {
          ?>
            <select>
              <option><?php echo $producto['nombre']?></option>
            </select>
            <input type="text" name="">
          <input class="form-control" id="nombre" value="<?php echo $producto['nombre']; ?>"></input>
          
          <textarea class="form-control" id="descripcion"><?php echo $producto['descripcion']; ?></textarea>
           <br>
           <label class="white-text">Precio</label>
           <input class="form-control" type="number" id="precio" value="<?php echo $producto['precio']; ?>"></input>
            <br>
            <label class="white-text">Categoria</label>
           <input class="form-control" type="number" id="categoria" value="<?php echo $producto['categoria_id']; ?>"></input>
           
           <center><button onclick="modificarProducto(<?php echo $producto['id']; ?>)" type="button" class="btn btn-info" id="modificar">Modificar</button></center><br>
           
           <center><button onclick="eliminarProducto(<?php echo $producto['id'] ?>, data-nom=)" type="button" id="eliminar" class="btn btn-danger">Eliminar</button></center>
           <br><br>
           
           <center><button onclick="modificarProducto(<?php echo $producto['id']; ?>)" type="button" class="btn btn-info" id="modificar">Modificar</button></center><br>
          
          <?php
           }
          ?>   

    <script src="../assets/js/script2.js" charset="utf-8"></script>
    <script type="text/javascript">
    function modificarProducto($num2){
      let id = $num2;
       let nombre = document.querySelector("#nombre");
        let precio =document.querySelector("#precio");
        let categoria = document.querySelector("#categoria");
        let descripcion = document.querySelector("#descripcion");
        let producto = new Producto(id,nombre.value,precio.value,categoria.value,descripcion.value);
        console.log(producto);
        let listaproductos = new Array();
        listaproductos.push(producto);
        let arregloJSON = JSON.stringify(listaproductos);
       
        $.ajax({
          method: "POST",
          url: "../controllers/AgregarController.php",
          data: { productos: arregloJSON, funcion: "modificarProductos" }
        })
        .done(function() {
           console.log( "Datos guardados ");
         });
    
    }
    </script>
</div>
   </div>
</body>
</html>


