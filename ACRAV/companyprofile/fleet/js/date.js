// JavaScript Document
function getCalendarDate(str)
{
  var gprmc=str;  
  var tokens= gprmc.split(",");
  var monthname=tokens[10].substr(2,2);
  var monthday=tokens[10].substr(0,2);
  var year=tokens[10].substr(4,2);
  
   var months = new Array(13);
   months[1]  = "January";
   months[2]  = "February";
   months[3]  = "March";
   months[4]  = "April";
   months[5]  = "May";
   months[6]  = "June";
   months[7]  = "July";
   months[8]  = "August";
   months[9]  = "September";
   months[10]  = "October";
   months[11] = "November";
   months[12] = "December";
   var now         = new Date();
   var monthnumber = now.getMonth();
   var month   = months[parseInt(monthname,10)];
   //var monthday    = monthday;
   var year        = now.getYear();
   if(year < 2000) { year = year + 1900; }
   var dateString = monthday +
                    ' ' +
                    month +
                    ', ' +
                    year;
   return dateString;
} // function getCalendarDate()


function getClockTime(str)
{
  var gprmc=str;  
  var tokens= gprmc.split(",");
  var hour = parseInt(tokens[2].substr(0,2),10) + 3;
  var minute = tokens[2].substr(2,2);
  var second=tokens[2].substr(4,2);
  
  var ap = "AM";
   if (hour   > 11) { ap = "PM";             }
  /* if (hour   > 12) { hour = hour - 12;      }
   if (hour   == 0) { hour = 12;             }
   if (hour   < 10) { hour   = "0" + hour;   }
   if (minute < 10) { minute = "0" + minute; }
   if (second < 10) { second = "0" + second; } */
   var timeString = hour +
                    ':' +
                    minute +
                    ':' +
                    second +
                    " " +
                    ap;
   return timeString;
} // function getClockTime()
