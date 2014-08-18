function updatestatus(){
    var currentdate = new Date(); 
    var dd = currentdate.getDate();
    var mm = (currentdate.getMonth()+1); //January is 0!
    var yyyy = currentdate.getFullYear();
    if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} 
    var ngay = dd+'/'+mm+'/'+yyyy;
        
    //var mien='Miền Bắc';
    var start_giobac=18;var start_phutbac=07;
    var end_giobac=18;var end_phutbac=24;
    
    //var mien='Miền Trung';
    var start_giotrung=17;var start_phuttrung=14;
    var end_giotrung=17;var end_phuttrung=27;
    
    //var mien='Miền Nam';
    var start_gionam=16;var start_phutnam=14;
    var end_gionam=16;var end_phutnam=36;

    //trung
    if(currentdate.getHours() < start_giotrung || (currentdate.getHours()== start_giotrung && currentdate.getMinutes() < start_phuttrung)){
        $(".tructieptrung").html("Xổ số sẽ bắt đầu lúc "+start_giotrung+'h'+start_phuttrung+'p');
        $(".kq1").css("display","none");
    }
    else if(currentdate.getHours()== start_giotrung && currentdate.getMinutes() >= start_phuttrung && currentdate.getMinutes() <= end_phuttrung){
         $(".tructieptrung").html('Đang tường thuật trực tiếp kết quả xổ số! » Chúc các bạn may mắn !...');
        $(".kq1").css("display","block");
    }else{
         $(".tructieptrung").html('Xổ số Miền Trung đã kết thúc...');
         $(".kq1").css("display","block");
    }
    //bac
    if(currentdate.getHours() < start_giobac || (currentdate.getHours()== start_giobac && currentdate.getMinutes() < start_phutbac)){
        $(".tructiepbac").html("Xổ số sẽ bắt đầu lúc "+start_giobac+'h'+start_phutbac+'p');
        $(".kq2").css("display","none");
    }
    else if(currentdate.getHours()== start_giobac && currentdate.getMinutes() >= start_phutbac && currentdate.getMinutes() <= end_phutbac){
         $(".tructiepbac").html('Đang tường thuật trực tiếp kết quả xổ số! » Chúc các bạn may mắn !...');
        $(".kq2").css("display","block");
    }else{
         $(".tructiepbac").html('Xổ số miền Bắc đã kết thúc...');
         $(".kq2").css("display","block");
    }
    //nam
    if(currentdate.getHours() < start_gionam || (currentdate.getHours()== start_gionam && currentdate.getMinutes() < start_phutnam)){
        $(".tructiepnam").html("Xổ số sẽ bắt đầu lúc "+start_gionam+'h'+start_phutnam+'p');
        $(".kq3").css("display","none");
    }
    else if(currentdate.getHours()== start_gionam && currentdate.getMinutes() >= start_phutnam && currentdate.getMinutes() <= end_phutnam){
         $(".tructiepnam").html('Đang tường thuật trực tiếp kết quả xổ số! » Chúc các bạn may mắn !...');
        $(".kq3").css("display","block");
    }else{
         $(".tructiepnam").html('Xổ số miền Nam đã kết thúc...');
         $(".kq3").css("display","block");
    }
    
}

function getkqxsbac(){
    var strUrl = '/api/service/mb';
    $.ajax(
	{
		type: "GET",
		url: strUrl,
		success: function(msg)
		{
			$.each(msg, function( index, value ) { 
                if(value!=""){
                    $("#"+index).html(value);
                }
            });

		},
		error: function()
		{
			console.log('errorB');
		}
	});
}

function getkqxstrung(){
    
    var strUrl = '/api/service/mt';
    $.ajax(
	{
		type: "GET",
		url: strUrl,
		success: function(msg)
		{
			$.each(msg, function( index, value ) { 
                if(value!=""){
                    $("#"+index).html(value);
                }
            });
		},
		error: function()
		{
			console.log('errorT');
		}
	});
}

function getkqxsnam(){
    var strUrl = '/api/service/mn';
    $.ajax(
	{
		type: "GET",
		url: strUrl,
		success: function(msg)
		{
			$.each(msg, function( index, value ) {
                if(value!=""){
                    $("#"+index).html(value);
                }
            });
		},
		error: function()
		{
			console.log('errorN');
		}
	});
}

$(document).ready(function(){ 
    setInterval(function(){ 
        updatestatus();
		
		var currentdate = new Date(); 
		 //var mien='Miền Bắc';
		var start_giobac=18;var start_phutbac=00;
		var end_giobac=18;var end_phutbac=30;
		
		//var mien='Miền Trung';
		var start_giotrung=17;var start_phuttrung=08;
		var end_giotrung=17;var end_phuttrung=35;
		
		//var mien='Miền Nam';
		var start_gionam=16;var start_phutnam=08;
		var end_gionam=16;var end_phutnam=40;
		if(currentdate.getHours()== start_giotrung && currentdate.getMinutes() >= start_phuttrung && currentdate.getMinutes() <= end_phuttrung){
			getkqxstrung();
		}
		if(currentdate.getHours()== start_giobac && currentdate.getMinutes() >= start_phutbac && currentdate.getMinutes() <= end_phutbac){
			getkqxsbac();
		}
		if(currentdate.getHours()== start_gionam && currentdate.getMinutes() >= start_phutnam && currentdate.getMinutes() <= end_phutnam){
			getkqxsnam();
		}
    },5000);
});