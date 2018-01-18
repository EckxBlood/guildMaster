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

        var idMembre = $('select#membresQuetes'+idQuest +' > option:selected').attr("data-membre");
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

    $('#reload').click(function() {
        location.href = "http://127.0.0.1:8000/quetes";
    });

    $('#questComplete').click(function() {

        var idQuete = $(this).attr("data-quete");
        var idMembre = $(this).attr("data-membre");

        $.ajax({
            type: 'GET',
            url: "http://127.0.0.1:8000/quetes/complete/idQuest/"+ idQuete +"/idMembre/"+idMembre,
            dataType: 'json',
            success: function (data) {
                if(data.fail) {
                    $('#fail' + data.queteFail).show();
                } else {
                    location.reload();
                }
            },
            error: function (e) {
                console.log(e);
            }
        });
    });
});
