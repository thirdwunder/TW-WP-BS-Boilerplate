<?php
$image_sizes = array('4x3-small','16x9-medium','16x9-large');
$images = tw_get_post_images($image_sizes, 0);

if(count($images)): ?>
  <section id="gallery-carousel-<?php echo $post->ID; ?>" class="gallery-carousel carousel carousel-fade slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php for($i=0; $i<count($images); $i++): ?>
      <li data-target="#gallery-carousel-<?php echo $post->ID; ?>" data-slide-to="<?php echo $i; ?>" <?php if($i==0){ echo 'class="active"';} ?>></li>
      <?php endfor; ?>
    </ol>


    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <?php $count=0; foreach($images as $k=>$v): ?>
      <div class="item <?php if($count==0){ echo('active'); }?>" itemscope itemtype="http://schema.org/ImageObject">

        <img itemprop="contentUrl" src="<?php echo $v['url'] ?>" alt="<?php echo $v['alt'] ?>" />
        <div class="carousel-caption">
          <?php if($v['caption']!=''): ?><h3 itemprop="caption"><?php echo $v['caption'] ?></h3><?php endif; ?>
          <?php if($v['description']!=''): ?><p itemprop="description"><?php echo $v['description'] ?></p><?php endif; ?>
        </div>
      </div><!-- item -->
      <?php $count++; endforeach; ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#gallery-carousel-<?php echo $post->ID; ?>" data-slide="prev">
      <i class="fa fa-angle-left"></i>
    </a>
    <a class="right carousel-control" href="#gallery-carousel-<?php echo $post->ID; ?>" data-slide="next">
      <i class="fa fa-angle-right"></i>
    </a>
  </section>






<?php elseif(has_post_thumbnail()):
  $image_caption =  get_post( get_post_thumbnail_id($post->ID) )->post_excerpt;
?>
  <figure class="entry-image">
    <?php echo tw_the_post_thumbnail(array('4x3-small','16x9-medium','16x9-large'), array('itemprop'=>'image'));
      if($image_caption): ?>
        <figcaption class="caption"><?php echo $image_caption;?></figcaption>
      <?php endif; ?>z
  </figure>
<?php endif; ?>

