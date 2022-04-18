produkt = {}
const id = new URLSearchParams(window.location.search).get('id');

async function init_website() {
    //Get ID from url
    produkt = await GetProdukt(`../php/apiHandler.php?doGetCoffee&id=${id}`);
    await generateData();

    async function generateData() {
    const content = document.querySelector(".cnt");
    const nadpis = document.querySelector(".nadpis");
    const img = document.querySelector(".img");
    const cena = document.querySelector(".cena");
    const popis = document.querySelector(".popis");
    const odruda = document.querySelector(".odruda_nazev");
    const pouziti = document.querySelector(".pouziti_nazev");
    const prazirna = document.querySelector(".prazirna_nazev");
    const region = document.querySelector(".region_nazev");
    const stupenPrazeni = document.querySelector(".stupenPrazeni_nazev");
    const vaha = document.querySelector(".vaha");
    const zemePuvodu = document.querySelector(".zemePuvodu_nazev");
    const zpusobZpracovani = document.querySelector(".zpusobZpracovani_nazev");
    const cena_sleva = document.querySelector(".cena_sleva");
    
    console.log(produkt);
    
    // Generate code
    nadpis.textContent = produkt[0].nazev;
    img.src = produkt[0].image;
    cena.textContent = produkt[0].cena + "Kč";
    //cena_sleva.textContent = produkt[0].cena_sleva;
    popis.textContent = produkt[0].popis;
    //vaha.textContent = produkt[0].vaha + "g";
    odruda.textContent = "Odruda : "        +produkt[0].odruda_nazev;
    pouziti.textContent = "Použítí : "      +produkt[0].pouziti_nazev;
    prazirna.textContent = "Pražírna : "    +produkt[0].prazirna_nazev;
    region.textContent = "Region : "        +produkt[0].region_nazev;
    stupenPrazeni.textContent = "Stupeň pražení : "+produkt[0].stupenPrazeni_nazev;
    zemePuvodu.textContent = "Země původu : "      +produkt[0].zemePuvodu_nazev;
    zpusobZpracovani.textContent = "Způsob zpracování : " +produkt[0].zpusobZpracovani_nazev;
}

}  

//Code of Slide
var slideIndex = 1;
showSlides(slideIndex);
function plusSlides(n) {
showSlides(slideIndex += n);
}
function currentSlide(n) {
 showSlides(slideIndex = n);
}    
function showSlides(n) {
var i;
var slides = document.getElementsByClassName("slides");
          var dots = document.getElementsByClassName("dot");
          if (n > slides.length) {slideIndex = 1}    
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";  
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
        };
//Code of Menu Tab.
 function openData(evt, dataName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(dataName).style.display = "block";
                evt.currentTarget.className += " active";
            }
 document.getElementById("defaultOpen").click();


  




init_website()