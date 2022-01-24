function updateCartQuantity(product_id){
    var quantity = document.getElementById(`quantity${product_id}`).value;

    location.href=`http://localhost/RodrigoStore/?page=cart&method=updateCartItem&quantity=${quantity}&id=${product_id}`;
}