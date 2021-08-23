function loadpage(page)
{
   $("#cc_webcalendar").load(page+" #cc_calendar_container", function() {
      $("a[rel='events']").colorbox({
         inline:true,
         href:function(){
            return $(this).attr('href').replace(/[^#]*/,'');
         },
         iframe:false,
         innerWidth:400,
         innerHeight:250,
         opacity:0.4,
         current: "Event {current} of {total}"
      });
	  
      $('div#cc_eventlist div').click(loadColorbox);
	  $('td.day ').click(loadColorbox);
	  
	  $('#cc_calendar td').textOverflow('...', true);
	  $('#cc_calendar thead th').textOverflow('...', true); 
  });
}

function loadColorbox()
{
   $(this).unbind('click');
   $('#' + $(this).attr('class').match(/ccevent\d+/)).click();
   $(this).click(loadColorbox);
}

function loadTodaysCalendar(mindate,maxdate,path)
{
   // Today's date, change to: Date("6/1/2011") if you want a specific start date
    var now=new Date();
  
  // If today is later than maxdate, set now to maxdate
    if(now>maxdate)now=maxdate;
    
    // If today is earlier than mindate, set now to mindate
    if(now<mindate)now=mindate;
    
    // Setup the filname to be loaded
	var month=now.getMonth()+1;
	
	var year=now.getFullYear();
	
	var filename=path+"/"+month+"-"+year+".html";

	loadpage(filename);
}