
$(document).ready(function () {
    var page = 1
    $('.readMore').click(function () { 
        var id = $('.readMore').attr('id')
        page++
        $.ajax({
            type: "POST",
            url: "http://localhost/AnShop/ajax/readmore/"+id+'/'+page,
            success: function (response) {
                $('.append').append(response);
                if(response == ''){
                    $('.readMore').html('Không còn sản phẩm');
                }
            }
        });
    });
    $('.decrease').click(function () { 
        var id = $('.decrease').attr('id')
        page++
        $.ajax({
            type: "POST",
            url: "http://localhost/AnShop/ajax/readmoredecrease/"+id+'/'+page,
            // dataType: "dataType",
            success: function (response) {
                $('.append').append(response);
                if(response == ''){
                    $('.decrease').html('Không còn sản phẩm');
                }
            }
        });
    });
    $('.ascending').click(function () { 
        var id = $('.ascending').attr('id')
        page++
        $.ajax({
            type: "POST",
            url: "http://localhost/AnShop/ajax/readmoreascending/"+id+'/'+page,
            // dataType: "dataType",
            success: function (response) {
                $('.append').append(response);
                if(response == ''){
                    $('.ascending').html('Không còn sản phẩm');
                }
            }
        });
    });

    $('.provice').change(function () { 
        var matp = $(this).val();
        $.ajax({
            type: "POST",
            url: "http://localhost/AnShop/ajax/loadDistrict/"+matp,
            success: function (response) {
                $('.district').html(response)
            }
        });
    });
    $('.district').change(function () { 
        var maqh = $(this).val();
        $.ajax({
            type: "POST",
            url: "http://localhost/AnShop/ajax/loadWard/"+maqh,
            success: function (response) {
                $('.ward').html(response)
            }
        });
    });
    $('.view_order').click(function () { 
        var bill_id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "http://localhost/AnShop/ajax/loadbilldetail/"+bill_id,
            success: function (response) {
                $('.loadbilldetail-'+bill_id).html(response)
            }
        });
    });
    $('.search-sell').keyup(function () { 
        $.ajax({
            type: "POST",
            url: "http://localhost/AnShop/ajax/suggestions/",
            data:{
                keyword : $('.search-sell').val()
            },
            success: function (response) {
                $('.result-search').html(response);
            }
        });
    });
    $('.btn-rate').click(function () {
        var comment = $('.rate-inp').val();
        var id = $('#product_id').val();
        if(comment !== ''){
            $.ajax({
                type: "POST",
                url: "http://localhost/AnShop/ajax/comment/"+comment+'/'+id,
                success: function (response) {
                    $('.load-rate').append(response)
                    $('.rate-inp').val('')
                }
            }); 
        }
              
    });

    $('.price-filter').change(function () { 
        var  url = $(this).val();
        window.location.href = 'http://localhost/AnShop/'+url
    });

    currentCate()

    function currentCate( ) {
        var url = $(location).attr('href');
        $('.price-filter').find('option[value="'+url.slice(24)+'"]').attr('selected',true);
    }
});

