<?php
  ini_set("display_errors","1");
  date_default_timezone_set('America/Bogota');
?>
<!DOCTYPE html>
<html>
<!--con esto colocamos el .ico en la pestaña de la barra de navegacion -->
<link href="img/planta.ico" type="image/x-icon" rel="shortcut icon"/>
<title>Jardin Vertical Usb</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/1.css">
<link rel="stylesheet" href="css/fonts.css">
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script>
    function submit(caso, tabla){
      switch(caso){
        case "1":
        $.ajax({
            url : 'index.php',
            data : {tabla: tabla, fechainicial: $("#fechainicial1").val(), fechafinal:$("#fechafinal1").val(), accion:"traer_datos"},
            type : 'POST',
            cache: false,
            success : function(data) {
              Highcharts.chart('container1', {
                title: {
                    text: 'Datos de Temperatura Jardin Vertical'
                },
                subtitle: {
                    text: 'Universidad San Buenaventura'
                },
                yAxis: {
                    title: {
                        text: 'Valor'
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },
                plotOptions: {
                    series: {
                        pointStart: <?php echo date("d");?>
                    }
                },
                series: [{
                    name: 'Temperatura',
                    data: (function(){
                    var array = [];
                    array = data.vector;
                    for(var i=0;i>=array.length;i++){
                      <?php echo "["?>array[i]['val_temp']<?php echo "]"; ?>
                    }
                  }),
                }],

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }
              });
            },
            error : function(data) {
              console.log("alguna mierda paso");      
            }
          });
        break;
        case "2":
           $.ajax({
            url : 'index.php',
            data : {tabla: "humedad", fechainicial: $("#fechainicial2").val(), fechafinal:$("#fechafinal2").val(), accion:"traer_datos"},
            type : 'POST',
            cache: false,
            success : function(data) {
              Highcharts.chart('container2', {

                title: {
                    text: 'Datos de Humedad Jardin Vertical'
                },

                subtitle: {
                    text: 'Universidad San Buenaventura'
                },

                yAxis: {
                    title: {
                        text: 'Valor'
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },

                plotOptions: {
                    series: {
                        pointStart: <?php echo date("d");?>
                    }
                },

                series: [{
                  name: 'Humedad',
                     
                  data: (function(){
                    var array = [];
                    array = data.vector;
                    for(var i=0;i>=array.length;i++){
                      array[i]['val_temp']+", ";
                    }
                  }),
                }],

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }
              });
            },
            error : function(data) {
              console.log("alguna mierda paso");      
            }
          });
        break;
        case "3":
           $.ajax({
            url : 'index.php',
            data : {tabla: "calidad_aire", fechainicial: $("#fechainicial3").val(), fechafinal:$("#fechafinal3").val(), accion:"traer_datos"},
            type : 'POST',
            cache: false,
            success : function(data) {
              Highcharts.chart('container', {

                title: {
                    text: 'Datos de Calidad de Aire Jardin Vertical'
                },

                subtitle: {
                    text: 'Universidad San Buenaventura'
                },

                yAxis: {
                    title: {
                        text: 'Valor'
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },

                plotOptions: {
                    series: {
                        pointStart: <?php echo date("d");?>
                    }
                },

                series: [{
                    name: 'Calidad de aire',
                    data: (function(){
                      var array = [];
                      array = data.vector;
                      for(var i=0;i>=array.length;i++){
                        array[i]['val_temp']+", ";
                      }
                    }),
                }],

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }
              });
            },
            error : function(data) {
              console.log("alguna mierda paso");      
            }
          });
        break;
      
      }
    }
  
</script>
<style>
#container1 {
  min-width: 310px;
  max-width: 800px;
  height: 400px;
  margin: 0 auto
}
#container2 {
  min-width: 310px;
  max-width: 800px;
  height: 400px;
  margin: 0 auto
}
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.w3-third img{margin-bottom: -6px; opacity: 0.8; cursor: pointer}
.w3-third img:hover{opacity: 1}
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">

  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center" style="z-index:3;width:300px;font-weight:bold" id="mySidebar"><br>
    <h3 class="w3-padding-64 w3-center"><b>Jardin<br>Vertical</b></h3>
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hide-large">CLOSE</a>
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button">Inicio</a>
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">Temperatura</a> 
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">Humedad</a> 
  </nav>

  <!-- Top menu on small screens -->
  <header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
    <span class="w3-left w3-padding">Jardin Vertical USB</span>
    <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a>
  </header>

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:300px">

    <!-- Push down content on small screens --> 
    <div class="w3-hide-large" style="margin-top:83px"></div>

    <!-- Photo grid -->
    <div class="w3-row">
      <img src="img/jardin.jpg" style="width:100%" onclick="onClick(this)" alt="mensaje de ejemplo... Jardin edificio x universidad x">
    </div>

    <!-- Modal for full size images on click-->
    <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
      <span class="w3-button w3-black w3-xlarge w3-display-topright">×</span>
      <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
        <img id="img01" class="w3-image">
        <p id="caption"></p>
      </div>
    </div>

    <!-- Temperature section -->
    <div class="w3-container w3-dark-grey w3-center w3-text-light-grey w3-padding-32" id="about">
      <h4><b>Temperatura</b></h4>
      <img src="img/temperatura.png" alt="Me" class="w3-image w3-padding-32" width="150" height="590">
      <div class="w3-content w3-justify" style="max-width:600px">
        <h4>Temperatura Jardin Vertical Universidad de San Buenaventura</h4>
        
        <div class = "fechas">
          <div class = "fecha1">
            <label>Fecha Inicial</label><br>
            <input type = "date" id = "fechainicial1" name = "fechainicial1">
          </div>
          <div class = "fecha2">
            <label>Fecha Final</label><br>
            <input type = "date" id = "fechafinal1" name = "fechafinal1">
          </div>
          <div class = "submitbutton">
            <button type = "button" id = "mostrargrafica" onclick = "submit('1', 'temperatura')">Mostrar Grafica</button>
          </div>
        </div>
        <div id="container1"></div>

      </div>
    </div>

    <!-- Humidity section -->
    <div class="w3-container w3-light-grey w3-padding-32 w3-padding-large w3-center" id="contact">
      <div class="w3-content" style="max-width:600px">
        <h4 class="w3-center"><b>Humedad</b></h4>
        <img src="img/humedad.png" alt="Me" class="w3-image w3-padding-32" width="150" height="590">
        <div class="w3-content w3-justify" style="max-width:600px">
          <h4>Humedad Jardin Vertical Universidad de Sanbuenaventura</h4>
          <div class = "fechas">
          <div class = "fecha1">
            <label>Fecha Inicial</label><br>
            <input type = "date" id = "fechainicial2" name = "fechainicial2">
          </div>
          <div class = "fecha2">
            <label>Fecha Final</label><br>
            <input type = "date" id = "fechafinal2" name = "fechafinal2">
          </div>
          <div class = "submitbutton">
            <button type = "button" id = "mostrargrafica" onclick = "submit('2', 'humedad')">Mostrar Grafica</button>
          </div>
        </div>
        <div id="container2"></div>
        </div>
      </div>
    </div>  
    <div class="w3-black w3-center w3-padding-24">Powered by <a href="http://www.usbbog.edu.co/" title="usbbog" target="_blank" class="w3-hover-opacity">Nosotros XD</a></div>

    <!-- End page content -->
  </div>

  <script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

</script>


</body>
</html>