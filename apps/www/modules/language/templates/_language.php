<div class="language floatRight">
  <ul>
    <?php foreach($language['lang'] as $key => $value): ?>
      <li id="<?php echo $value ?>" class="langue<?php echo ($sf_user->getCulture() == $value) ? ' current' : '' ?>">
        <a href="/<?php echo $value ?>/" title="<?php echo __($language['trad'][$key]) ?>"><?php echo $value ?></a>
      </li>
    <?php endforeach; ?>
  </ul>    
</div>
