@extends('template.template')
@section ('title')
Search
@endsection
@section('content')
  <div class="container-fluid">
  <div class="panel panel-default panel-transparent">   
    <div class="panel-body filter">
      <div class="row filtertitle">
        <h3>Filters:</h3>
      </div>
      <div class="row">        
        <div class="col-sm-3">
          <h4>Date from:</h4>
            <input type="date" id="datefrom" value= 
              <?php   $fecha = new DateTime();
                      $fecha->sub(new DateInterval('P1D'));
                      echo $fecha->format('Y-m-d'); 
              ?> 
            >
        </div>
         <div class="col-sm-3">
          <h4>Date to:</h4>
            <input type="date" id="dateto"  value= 
              <?php   $fecha = new DateTime();
                      echo $fecha->format('Y-m-d'); 
              ?> 
            >
        </div>
        <div class="col-sm-2">
          <h4>By:</h4>
            <input type="radio" name="busquedapor" value="titulo" checked>Title
            <br>
            <input type="radio" name="busquedapor" value="autor">Author
            <br>
            <p style="font-size: 11px">(no aplica para busqueda por categoria)</p>
        </div>
        <div class="col-sm-4">
          <br>
          <br>
          <input type="button" id="busquedafilter" value="Buscar" class="filtro" onclick="filtrar()">
        </div>
          <input type="hidden" id="key" value={{$key}}>
          <input type="hidden" id="cat" value={{$cat}}>   
          <script>
            function filtrar() {        
              var key = document.getElementById('key').value;
              var cat = document.getElementById('cat').value;
              var from = document.getElementById('datefrom').value;
              var to = document.getElementById('dateto').value;
              var radios = document.getElementsByName('busquedapor');
              for (var i = 0, length = radios.length; i < length; i++){
                if (radios[i].checked){
                  var by = radios[i].value;
                  break;
                }
              }
                if(key != ""){
                  var data = "key="+key+"&from="+from+"&to="+to+"&_token={{csrf_token()}}&by="+by;
                  var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                      
                      $('.SReviews').html(this.responseText);
                    }
                  };
                  xmlhttp.open("POST", "/Search", true);
                  xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                  xmlhttp.send(data);
                }else{
                  var data = "cat="+cat+"&from="+from+"&to="+to+"&_token={{csrf_token()}}";
                  var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                      
                      $('.SReviews').html(this.responseText);
                    }
                  };
                  xmlhttp.open("POST", "/Search", true);
                  xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                  xmlhttp.send(data);
                }
            }
          </script>   
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="panel panel-default panel-transparent">
    <div class="panel-body results">
      <div class="row resulttitle">
        <h3>Results:</h3>
      </div>
      <br>
      <div class="row">
        <section class="SReviews">
          @include('SReviewPages')
        </section>
      </div>
    </div>
  </div>
</div>
@endsection

  





     
  