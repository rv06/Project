$(document).ready(function() {
    $("#division").val('0');
    $("#control_section").val('0');
    $("#sse_section").val('0');
    $("#station1").val('0');
    $("#station2").val('0');
    $("#division").change(function() {        
        if ($(this).val() != '0') {
            $.get('subcat.php?parent_cat1=' + $(this).val() + '&dependent1=d_id&dependent2=none&targetname=control_sec&displayID=c_s_id&displayName=csname', function(data) {
            $("#control_section").html(data); 
        });
        } else {
            $("#control_section").html("<option value=" + '0' + ">Select Control Section</option>");
        }
        
        if ($(this).val() != '0') {
            $.get('subcat.php?parent_cat1=' + $(this).val() + '&dependent1=d_id&dependent2=none&targetname=sse_section&displayID=sse_id&displayName=sse_sec', function(data) {
            $("#sse_section").html(data); 
        });
        } else {
            $("#sse_section").html("<option value=" + '0' + ">Select SSE Section</option>");
        }
        $("#sse_section").val(1).trigger("change");
    });
    
    $("#sse_section").change(function() {        
        if ($(this).val() != '0') {
            $.get('subcat.php?parent_cat1=' + $(this).val() + '&dependent2=d_id&dependent1=sse_id&targetname=stations&displayID=station&displayName=station&parent_cat2=' + $("#division").val(), function(data) {
            $("#station1").html(data); 
        });
        } else {
            $("#station1").html("<option value=" + '0' + ">Select Station</option>");
        }
        if ($(this).val() != '0') {
            $.get('subcat.php?parent_cat1=' + $(this).val() + '&dependent2=d_id&dependent1=sse_id&targetname=stations&displayID=station&displayName=station&parent_cat2=' + $("#division").val(), function(data) {
            $("#station2").html(data); 
        });
        } else {
            $("#station2").html("<option value=" + '0' + ">Select Station</option>");
        }
    });
    
});