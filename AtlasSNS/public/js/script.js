$(function () {
  $('.js-modal-open').on('click', function () {
    var post = $(this).attr('post');
    var post_id = $(this).attr('post_id');
    $('.post').val(post);
    $('.id').val(post_id);
    $('.js-modal').fadeIn();
    return false;
  });
  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});


// アコーディオン
$('.ac-parent').click(function () {
  $(this).toggleClass('active');
  $(this).siblings('ul').stop().slideToggle();
});
