function product(id, name, price, discountPrice, rating, discount, image) {

    let price_string = (discount == 0) ? ""+price : discountPrice + "" + `<span>${price}</span>`;

    return `
    <div class="box" onclick="openProduct(${id})">
        <div class="icons">
            <a href="#" class="fas fa-shopping-cart"></a>
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
        </div>
        <div class="image">
            <img src="${image}" alt="">
        </div>
        <div class="content">
            <h3>${name}</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <div class="price">${price_string}</div>
        </div>
    </div>`;
}