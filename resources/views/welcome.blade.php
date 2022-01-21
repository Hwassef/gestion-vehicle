@include('layouts.app')
<div class="animate " style="font-size: 100px; margin:auto;"></div>
<script>
var showText = function(target, message, index, interval) {
  if (index < message.length) {
    $(target).append(message[index++]);
    setTimeout(function() {
      showText(target, message, index, interval);
    }, interval);
  } else {
    index = 0;
    $(target).html('');
    showText(target, message, index, interval);
  }
}
$(function() {
  showText(".animate", "Comming Soon ...", 0, 200);
});
</script>
