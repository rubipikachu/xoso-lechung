var LEFT_CAL = Calendarc.setup({	
		cont: "lccalendar",					
		weekNumbers: false,
		selectionType: Calendarc.SEL_SINGLE,
		showTime: 12,
		onSelect : selectdate
});
function selectdate(cal) {
	  var date = cal.selection.get();
	  if (date) {
			  date = Calendarc.intToDate(date);
			  var f_date = Calendarc.printDate(date, "%d-%m-%Y");					
			  var findday = document.findDayleft;
			  findday.day.value = f_date;
			  findday.submit();
			 window.location.href='/ket-qua-xo-so/' + f_date +'.html';
	  }
};