$( document ).ready(function() {
    var baseurl = window.location.host;
    var dt = new Date();
    var load = '<img src="'+baseurl+'img/loading.gif" width="16" />';
    var wait = '<span style="color: #bf3e11;" class="glyphicon glyphicon-time"></span>';
    var done = '<span style="color: #bf3e11;" class="glyphicon glyphicon-ok"></span>';
    //var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    //if(dt.getHours() >= 14 && dt.getHours() <= 23 ){
        $.ajax({
            url : "/api/service/getstatusonline",
            type: 'POST',
            contentType: 'application/json',
            traditional: true,
            data: {token: $("#token").val()},
            success: function(data)
            {
                if(dt.getHours() != 16){
                    if(data.nam === true) $(".statusnam").html(done); else $(".statusnam").html(wait);
                    if(data.bac === true) $(".statusbac").html(done); else $(".statusbac").html(wait);
                    if(data.trung === true) $(".statustrung").html(done); else $(".statustrung").html(wait);
                }else{
                    if(data.nam === true) $(".statusnam").html(done); else $(".statusnam").html(load);
                    if(data.bac === true) $(".statusbac").html(done); else $(".statusbac").html(load);
                    if(data.trung === true) $(".statustrung").html(done); else $(".statustrung").html(load);
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                console.log("------------------false---------------------");
            }
        });
    //}
    
    //if(dt.getHours() >= 14 && dt.getHours() <= 23 ){
        $.ajax({
            url : "/api/service/getstatusprovince",
            type: 'POST',
            contentType: 'application/json',
            traditional: true,
            data: {token: $("#token").val()},
            success: function(data)
            {
                for(var i =1; i<=40; i++){
                    var tinh = "data.tinh"+i;
                    if(eval(tinh) === true) $(".tinh"+i).html(done); else $(".tinh"+i).html(wait);
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                console.log("------------------false---------------------");
            }
        });
    //}
    
    $(".xsktNam").css("display","block");
    $(".xsktTrung").css("display","none");
    $(".xsktBac").css("display","none");
    $("#mut_0").click(function(){
        $(".xsktNam").css("display","block");
        $(".xsktTrung").css("display","none");
        $(".xsktBac").css("display","none");
    });
    $("#mut_1").click(function(){
        $(".xsktNam").css("display","none");
        $(".xsktTrung").css("display","none");
        $(".xsktBac").css("display","block");
    });
    $("#mut_2").click(function(){
        $(".xsktNam").css("display","none");
        $(".xsktTrung").css("display","block");
        $(".xsktBac").css("display","none");
    });
});