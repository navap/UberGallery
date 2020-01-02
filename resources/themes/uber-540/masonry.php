
<?php
  if (is_user_logged_in()) {
    echo('<pre>'); print_r(current($images)); echo('</pre>');
    echo('<pre>'); print_r($stats); echo('</pre>');
  }
?>

<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

<style>
.grid-sizer,
.grid-item {
  width: 290px;
  margin-bottom: 20px;
}

.grid-item img {
  max-height: 406px;
  min-width: 290px;
}
</style>

<?php if (!empty($images) && $stats['total_images'] > 0): ?>
  <div class="grid">
    <div class="grid-sizer"></div>
    <?php foreach ($images as $image): ?>
      <?php $image['file_path'] = str_replace(ABSPATH, get_site_url() . '/', $image['file_path']); ?>
      <?php $newThumbPath = explode('/', $image['thumb_path']) ?>
      <?php $image['thumb_path'] = get_site_url() . '/' . implode('/', array_slice($newThumbPath, -6)); ?>
      <div class="grid-item">
        <a href="<?php echo $image['file_path']; ?>" rel="<?php echo $relText; ?>" 
            data-fancybox="gallery" 
            data-options='{
                "buttons": [
                  "zoom",
                  "fullscreen",
                  "download",
                  "thumbs",
                  "close"
                ]
              }'
            >
              <img src="<?php echo $image['thumb_path']; ?>" alt="<?php echo $image['file_title']; ?>" />
        </a>
      </div>
    <?php endforeach; ?>
  </div>
<?php else: ?>

  <p>No images found.</p>

<?php endif; ?>

<script>
  var grid = document.querySelector('.grid');

  var msnry = new Masonry( grid, {
    itemSelector: '.grid-item',
    columnWidth: '.grid-sizer',
    gutter: 20,
    //horizontalOrder: true,
  });

  imagesLoaded( grid ).on( 'progress', function() {
    // layout Masonry after each image loads
    msnry.layout();
  });


  $("[data-fancybox]").fancybox({
    keyboard: false,
    buttons: [
      "zoom",
      "share",
      "fullscreen",
      "download",
      "thumbs",
      "close"
    ],
    thumbs: {
      autoStart: true
    }
  });  
</script>





    <div id="galleryFooter" class="clearfix">

        <?php if ($stats['total_pages'] > 1): ?>

            <ul id="galleryPagination">

                <?php foreach ($paginator as $item): ?>
                    <li class="<?php echo $item['class']; ?>">
                        <?php if (!empty($item['href'])): ?>
                            <a href="<?php echo $item['href']; ?>"><?php echo $item['text']; ?></a>
                        <?php else: ?>
                            <?php echo $item['text']; ?>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>

            </ul>

        <?php endif; ?>

    </div>
