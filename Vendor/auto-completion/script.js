aData={}
$("#abonne_name").autocomplete({
    source:function(request,response){
        $.ajax({
            url:'http://localhost/VANILLA/lirmasi/Vendor/auto-completion/server.php',
            type:'GET',
            dataType:'json',
            success:function(data){
                aData=$.map(data, function(value,key){
                    return {
                        id:value.code_abonne,
                        label:value.code_abonne
                    };
                });
                var results=$.ui.autocomplete.filter(aData,request.term);
                response(results);
            }
        })
    },

});