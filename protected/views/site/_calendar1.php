<!-- Begin calendar --> 
<script type="text/javascript"> var maxday=<?php echo date("Ymd",time()); ?>;</script>
<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->homeUrl; ?>css/jscal200.css" />
<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->homeUrl; ?>css/border-r.css" />
<script src="<?php echo Yii::app()->homeUrl; ?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->homeUrl; ?>js/jscal200.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->homeUrl; ?>js/en000000.js"></script>
<div class="panel panel-xs"><div class="panel-body" style="padding: 0;"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center" valign="top">
        <form style="padding:0;margin:0" name="findDayright" action="">
          <input type="hidden" name="day" id="day"  />
          <div id="leftcalendar"></div>
        </form>
      </td>
    </tr>
</table></div></div>
<script type="text/javascript">
var LEFT_CALENDAR = Calendarc.setup({	
		cont: "leftcalendar",					
		weekNumbers: false,
		selectionType: Calendarc.SEL_SINGLE,
		showTime: 12,
		onSelect : selectdateleft
});
function selectdateleft(cal) {
	  var date = cal.selection.get();
	  if (date) {
			  date = Calendarc.intToDate(date);
			  var f_date = Calendarc.printDate(date, "%d-%m-%Y");					
			  var findday = document.findDayright;
			  findday.day.value = f_date;
			  findday.submit();
			 window.location.href='/ket-qua-xo-so/' + f_date +'.html';
	  }
};
</script>
<!-- End calendar -->