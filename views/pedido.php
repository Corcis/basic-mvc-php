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
 

  <!--Formularioo ´para mostrar los productos registrados   -->
  <div class="video-container vertical-center">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <!-- FORMULARIO PARA MOSTRAR LOS PRODUCTOS REGISTRADOS -->
        <div >
    <div class="col-md-9">
      <br><?php
        foreach ($productos as $producto) {
      ?>
          <div class="col-md-4">
            <img src="../public/<?php echo $producto['categoria_id']; ?>.jpg" class="col-xs-12" width="110" height="210">
            <label>
              <?php echo $producto['nombre']; ?>
            </label>
            <p>
                <?php echo $producto['descripcion']; ?>
            </p>
            <label>
              $<?php echo $producto['precio']; ?>
            </label>
            <br>
            <input type="number" class="input form-control" id="cantidad" onchange="document.getElementById('cantidad').value=this.value" >
            <br>
            <button type="button" class="btn btn-warning form-control"name="button"
            onclick="addToCart(<?php echo $producto['id'];?>)">
              Agregar al carrito</button><br><br>
          </div>

      <?php
        }
      ?>
    </div>

    <div class="col-md-3">
      <h3>Productos en el carrito</h3>
      <div id="lista">

      </div>
      <form class="" action="index.html" method="post">
        <h3>Ingrese los siguientes datos para realizar su pedido</h3>
        <p><strong>* Campos obligatorios</strong></p>
        <p>*Nombre completo: </p><input class="form-control" type="text" id="nom">
        <p>*Dirección: </p><input class="form-control" type="text" id="dir">
        <p>*Teléfono: </p><input class="form-control" type="text" id="tel">
      </form>
      <br><button type="button" class="btn btn-info form-control" id="comprar">Comprar</button>
    </div>
    <!-- FORMULARIO PARA INGRESAR PRODUCTOS -->

    <!-- container -->
    <script src="../assets/js/script.min.js" charset="utf-8"></script>
    <script src="../assets/js/carrito.min.js" charset="utf-8"></script>
    <script type="text/javascript">
      var ListaProductos = new Array();
      var arregloJSON = "";

      let comprar = document.querySelector("#comprar");
      comprar.addEventListener("click",function() {
        let nombre = document.querySelector("#nom");
        let direccion = document.querySelector("#dir");
        let telefono = document.querySelector("#tel");

        $.ajax({
        method: "POST",
        url: "controllers/CarritoController.php",
        data: { nombre: nombre.value,
                direccion: direccion.value,
                telefono: telefono.value,
                productos: arregloJSON,
                funcion: "insertarAlCarrito"
              }
      })
      .done(function() {
         console.log( "Datos guardados ");
       });
      })
      function addToCart(id) {
        let cantidad = document.querySelector("#cantidad");


        if(cantidad.value>0){
          let carrito = new Carrito(id,cantidad.value);
          ListaProductos.push(carrito);
          arregloJSON = JSON.stringify(ListaProductos);
          console.log(arregloJSON);
          cantidad.value = "";
          $(".input").val("");
          document.getElementById("lista").innerHTML ='';

          ListaProductos.forEach(function(item){

            console.log(item);

            <?php
              foreach ($productos as $producto) {
              ?>
              if(item._id==<?php echo $producto['id']; ?>){

                document.getElementById("lista").innerHTML += item._cantidad+' '+'<?php echo $producto['nombre'];?><br>';
              }
            <?php } ?>

          })
        }
      }
      
    </script>

   
</div>
</div>
   </div>
</body>
</html>

