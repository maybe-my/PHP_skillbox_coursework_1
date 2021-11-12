$(document).ready(function() {
    // Добавить товар
    $('button').on('click', function() {
        var nameValue = $('input#product-name').val(); // name
        var priceValue = $('input#product-price').val(); // price
        var categoryValue = $('select.custom-form__select').val(); // category
        // Checkboxs
        var is_newValue = $('#new').is( ":checked" )? 1 : 0;
        var is_saleValue = $('#sale').is( ":checked" )? 1 : 0;

        // image
        var file_data = $('#product-photo').prop('files')[0];
        var form_data = new FormData();

        form_data.append('product-photo', file_data);
        form_data.append('product-name', nameValue);
        form_data.append('product-price', priceValue);
        form_data.append('product-category', categoryValue);
        form_data.append('product-new', is_newValue);
        form_data.append('product-sale', is_saleValue);
        $.ajax({
            url: 'add_tovar.php', // <-- point to server-side PHP script
            dataType: 'text',  // <-- what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(php_script_response){
                // alert(php_script_response); // <-- display response from the PHP script, if any
            }
        });
    })
});