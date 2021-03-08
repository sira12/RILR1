$(document).ready(function() {

        //  search product
       $("#busquedaproductov").keyup(function(){
          // Retrieve the input field text
          var filter = $(this).val();
          // Loop through the list
          $("#productList2 #proname").each(function(){
             // If the list item does not contain the text phrase fade it out
             if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                 $(this).parent().parent().parent().hide();
             // Show the list item if the phrase matches
             } else {
                 $(this).parent().parent().parent().show();
             }
          });
       });
    });


    $(".categorias").on("click", function () {
       // Retrieve the input field text
       var filter = $(this).attr('id');
       $(this).parent().children().removeClass('selectedGat');
       $(this).addClass('selectedGat');
    });


    $(".categories").on("click", function () {
       // Retrieve the input field text
       var filter = $(this).attr('id');
       $(this).parent().children().removeClass('selectedGat');

       $(this).addClass('selectedGat');
       // Loop through the list
       $("#productList2 #category").each(function(){
          // If the list item does not contain the text phrase fade it out
          if ($(this).val().search(new RegExp(filter, "i")) < 0) {
             $(this).parent().parent().parent().hide();
             // Show the list item if the phrase matches
          } else {
             $(this).parent().parent().parent().show();
          }
       });
    });