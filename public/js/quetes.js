/**
 * Created by schliermelvin on 16/01/2018.
 */


$(document).ready(function(){
   $('select').change(function(){
       var id = $('select > option:selected').attr('data-membre');
       $('.quete').hide();
       $('div[class*='+id+']').show();
   })

});
