/**
 * Created by schliermelvin on 16/01/2018.
 */


$(document).ready(function(){
   $('select#selectMembre').change(function(){
       var id = $('select > option:selected').attr('data-membre');
       $('.quete').hide();
       $('div[class*='+id+']').show();
   });

    $('button[id*=startQuest]').click(function() {

        var idQuest = $(this).attr("id").slice(10);
        console.log(idQuest);

        var idMembre = $('select[id*=membresQuetes]').attr("id").slice(13);
        console.log(idMembre);

        $.ajax({
            type: 'GET',
            url: "http://127.0.0.1:8000/quetes/start/idMembre/"+ idMembre +"/idQuest/"+idQuest,
            success: function () {
                location.reload();
            },
            error: function (e) {
                console.log(e);
            }
        });
    });

});
