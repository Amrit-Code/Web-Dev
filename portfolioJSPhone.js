// All links in document
homeButton = document.getElementById("Home-Button").addEventListener("click",switchView);
aboutMe = document.getElementById("About-Me").addEventListener("click",switchView);
skilsAchivements = document.getElementById("Skils-Achivements").addEventListener("click",switchView);
educationQualifications = document.getElementById("Education-Qualifications").addEventListener("click",switchView);
experience = document.getElementById("Experience").addEventListener("click",switchView);
portfolio = document.getElementById("Portfolio-Link").addEventListener("click",switchView);
//All divs in document
//About Me main & side
aboutMeMain = document.getElementById("About-Me-Tab");
aboutMeSide = document.getElementById("About-Me-Side");
//Skills main and side
skillsMain = document.getElementById("Skills-Achivements-Tab");
skillsSide = document.getElementById("Skills-Achive-Side");
//Education and Qualifications Main and Side
educationMain = document.getElementById("Education-Qualifications-Tab");
educationSide = document.getElementById("Education-Qualifications-Side");
//Experience Main and Side
experienceMain = document.getElementById("Experience-Tab");
experienceSide = document.getElementById("Experience-Side");
//Portfolio Main and Side
portfolioMain = document.getElementById("Portfolio");
portfolioSide = document.getElementById("Portfolio-Side");
//Setup the site
setInvisible();
startSite();
//function that changes all ellements to invisible
function setInvisible(){
    aboutMeMain.style.visibility = "hidden";
    aboutMeSide.style.visibility = "hidden";
    aboutMeMain.style.zIndex = "-1";
    aboutMeSide.style.zIndex = "-1";

    skillsMain.style.visibility = "hidden";
    skillsSide.style.visibility = "hidden";
    skillsMain.style.zIndex = "-1";
    skillsSide.style.zIndex = "-1";

    educationMain.style.visibility = "hidden";
    educationSide.style.visibility = "hidden";
    educationMain.style.zIndex = "-1";
    educationSide.style.zIndex = "-1";

    experienceMain.style.visibility = "hidden";
    experienceSide.style.visibility = "hidden";
    experienceMain.style.zIndex = "-1";
    experienceSide.style.zIndex = "-1";

    portfolioMain.style.visibility = "hidden";
    portfolioSide.style.visibility = "hidden";
    portfolioMain.style.zIndex = "-1";
    portfolioSide.style.zIndex = "-1";
}
//function that will make the about me tab visible when first opened
function startSite(){
    aboutMeMain.style.visibility = "visible";
    aboutMeSide.style.visibility = "visible";
    aboutMeMain.style.zIndex = "1";
    aboutMeSide.style.zIndex = "1";
    //aboutMeMain.style.overflowY = "hidden";
}
//functions that will change between options
function showAboutMe(){
    setInvisible()
    aboutMeMain.style.visibility = "visible";
    aboutMeSide.style.visibility = "visible";
    aboutMeMain.style.zIndex = "1";
    aboutMeSide.style.zIndex = "1";
}
function showSkills(){
    setInvisible();
    skillsMain.style.visibility = "visible";
    skillsSide.style.visibility = "visible";
    skillsMain.style.zIndex = "1";
    skillsSide.style.zIndex = "1";
}
function showEducation(){
    setInvisible();
    educationMain.style.visibility = "visible";
    educationSide.style.visibility = "visible";
    educationMain.style.zIndex = "1";
    educationSide.style.zIndex = "1";
}
function showEperience(){
    setInvisible();
    experienceMain.style.visibility = "visible";
    experienceSide.style.visibility = "visible";
    experienceMain.style.zIndex = "1";
    experienceSide.style.zIndex = "1";
}
function showPortfolio(){
    setInvisible();
    portfolioMain.style.visibility = "visible";
    portfolioSide.style.visibility = "visible";
    portfolioMain.style.zIndex = "1";
    portfolioSide.style.zIndex = "1";
}

//function that will shitch between them
function switchView(e){
    e.preventDefault();
    console.log(e);
    if(e.target.id == "About-Me" || e.target.id == "Home-Button"){
        showAboutMe();
    }else if(e.target.id == "Skils-Achivements"){
        showSkills();
    }else if(e.target.id == "Education-Qualifications"){
        showEducation();
    }else if(e.target.id == "Experience"){
        showEperience();
    }else if(e.target.id == "Portfolio-Link"){
        showPortfolio();
    }
}

// When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("Top-Nav");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
  } else {
    navbar.classList.remove("sticky");
  }
}

