<div class="col-lg-4 col-md-4 col-sm-3 hidden-xs hidden-sm sidebar">
  <aside>
    <!-- WordPress Widgets Sidebard -->
    <?php if(is_active_sidebar('sidebar')) : ?>
      <?php dynamic_sidebar('sidebar'); ?>
    <?php else : ?>
      <ul class="nav nav-tabs nav-justified">
        <li role="presentation" class="nav-item active">
          <a class="nav-link show active" data-toggle="tab" href="#populars"><i class="fa fa-fire" aria-hidden="true"></i> Populars</a>
        </li>
        <li role="presentation" class="nav-item">
          <a class="nav-link show" data-toggle="tab" href="#home"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Latests</a>
        </li>
        <li role="presentation" class="nav-item">
          <a class="nav-link show" data-toggle="tab" href="#profile"><i class="fa fa-comments" aria-hidden="true"></i> Latests</a>
        </li>
      </ul>

      <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="populars">
          <!--  Populares -->
          <div class="panel panel-default">
            <div class="panel-body no-padding">
              <?php
              $my_query = new wp_query(
                array(
                  'orderby'         =>  'comment_count',
                  'posts_per_page'  =>  '10',
                  'post_parent'     =>  0,
                  'post_type'       =>  array('post', 'portfolio', 'snippets'),
                )
              );
              ?>
              <?php if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post(); ?>
                <div class="list-group no-margin">
                  <a href="<?php the_permalink(); ?>" class="list-group-item" id="populares">
                    <?php echo wp_trim_words( get_the_title(), 3, '...' ); ?>
                    <strong class="label label-success pull-right"><?php echo get_post_type( get_the_ID() ); ?></strong>
                  </a>
                </div>
              <?php endwhile; endif;?>
              <?php wp_reset_query(); ?>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="home">
          <!-- Recent Posts -->
          <?php $postslist = get_posts('numberposts=5&order=DESC'); ?>
          <?php  if($postslist) : foreach ($postslist as $post) : setup_postdata($post); ?>
            <div class="media">
              <a class="pull-left" href="<?php the_permalink();?>">
                <?php the_post_thumbnail(array('class'=>'media-object')); ?>
              </a>
              <div class="media-body">
                <a href="<?php the_permalink();?>">
                  <h6 class="media-heading"><?php the_title();?></h6>
                </a>
                <small><?php the_excerpt(); ?></small>
                <small><i class="fa fa-clock-o" aria-hidden="true"></i> Posted on <time itemprop="datePublished"><?php the_time('F jS, Y'); ?></time> at <?php the_category(','); ?></small>
              </div>
            </div>
          <?php endforeach; ?><?php else : ?>
            <div class="alert alert-danger">No post found</div>
          <?php endif; ?>
        </div>
        <div class="tab-pane fade" id="profile">
          <!-- Recent Comments -->
          <?php $postcomments = get_comments('number=5&status=approve&order=DESC') ;?>
          <?php if($postcomments) : foreach($postcomments as $comment) : ?>
            <div class="media">
              <a class="pull-left" href="<?php echo esc_url( $comment->comment_author_url ); ?>" target="_blank"><?php echo get_avatar( $comment->comment_author_email, 60 ); ?></a>
              <div class="media-body">
                <h5 class="media-heading">
                  <a href="<?php echo esc_url( $comment->comment_author_url ); ?>"><?php echo $comment->comment_author; ?></a> en <a href="<?php echo esc_url( get_permalink( $comment->comment_post_ID ) ); ?>"><?php echo $comment->post_title; ?></a>
                </h5>
                <!--<div class="media-body"><?php echo wp_html_excerpt($comment->comment_content,10) ; ?></div>-->
                <small id="small-footer">
                  <?php the_time('M j, Y'); ?>
                </small>
              </div>
            </div>
          <?php endforeach; ?><?php else : ?>
            <div class="alert alert-danger">No comments found</div>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>
  </aside>
</div>
