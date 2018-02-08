    $(document).ready(function() {   
    $(".departamento").autocomplete({
    source: function( request, response ) {
        $.ajax({
            url : '/Prejuridicos/getfill',
            dataType: "json",
            method: 'post',
            data: {
               name_startsWith: request.term,
               type: 'panels_table',
               row_num : 1
            },
             success: function( data ) {
                 response( $.map( data, function( item ) {
                    var code = item.split("|");
                    return {
                        label: code,
                        value: code[0],
                        data : item
                    }
                }));
            }
        });
    },
    autoFocus: true,            
    minLength: 1,
    select: function( event, ui )
        {
            var namess = ui.item.data.split("|");
            alert(namess);
            id_arr=$(this).attr('id');
            id=id_arr.replace ( /[^\d.]/g, '' );
            element_id=id[id.length-1];
            $('#desi'+element_id).val(namess[1]);
            $('#speci'+element_id).val(namess[2]);
            $('#pid'+element_id).val(namess[3]);
            $('#coll'+element_id).val(namess[4]);
            $('#addr'+element_id).val(namess[5]);
            $('#phone'+element_id).val(namess[6]);
            $('#email'+element_id).val(namess[7]);
            $('#sal'+element_id).val(namess[8]);
        }               
    });
}); 
