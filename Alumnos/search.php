<!DOCTYPE html>

<html>
<head>
   <title>Live Search using AJAX</title>
   <!-- Including jQuery is required. -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    
    <meta charset="UTF-8">
    <style> 
        a:hover {
            cursor: pointer;
            background-color: yellow;
        }
        #left-side{
            max-width: 45%;
            float: left;
        }
        #right-side{
            max-width: 45%;
            float: right;
        }

    </style>

</head>
<body>
<!-- Search box.   <b>Ex: </b><i>ALCASA , AICART GALERA S.L. , ALMACENES HUESO S.L.</i> -->
    <div id="main">
        <div id="left-side">
            <input type="text" id="search" name="search" placeholder="Nombre y apellidos.." />
            <input type="text" id="searchTelefono" name="searchTelefono" placeholder="Teléfono..." />
            <input type="text" id="searchEmail" name="searchEmail" placeholder="Email..." />
            <input type="text" id="searchNIF" name="searchNIF" placeholder="NIF/NIE..." />
            <input type="text" id="searchNacionalidad" name="searchNacionalidad" placeholder="Nacionalidad..." />
            <input type="text" id="searchNSS" name="searchNSS" placeholder="Nº Seguridad Social..." />
            

        </div>
        <div id="right-side">
            <input type="text" id="searchDireccion" name="searchDireccion" placeholder="Direccion..." />
            <input type="text" id="searchLocalidad" name="searchLocalidad" placeholder="Localidad..." />
            <input type="text" id="searchProvincia" name="searchProvincia" placeholder="Provincia..." />
            <input type="text" id="searchComunidad" name="searchComunidad" placeholder="Comunidad..." />
            <input type="text" id="searchCP" name="searchCP" placeholder="CP..." />
            <?= $this->Html->link('Volver', ['controller' => 'empresas', 'action'=> 'index'], ['class' => 'button back-button']); ?>
        </div>

        
        <!-- Suggestions will be displayed in below div. -->
        <div id="display"></div>

        <form action="./search" style="max-width:300px;">
            <button type="submit" style="background-color:#1a5dab;">Buscar  <i class="fa fa-search"></i></button>
        </form> 
    </div>
</body>
</html>

