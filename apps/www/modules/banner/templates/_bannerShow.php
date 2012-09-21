<?php $count = count($banners) ?>

<?php if(0 != $count): ?>
  
  <div class="bann">
    
    <?php if(1 < $count): ?>
    
      <ul class="menu-ui"> 
        <?php $i = 0; ?>
        <?php foreach ($banners as $banner) : ?>
          <li><a href="#ui-<?php echo ++$i ?>" title="voir le slide"><?php echo $i ?></a></li>
        <?php endforeach; ?>
      </ul> 
    
    <?php endif; ?>
    
    <div id="carousel">
      <ul>
        <?php $i = 0; ?>
        <?php foreach ($banners as $banner) : ?>

          <li id="ui-<?php echo ++$i ?>">
            <?php if("" != $banner['link']): ?>
              <a id="<?php echo $banner['id'] ?>" href="<?php echo $banner['link'] ?>">
            <?php endif; ?>  
              <img src="/uploads/banner/<?php echo $banner['picture'] ?>" alt="<?php echo $banner['Translation'][$culture]['title'] ?>" />
            <?php if("" != $banner['link']): ?>
              </a>
            <?php endif; ?> 
          </li>
        <?php endforeach; ?>
      </ul>

    </div>
  
  </div>

<?php endif; ?>