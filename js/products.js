//Functions
function generateProducts(component, produkty) {
    let productsString = "";
    for(let i = 0; i < produkty.length; i++) {
        productsString += component(produkty[i].id,produkty[i].nazev, produkty[i].cena, produkty[i].cena_sleva, produkty[i].avg_rating,
                                 produkty[i].sleva, produkty[i].image);
    }
    document.querySelector("#productsBox").innerHTML = productsString;
}

//API calls
async function GetProdukty(url) { //Asynchronous request to api.php
    res = await fetch(url, {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json'
        }
      })
    .then((res) => res.json());
    return res;     
}

async function GetProdukt(url) {
  res = await fetch(url, {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json'
    }
  })
  .then((res) => (res == "error") ? "error" : res.json());
  return res;
}

function openProduct(id) {
  window.location.href = `/coffeeShop/produkty/produkt.html?id=${id}`;
}