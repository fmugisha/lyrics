function editLyrics(id) {
    $.get('/editlyrics/'+id, function (editdata) {
        $('#song').val(editdata.song_name);
        $('#bauthor').val(editdata.artist_name);
        $('#bimg').val(editdata.song_address);
        $('#lyrics').val(editdata.lyrics);

        $.ajax({
            type: 'put',
            url: '{!!URL::to("/editlyrics/'+id+ '")!!}',
            data: {
                'song': editdata.song_name,
                'bauthor': editdata.artist_name,
                'bimg': editdata.song_address,
                'lyrics': editdata.lyrics,
            },
            dataType: 'json',
            success: function (data) {
                console.log(data.artist_name);
                a.find('.artist-name').val(data.artist_name);
                a.find('.song-address').val(data.song_address);
            },
            error: function () {
                //
            }
        });
    });
};
var editLyrics = function(id){
    $('#table-container').load("/editlyrics/"+id)
     $.ajax({    
         type: "GET",
         url: "/editlyrics/"+id, 
         data:{'id':id},            
         dataType: "html",                  
         success: function(data){
           var userData=JSON.parse(data);  
           $("select[name='songname']").val(userData.song_name);               
           $("input[name='artist']").val(userData.artist_name);
           $("input[name='address']").val(userData.song_address);
           $("input[name='lyrics']").val(userData.song_address);
            
         }
     });
 };

 $(document).on('submit','#updateForm',function(e){
         e.preventDefault();
          var id= $("input[name='id']").val();               
          var fullName= $("input[name='fullName']").val();
          var emailAddress= $("input[name='emailAddress']").val();
          var city= $("input[name='city']").val();
          var country= $("input[name='country']").val();
         $.ajax({
         method:"POST",
         url: "update-data.php",
         data:{
           updateId:id,
           fullName:fullName,
           emailAddress:emailAddress,
           city:city,
           country:country
         },
         success: function(data){
         $('#table-container').load('show-data.php');
         $('#msg').html(data);
    
     }});
 });