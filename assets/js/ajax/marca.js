function updateRecord(data){
	d = data.split('||');
    $("#id").val(d[0]);
    $("#nombre").val(d[1]);
}

$("#reset").click(function() {
    $(this).closest('form').find("input[type=text], textarea, input[type=hidden]").val("");
});