$(document).ready(function()
 {
 $('#slides').cycle({
 prev : '#previous-slide',
 next : '#next-slide',
 timeout : 000,
 pause : 1,
 
 });
 });
 
 function changeTitle()
 {
 var title = $(this).find('img').attr('alt');
 var href = $(this).attr('href');

 $('#slide-title').text(title).attr('href', href);
 }