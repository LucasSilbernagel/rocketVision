$(document).ready(function () {

  // // On click, toggle mobile menu
    $('#navIcon').click(function () {
      $(this).toggleClass('open');
      $('.mobileNav').toggleClass('openNav');
    });
  
    // // If screen is tapped outside the mobile menu, close the menu
    $(document).on("click", function(e){
      if( 
        $(e.target).closest(".mobileNav").length == 0 &&
        $(".mobileNav").hasClass("openNav") &&
        $(e.target).closest("#navIcon").length == 0
      ){
        $('.mobileNav').toggleClass('openNav');
        $('#navIcon').toggleClass('open');
      }
    });

  // Services tabs functionality
  $('#tabs li a:not(:first)').addClass('inactive');
  $('.tabContent').hide();
  $('.tabContent:first').show();
  $('#tabs li a').click(function () {
    let contentID = $(this).attr('id');
    if ($(this).hasClass('inactive')) { 
      $('#tabs li a').addClass('inactive');
      $(this).removeClass('inactive');
      $('.tabContent').hide();
      $('#' + contentID + 'C').fadeIn('slow');
    }
  });
  // Make service tabs keyboard accessible
  $('#tabs li a').keypress(function () {
    let contentID = $(this).attr('id');
    if ($(this).hasClass('inactive')) { 
      $('#tabs li a').addClass('inactive');
      $(this).removeClass('inactive');
      $('.tabContent').hide();
      $('#' + contentID + 'C').fadeIn('slow');
    }
  });

  // Submit categories form on change
  $('.categoriesForm select').on('change', function(){
    $('#categoriesForm').submit();
  });

  // Change colour of navigation link if that's the page we're on
  $("[href]").each(function() {
        if (this.href == window.location.href) {
            $(this).addClass("active");
        }
    });

});