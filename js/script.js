

$(document).ready(function(){
    $('#tombol-cari').hide();
  
    $('#keyword').on('keyup', function(){
        $('.loader1').show();
         // $.get()
    $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data){
        $('#keyword').html(data);
        $('.loader1').hide();    
    });
    
        // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());
    })

   
})
