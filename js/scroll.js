window.onscroll = function() {
  scrollHeader();
};

window.onload = function() {
  if (!document.getElementById("isLanding")) {
    showHeaderBackground();
  }
}

function scrollHeader() {
  if (!isOnLandingPage()) {
    return;
  } else {
    if (hasScrolled()) {
      showHeaderBackground();
    } else {
      hideHeaderBackground();
    }
  }
}

function showHeaderBackground() {
  document.getElementById("header").style.backgroundColor = "darkcyan";
  document.getElementsByClassName("add-venue-button")[0].style.backgroundColor = "white";
  document.getElementsByClassName("add-venue-button")[0].style.color = "darkcyan";
}

function hideHeaderBackground() {
  document.getElementById("header").style.backgroundColor = "transparent";
  document.getElementsByClassName("add-venue-button")[0].style.backgroundColor = "darkcyan";
  document.getElementsByClassName("add-venue-button")[0].style.color = "white";
}

function isOnLandingPage() {
  return document.getElementById("isLanding");
}

function hasScrolled() {
  return (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150);
}
