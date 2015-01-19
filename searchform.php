<div class="search-form-container">
  <form class="hidden-print form-inline" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
      <div class="form-group">
          <label class="screen-reader-text sr-only" for="s"><?php _e('Search for','mh');?>:</label>
          <div class="input-group">

            <input class="form-control "type="text" value="" name="s" id="s" placeholder="<?php _e('Search','mh'); ?>" />
            <div class="input-group-btn">
                  <button class="btn btn-default" type="submit" id="searchsubmit" ><i class="fa fa-search"></i></button>
            </div>
          </div>
      </div>

  </form>
</div>