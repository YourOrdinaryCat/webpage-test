// Get array of cookies
cookiearray = document.cookie.split('; ');
cookiearray.sort();

try {
  comments = cookiearray[0].split('=')[1];
  mode = cookiearray[1].split('=')[1];
  theme = cookiearray[2].split('=')[1];
} catch(error) {
  comments = "off";
  mode = "auto";
  theme = "material";
}

// Stylesheets
document.getElementById("general_theming").setAttribute("href", "project-files/stylesheets/" + mode + "/themes-general.css");
document.getElementById("theme_name").setAttribute("href", "project-files/stylesheets/" + mode + "/" + theme + ".css");

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
in_month = addMonths(new Date(),1).toString();

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

// Redirect to category
function goToCategory() {
  category = document.getElementById("categories").value;
  alert('category.html#' + category);
  location.href = 'category#' + category;
}

// Function to handle cookie creation
function makeCookies() {
  document.cookie = "comments=" + comments + ";expires=" + in_month + ";path=/";
  document.cookie = "mode=" + mode + ";expires=" + in_month + ";path=/";
  document.cookie = "theme=" + theme + ";expires=" + in_month + ";path=/";
}

// Execute after DOM is loaded
document.addEventListener("DOMContentLoaded", function() {
  if(comments == "off") {
    document.getElementById("comments_alert").innerHTML = "Comments are off. <a href='index.html#21'>Turn them on...</a>";
    document.getElementById("comments_window").setAttribute("style", "display: none;");
  } else {
    document.getElementById("comments_alert").innerHTML = "Remember to keep it civil! By the way, sorry for this, but I can't change comments theme dynamically. I made it default to dark, so if you use light theme, please toggle themes manually! <a href='index.html#2'>Change your settings...</a>";
  }
});
