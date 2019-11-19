let country = null;
let results = null;
document.addEventListener("DOMContentLoaded", initiate);
function initiate(){
    country = document.getElementById("country");
    results = document.getElementById("result");
    document.getElementById("lookup").addEventListener("click", getCountry);
    document.getElementById("lookup_c").addEventListener("click", getCities);
}
function getCountry(){
    const superhero = new XMLHttpRequest();
    superhero.onreadystatechange = function (){
        if (this.readyState == XMLHttpRequest.DONE && this.status == 200) {
            results.innerHTML = this.responseText;
        }
    };
    superhero.open("GET", "world.php?country="+country.value,true);
    superhero.send();
    country.value = ""; 
}
function getCities(){
    const superhero = new XMLHttpRequest();
    superhero.onreadystatechange = function (){
        if (this.readyState == XMLHttpRequest.DONE && this.status == 200) {
            results.innerHTML = this.responseText;
        }
    };
    superhero.open("GET", "world.php?country="+country.value+"&context=cities",true);
    superhero.send();
    country.value = "";   
}
