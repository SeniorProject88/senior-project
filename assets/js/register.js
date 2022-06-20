$("#customer_btn").on('click', function() {

    $(this).toggleClass("btn-outline-primary btn-primary")
    $("#owner_btn").toggleClass("btn-outline-primary btn-primary")


    $(".owner-form").hide();
    $(".customer-form").show();

});

$("#owner_btn").on('click', function() {

    $(this).toggleClass("btn-outline-primary btn-primary")
    $("#customer_btn").toggleClass("btn-outline-primary btn-primary")
    
    $(".customer-form").hide();
    $(".owner-form").show();
}); 