// Declare variables, wanna keep track of them
// Array with cookies
var cookiearray;

// Cookie values
var comments;
var mode;
var theme;

// Date in a month
var inMonth;

// Scrolling
var prevScrollpos;
var currentScrollPos;

// Check if FAB is expanded
var fabExpanded = false;

// Get array of cookies
cookiearray = document.cookie.split('; ');
cookiearray.sort();

try {
  comments = cookiearray[0].split('=')[1];
  mode = cookiearray[1].split('=')[1];
  theme = cookiearray[2].split('=')[1];
} catch(error) {
  comments = "off";
  mode = "Auto";
  theme = "Material";
}

// Stylesheets
document.getElementById("theme-name").setAttribute("href", "Files/Stylesheets/" + mode + "/" + theme + ".css");

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

function changeMode() {
  mode = document.getElementById("mode").value;
  makeCookies();
}

function changeTheme() {
  theme = document.getElementById("theme").value;
  makeCookies();
}

// Handle FAB clicks
function openMenu() {
  if (fabExpanded == false) {
    document.getElementById("outline").style.height = "40%";
    document.getElementById("outline").style.width = "192px";
    document.getElementById("outline").style.borderRadius = "var(--radius-strong)";
    document.getElementById("outline").style.overflow = "auto";

    document.getElementById("0").style.height = "auto";
    document.getElementById("0").style.textAlign = "left";
    document.getElementById("0").style.marginInlineStart = "8px";
    document.getElementById("0").innerText = "Contents";

    document.getElementById("outline-wrap").style.marginBlockStart = "12px";
    fabExpanded = true;
  } else {
    document.getElementById("outline").style.height = "32px";
    document.getElementById("outline").style.width = "32px";
    document.getElementById("outline").style.borderRadius = "50%";
    document.getElementById("outline").style.overflow = "hidden";

    document.getElementById("0").style.height = "24px";
    document.getElementById("0").style.textAlign = "center";
    document.getElementById("0").style.marginInlineStart = "0px";
    document.getElementById("0").innerHTML = "<i class=\"material-icons\">format_list_bulleted</i>";

    document.getElementById("outline-wrap").style.marginBlockStart = "4px";
    fabExpanded = false;
  }
}

// When the user scrolls down, hide the FAB
prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("outline").style.bottom = "0";
  } else {
    document.getElementById("outline").style.bottom = "-72px";
  }
  prevScrollpos = currentScrollPos;

  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("sticky-right").style.paddingTop = "12px";
  } else {
    document.getElementById("sticky-right").style.paddingTop = "calc(99px - var(--radius-strong))";
  }
}

// Function to handle cookie creation
function makeCookies() {
  document.cookie = "comments=" + comments + ";expires=" + inMonth + ";path=/";
  document.cookie = "mode=" + mode + ";expires=" + inMonth + ";path=/";
  document.cookie = "theme=" + theme + ";expires=" + inMonth + ";path=/";
}

// Execute after DOM is loaded
document.addEventListener("DOMContentLoaded", function() {
  if(comments == "off") {
    document.getElementById("comments_alert").innerHTML = "Comments are off. <a href='index.html#21'>Turn them on...</a>";
    document.getElementById("comments_window").setAttribute("style", "display: none;");
  }
});