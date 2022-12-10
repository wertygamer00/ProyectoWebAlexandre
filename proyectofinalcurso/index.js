$(document).ready(function(){
    $.getJSON("datosP.php", function( data ) {
      $("#primerP").append(  '<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">'+
      '<div class="carousel-inner">'+
         '<div class="carousel-item active">'+
            '<p class="display-4">'+data[0][1]+'</p>'+
              '<h4>'+data[0][2]+'</h4>'+
              '<p>'+data[0][3]+'</p>'+
              '<p><a class="btn btn-primary btn-lg" href="#" role="button">Seguir leyendo &raquo;</a></p>'+
           '</div>'+
        '<div class="carousel-item">'+
             '<p class="display-4">'+data[1][1]+'</p>'+
              '<h4>'+data[1][2]+'</h4>'+
              '<p>'+data[1][3]+'</p>'+
              '<p><a class="btn btn-primary btn-lg" href="#" role="button">Seguir leyendo &raquo;</a></p>'+
        '</div>'+
        '<div class="carousel-item">'+
             '<p class="display-4">'+data[2][1]+'</p>'+
              '<h4>'+data[2][2]+'</h4>'+
              '<p>'+data[2][3]+'</p>'+
              '<p><a class="btn btn-primary btn-lg" href="#" role="button">Seguir leyendo &raquo;</a></p>'+
       ' </div>'+
      
    '  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">'+
      '<span class="carousel-control-prev-icon" style="margin-right:100px" aria-hidden="true"></span>'+
        '<span class="sr-only">Previous</span>'+
     ' </a>'+
     '<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">'+
        '<span class="carousel-control-next-icon" aria-hidden="true"></span>'+
        '<span class="sr-only">Next</span>'+
      '</a>'+
      '</div>'+
    '</div>');


        for(var i=1;i<10;i++){
          console.log(data.length);
          $("#segundos").append('<div class="col-4 card pl-4 pt-2 pb-2" >'+
            '<h2 class="card-title">'+data[i][1]+'</h2>'+
            '<h4>'+data[i][2]+'</h4>'+
            '<p class="card-text">'+data[i][3]+'</p>'+
            '<p><a class="btn btn-primary" href="#" role="button">Seguir leyendo &raquo;</a></p>'+
         ' </div>');
        }
    });
      $.get("nombreU.php", function(data, status){
      $("#nombreU").text(data);
    });
  })





