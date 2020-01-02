
<?php
  if (is_user_logged_in()) {
    echo('<pre>'); print_r(current($images)); echo('</pre>');
    echo('<pre>'); print_r($stats); echo('</pre>');
  }
?>

<style>
.masonry { /* Masonry container */
    column-count: 6;
    column-gap: 1em;
}

.item { /* Masonry bricks or child elements */
    display: inline-block;
    margin: 0 0 1em;
    width: 100%;
}

}</style>

  <?php if (!empty($images) && $stats['total_images'] > 0): ?>
    <div class="masonry">
      <?php foreach ($images as $image): ?>
        <?php $image['file_path'] = str_replace(ABSPATH, get_site_url() . '/', $image['file_path']); ?>
        <?php $image['thumb_path'] = get_site_url() . '/' . $image['thumb_path']; ?>
       	<div class="item">
      	  <a href="<?php echo $image['file_path']; ?>" rel="<?php echo $relText; ?>" class="fusion-lightbox">
                  <img src="<?php echo $image['thumb_path']; ?>" alt="<?php echo $image['file_title']; ?>" class="img-responsive img-promo"/>
          </a>
      	</div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>

    <p>No images found.</p>

  <?php endif; ?>







    <div id="galleryFooter" class="clearfix">
FOOTER
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
