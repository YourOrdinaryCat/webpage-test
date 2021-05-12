// Declare variables, wanna keep track of them
// Current language
var lang;

// Array with cookies
var cookiearray;

// Cookie values
var comments;
var mode;
var theme;

// Date in a month
var inMonth;

// Get array of cookies
cookiearray = document.cookie.split('; ');
cookiearray.sort();

try {
  comments = cookiearray[0].split('=')[1];
  lang = cookiearray[1].split('=')[1];
  mode = cookiearray[2].split('=')[1];
  theme = cookiearray[3].split('=')[1];
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
inMonth = addMonths(new Date(),1).toString();

// Form handling
function changeComments() {
  comments = document.getElementById("comments").value;
  makeCookies();
}

function changeLang() {
  lang = document.getElementById("lang").value;
  makeCookies();

  location = '../' + lang + '/Index.html';
  return false;
}

function changeLangIndex() {
  lang = document.getElementById("lang").value;
  makeCookies();

  location = lang + '/Index.html';
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
    document.getElementById("comments_alert").innerText = "Comments are off.";
    document.getElementById("comments_window").setAttribute("style", "display: none;");
  }
});