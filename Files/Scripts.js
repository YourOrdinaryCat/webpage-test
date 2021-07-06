// Get array of cookies
var cookiearray = document.cookie.split('; ');
cookiearray.sort();

try {
  var comments = cookiearray[0].split('=')[1];
  var lang = cookiearray[1].split('=')[1];
  var mode = cookiearray[2].split('=')[1];
  var theme = cookiearray[3].split('=')[1];
} catch(error) {
  comments = "off";
  lang = "unset";
  mode = "Auto";
  theme = "Material";
}

// Swap themes
document.getElementById("theme-name").setAttribute("href", "../Files/Stylesheets/" + mode + "/" + theme + ".css");

// Function to add months to a date
function addMonths(date, months) {
  var d = date.getDate();
  date.setMonth(date.getMonth() + +months);

  if (date.getDate() != d) {
    date.setDate(0);
  }

  return date;
}

// Add one month to current date, pass to variable
var inMonth = addMonths(new Date(),1).toString();

// Form handling
function changeComments() {
  comments = document.getElementById("comments").value;
  makeCookies();
}

function changeLang() {
  lang = document.getElementById("lang").value;
  makeCookies();

  location = '../' + lang + '/';
  return false;
}

function changeLangIndex() {
  lang = document.getElementById("lang").value;
  makeCookies();

  location = lang + '/';
  return false;
}

function changeMode() {
  mode = document.getElementById("mode").value;
  makeCookies();
}

function changeTheme() {
  theme = document.getElementById("theme").value;
  makeCookies();
}

// Function to handle cookie creation
function makeCookies() {
  document.cookie = "comments=" + comments + ";expires=" + inMonth + ";path=/";
  document.cookie = "lang=" + lang + ";expires=" + inMonth + ";path=/";
  document.cookie = "mode=" + mode + ";expires=" + inMonth + ";path=/";
  document.cookie = "theme=" + theme + ";expires=" + inMonth + ";path=/";
}

// Execute after DOM is loaded
document.addEventListener("DOMContentLoaded", function() {
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker
      .register('/webpage-test/SW.js')
      .then(() => { console.log('Service Worker Registered'); });
  }
  
  if(comments == "off") {
    document.getElementById("comments_alert").setAttribute("style", "display: block;");
    document.getElementById("comments_window").setAttribute("style", "display: none;");
  } else {
    document.getElementById("comments_alert").setAttribute("style", "display: none;");
    document.getElementById("comments_window").setAttribute("style", "display: block;");
  }
});