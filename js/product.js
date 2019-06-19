function load(controller, action){
    if(action != null){
        $("#content").load('?c='+controller+'&a='+action);
    }else{
        $("#content").load('?c='+controller);
    }
}