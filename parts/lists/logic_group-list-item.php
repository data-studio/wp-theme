<li class="card logic-group-list-item">
  <a class="card-content"
    href="/logic-group/<?php the_ID(); ?>/"
    title="<?php the_title(); ?>">
    <!-- <div class="icon-container">
      <span class="material-icons">
        info_outline
      </span>
    </div> -->
    <div class="logic-group-date">
      <div class="day">
        <?php the_time('D j'); ?>
      </div>
      <div class="time">
        <?php the_time('g:ia'); ?>
      </div>
    </div>
    <div class="card-text">
      <h3>
        <span><?php echo get_field( 'logic_group_name', get_the_ID() ); ?></span>
      </h3>
      <p>
        Logic Group
      </p>
    </div>
    <span class="spacer"></span>
    <span class="logic-group-type">
      Type
    </span>
    <div class="logic-group-amt">
      <?php echo get_field( 'logic_group_count_models', get_the_ID() ); ?>
    </div>
    <div class="logic-group-amt">
      <?php echo get_field( 'logic_group_count_commands', get_the_ID() ); ?>
    </div>
    <div class="logic-group-amt">
      <?php echo get_field( 'logic_group_count_queries', get_the_ID() ); ?>
    </div>
    <span class="material-icons">
      chevron_right
    </span>
  </a>
</li>
