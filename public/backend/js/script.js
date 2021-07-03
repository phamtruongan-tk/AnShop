$(document).ready(function () {
    $('.search').keyup(function () { 
        $.ajax({
            type: "POST",
            url: "http://localhost/AnShop/ajax/search/",
            data: {
                keyword: $('.search').val()
            },
            // dataType: "dataType",
            success: function (response) {
                $('.tboby').html(response);
                $('.pagination').html('')
            }
        });
    });
    $('.search-bill').keyup(function () { 
        $.ajax({
            type: "POST",
            url: "http://localhost/AnShop/ajax/searchBill/",
            data: {
                keyword: $('.search-bill').val()
            },
            success: function (response) {
                $('.tbody').html(response);
                $('.pagination').html('')
            }
        });
    });

    $('.filter').change(function () { 
       var url = $(this).val(); 
       window.location.href = 'http://localhost/AnShop/'+ url 
    });

    current_url()

    function  current_url( ) {
        var url = window.location.href;
        $('.filter').find('option[value="'+url.slice(24)+'"]').attr('selected',true);
    }
});