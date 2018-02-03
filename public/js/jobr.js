var relUrl = window.location.pathname;
var splitUrl = relUrl.split("/");

if (splitUrl[splitUrl.length - 1] != "" && splitUrl[splitUrl.length - 1] != "dela") {
    //$(".navbar-default").css("background", "linear-gradient(to right, rgba(33,147,176,1) 0%,rgba(109,213,237,1) 100%)");
    $(".navbar-default").css("background", "#3a4651");

    $(".navbar-default").each(function () {
        this.style.setProperty( 'padding-top', '0', 'important' );
        this.style.setProperty( 'height', '70px', 'important' );
    });
}

$(document).ready(function(){
  footerMargin();
  if($(window).width() < 480){
    headerHeight();

    $(".navbar-default").css("background", "#3a4651");

    $(".navbar-default").each(function () {
        this.style.setProperty( 'padding-top', '0', 'important' );
        this.style.setProperty( 'height', '70px', 'important' );
    });
  }
});

$(window).resize(function(){
  footerMargin();
  if($(window).width() < 480){
    headerHeight();
  }
});


function footerMargin(){
  var a = parseInt($('footer').css('height'));
  $('body').css('padding-bottom', a + 30);
}

function headerHeight(){
  var a = parseInt($('.header-content').css('height'));
  $('.video-wrapper').css('height', a + 100);
  $('.header-overlay').css('height', a + 100);
  $('.video-header ').css('height', a +20);

}

$('#search').submit(function(event){
  event.preventDefault();
  applyFilter();
})

function applyFilter(){
  let filters = $('#filters').serialize();
  let search = $('#search').serialize()
  if(filters.length > 0 ){
    if(search.length > 0)
      data = filters.concat('&'+search);
    else
      data = filters;
  }
  else{
    data = search
  }
  $.ajax( {
      type: "GET",
      url: $('#filters').attr('action'),
      data: data,
      success: function( data ) {
        $('#job-list').html(data);
      }
  });
}

function clearFilters(){
  $('input:checkbox').removeAttr('checked');
  $('#search-text').val('');
  applyFilter();
}

function changeUserPic(event){
  event.preventDefault();
  $('#pic-input').click();
}



function updatePicPreview(input){
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#pic').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

if (splitUrl[splitUrl.length - 1] == "" || splitUrl[splitUrl.length - 1] == "dela") {
  // get the value of the bottom of the #main element by adding the offset of that element plus its height, set it as a variable
  var mainbottom = $('.scrollpast').offset().top + $('.scrollpast').height();
  // on scroll,
  $(window).on('scroll', function(){

      
      // we round here to reduce a little workload
      var stop = Math.round($(window).scrollTop());

      if (stop > mainbottom) {
          $(".navbar-default").each(function () {
          this.style.setProperty( 'background', '#3a4651', 'important' );
          this.style.setProperty( 'padding-top', '0', 'important' );
          this.style.setProperty( 'border-bottom', '1px solid #fff', 'important' );
      });
      } else {
        $(".navbar-default").each(function () {
          this.style.setProperty( 'background', 'transparent', 'important' );
          this.style.setProperty( 'padding-top', '15px', 'important' );
          this.style.setProperty( 'border-bottom', 'none', 'important' );
      });
      }

  });
}
