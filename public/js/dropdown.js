$("#state").change(function(event){
    $.get("towns/"+event.target.value+"", function(response,state){
        $("#town").empty();
        for (let index = 0; index < response.length; index++) {
            $("#town").append("<option value='"+response[index].id_municipio+"'> " + response[index].nombre+"</option>");
        }
    });
});

/**$("#state").on("change",function(event){
    console.log(event);

    var id_state = event.target.value;

    $.get("/towns?id="+id_state,function(data){
        console.log(data);
    });
});
Route::get('/towns',function () {
    
    $id_state = Input::get('id');

    $towns = Municipio::where('id_departamento','=',$id_state);
    
    return Response::json($towns);
});


$("#state").change(function(event){
    $.get("towns/"+event.target.value+"", function(response,state){
        $("#town").empty();
        for (let index = 0; index < response.length; index++) {
            $("#town").append("<option value='"+response[i].id_municipio+"'> " + response[i].nombre+"</option>");
        }
    });
});


$(document).ready(function(){
    $("#state").change(event => {
        $.get(`towns/${event.target.value}`,function(res,state){
            $("#town").empty();
            res.forEach(element => {
                $("#town").append(`<option value=${element.id_municipio}> ${element.nombre} </option>`);
            });
        });
    });
});*/