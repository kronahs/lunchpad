function showNav(){
    var nav = document.getElementById("navlists");
    if(nav.style.display != "none"){
        nav.style.display = "none";
    }
    else{
        nav.style.display = "flex";
    }
}

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navlists").style.padding = "10px 5px";
    document.querySelector("header").style.borderBottom = "1px solid lightgray";
    document.querySelector("header").style.boxShadow = "2px 2px 6px lightgray";
    document.querySelector("header").style.position = "fixed";
    document.getElementById("navImg").style.width = "120px";

  } else {
    document.getElementById("navlists").style.padding = "80px 10px";
    document.querySelector("header").style.boxShadow = "none";
    document.querySelector("header").style.position = "relative";
    document.getElementById("navImg").style.width = "150px";
  }
}


// function showPopup(obj){
//   let popup = document.getElementById('popup');
//   popup.innerHTML = obj.innerHTML;


//   let showMoreFood = document.getElementById('fc-popup');
//   showMoreFood.display = "block";
//   showMoreFood.style.
// }


