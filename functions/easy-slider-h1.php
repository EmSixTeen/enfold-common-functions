<?php
/* Force the Fullwidth Easy Slider title to be H1 instead of H2 for better semantic heirarchy */
function replace_tags_with_tags(){
?>
<script>
  (function($) {       
      function replaceElementTag(targetSelector, newTagString) {
        $(targetSelector).each(function(){
          var newElem = $(newTagString, {html: $(this).html()});
          $.each(this.attributes, function() {
            newElem.attr(this.name, this.value);
          });
          $(this).replaceWith(newElem);
        });
      }
    
      replaceElementTag('.slideshow_caption h2.avia-caption-title', '<h1></h1>');
    
  }(jQuery)); 
</script>
<?php
}
add_action('wp_footer', 'replace_tags_with_tags');