/*I'll be cleaning this code up. There's definitely some redundancy in calling a new Date() object, for example*/

  //create document ready function
  $(document).ready(function () {

    //create function to display the time
    function displayTime() {
      //create variable currentTime and have the Date() object store computer's time
      var currentTime = new Date();
      //create variables for hours, minutes, and seconds
      var hours = currentTime.getHours();
      var minutes = currentTime.getMinutes();
      var seconds = currentTime.getSeconds();
      var meridiem = " ص";

      if (hours > 11) {
        hours = hours - 12;
        meridiem = " م";
      }
      if (hours === 0) {
        hours = 12;
      }
      if (hours < 10) {
        hours = "0" + hours;
      }
      if (minutes < 10) {
        minutes = "0" + minutes;
      }
      if (seconds < 10) {
        seconds = "0" + seconds;
      }
      $("#clock").text(hours + ":" + minutes + ":" + seconds + meridiem);
      //set variable to change clockDiv in HTML
      //var clockDiv = document.getElementById('clock');

      //innerText to set text inside an HTML element
      //clockDiv.innerText = hours + ":" + minutes + ":" + seconds + meridiem;
    }
    function displayDay() {
      var currentDay = new Date();
      var days = ["الاحد", "الاثنين", "الثلاثاء", "الاربعاء", "الخميس", "الجمعة", "السبت"];
      var day = days[currentDay.getDay()];
      $("#day").text(day);
    }
    function displayDate() {
      var currentDate = new Date();
      var year = currentDate.getFullYear();
      var date = currentDate.getDate();
      var months = ["يناير", "فبراير", "مارس", "ابريل", "مايو", "يونيو", "يوليو", "أغسطس", "سيتمبر", "أكتوبر", "نوفمبر", "ديسيمبر"];
      var month = months[currentDate.getMonth()];
      if (date < 10) {
        date = "0" + date;
      }

      $("#date").text(date + " " + month + " " + year);
    }
    displayTime();
    setInterval(displayTime, 1000);
    displayDay();
    displayDate();

  });
