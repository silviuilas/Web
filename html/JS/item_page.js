
_(function() {
    load_prices_ajax();
    make_stars();
});
function fav_toggle(){
    let fav=document.getElementById("favButton");
    if(fav.classList.contains("fa-heart-o")) {
        fav.classList.add("fa-heart");
        fav.classList.remove("fa-heart-o");
        return 1;
    }
    else{
        fav.classList.add("fa-heart-o");
        fav.classList.remove("fa-heart");
        return 0;
    }

}
function fav_ajax(){
    let prd_name=document.getElementById("item_name").innerHTML;
    let set=fav_toggle();
    _().post(_URL + "/API/ajax_functions.php",
        {product_name: prd_name, set: set, fct_name: "favorite_system"},
        function (result) {}
    );
}

function make_stars() {
    let text="";
    let i=0;
    for(i=0;i<5;i++)
        text+="<span class=\"fa fa-star\" onclick=\"rate_stars("+i+");\"></span>";
    document.getElementById("stars").innerHTML=text;
}
function rate_stars(star){
    let x=document.getElementsByClassName("fa fa-star");
    let prd_name=document.getElementById("item_name").innerHTML;
    if(!(x[0].style.color==="orange")) {
        _().post(_URL + "/API/ajax_functions.php",
            {product_name: prd_name, rating: star, fct_name: "rate_system"},
            function (result) {
                for (let i = 0; i <= star; i++)
                    x[i].style.color = "orange";
            }
        );
    }

}
function load_prices_ajax(){
    function modify_prices(data_array){
        if(data_array!=null) {
            if (data_array['imglink'] != null)
                document.getElementById('img_style').src = data_array['imglink'];

            function showElement(item) {
                document.getElementById('prices_list').innerHTML +=
                    "<a href='"+item['link']+"' target=\"_blank\">"+
                    "<div class='in_item'>" +
                        "<div class='in_item_shopimg_box'>" +
                            "<img class='in_item_shopimg_img'src='" + item['shopimg'] + "'>" +
                        "</img>" +
                        "</div>" +
                        "<div class='in_item_shopname'>" +
                            item['shopname'] +
                        "</div>" +
                        "<div class='in_item_price'>" +
                            item['price'] +
                        "</div>" +
                    "</div>"+
                    "</a>"+
                    "<div class='space'></div>";

            }


            document.getElementById('prices_list').innerHTML += "<div class='in_items_wrapper'>";
            data_array['items'].forEach(showElement);
            document.getElementById('prices_list').innerHTML += '</div>';
            document.getElementById('prices_list').style.height="0";
            _('#prices_list').slideHeight(null,100);
        }

    }

    let _current_url = _URL + "/API/api.php?name=" + document.getElementById('item_name').innerText;
    _().ajax({
        url: _current_url,
        contentType: "application/json",
        dataType: 'json',
        success: function(result){
            modify_prices(result.data);
        }
    })
}
