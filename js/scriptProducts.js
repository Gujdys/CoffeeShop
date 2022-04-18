produkty = {}
async function init_website() {
    produkty = await GetProdukty('../php/apiHandler.php?doGetAllCoffee');
    generateProducts(listProduct, produkty);
    
}

init_website()
