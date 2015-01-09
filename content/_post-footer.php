<?php if(is_single()): ?>
  <footer class="entry-footer">
    <div class="entry-tags"><?php the_tags( '<span class="tags-title">Tags:</span> <span class="badge">', '</span><span class="badge">', '</span>' ); ?></div>
    <?php edit_post_link( __( 'Edit', 'tw' ), '<span class="edit-link">', '</span>' ); ?>
  </footer>
  <?php endif; ?>