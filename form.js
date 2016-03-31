$( function () {
	$("#indexform, #editform").find(':text:first').focus ();
	$(":text").click (function() {
		if($(this).val() == $(this).prop("defaultvalue")) {
			$(this).val("");
		}
	});
});

if  (!navigator.userAgent.match(/chrome/ig)) 
{
	$( function ()  {
		
	$("#receivedate").datepicker();
	$("#invoicedate").datepicker();
	$("#cgdate").datepicker();	
	$("#sentdate").datepicker();	
	$("#confdate").datepicker();
	$("#releasedate").datepicker();	

})}
