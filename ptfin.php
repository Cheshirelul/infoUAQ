<?php
echo '<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>$(window, document, undefined).ready(function() {

  $(\rinput\r).blur(function() {
    var $this = $(this);
    if ($this.val())
      $this.addClass(\rused\r);
    else
      $this.removeClass(\rused\r);
  });

  var $ripples = $(\r.ripples\r);

  $ripples.on(\rclick.Ripples\r, function(e) {

    var $this = $(this);
    var $offset = $this.parent().offset();
    var $circle = $this.find(\r.ripplesCircle\r);

    var x = e.pageX - $offset.left;
    var y = e.pageY - $offset.top;

    $circle.css({
      top: y + \rpx\r,
      left: x + \rpx\r
    });

    $this.addClass(\ris-active\r);

  });

  $ripples.on(\ranimationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd\r, function(e) {
    $(this).removeClass(\ris-active\r);
  });

});

</script>';
?>