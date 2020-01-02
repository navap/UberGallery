<?php
  if (is_user_logged_in()) {
    //echo('<pre>'); print_r(current($images)); echo('</pre>');
    //echo('<pre>'); print_r($album); echo('</pre>');
  }
?>

<?php if (!empty($images) && $stats['total_images'] > 0): ?>
    <?php $key = array_rand($images);
      $image = $images[$key];
      $newThumbPath = explode('/', $image['thumb_path']);
      $image['thumb_path'] = get_site_url() . '/' . implode('/', array_slice($newThumbPath, -6)); ?>      
      <div class="grid-item">
        <a href="<?php echo $album['link']; ?>" title="<?php echo ucwords($album['title']); ?>">
          <img src="<?php echo $image['thumb_path']; ?>" alt="<?php echo $image['file_title']; ?>" class="img-responsive img-promo"/>
        </a>
        <div class="image-caption">
          <a href="<?php echo $album['link']?>" title="<?php echo ucwords($album['title']); ?>"><?php echo ucwords($album['title']); ?></a>
          <span class="image-count">(<?php echo $stats['total_images'] ?>)</span>
        </div>
      </div>
<?php else: ?>
  <div class="grid-item">
    <p><span title="<?php echo $album['title'] ?>">No images found</span>.</p>
  </div>
<?php endif; ?>
