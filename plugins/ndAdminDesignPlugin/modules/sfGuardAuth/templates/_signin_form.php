<?php $interface = unserialize(peanutConfig::get('interface')); ?>

<h1 class="nohidden"><?php echo __('Administration interface') ?> | <?php echo $interface['title'] ?></h1>
<div class="logo">
  <?php
    $logo = (isset($interface['logo'])) ? $interface['logo'] : '';
    echo showThumb(
      $logo, 
      'admin', 
      $options = array(
          'width' => '500', 
          'height' => '150', 
          'alt' => $interface['title'],
          'itemprop' => 'image'
      ), 
      $resize = 'center', 
      $default = 'default_logo.png'
    );
  ?>
</div>

<form class="box login" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <fieldset class="boxBody">
    <label><?php echo __('Username') ?></label><?php echo $form['username']->render() ?>
    <label><?php echo __('Password') ?></label><?php echo $form['password']->render() ?>
    <?php echo $form->renderHiddenFields(); ?>
  </fieldset>
  <footer>
    <input type="submit" class="btnLogin" value="<?php echo __('Login') ?>" tabindex="4">
    <?php if($form['username']->hasError() || $form['password']->hasError()): ?>
    <div class="error">
      <?php echo __('Username and / or password unknown') ?> <?php echo $form['password']->getError() ?>
    </div>
  <?php endif; ?> 
  </footer>
</form>


<?php if(isset($interface['background'])): ?>
  <script>
    $(document).ready(function(){
      var background = "/uploads/admin/<?php echo $interface['background'] ?>";
      console.log(background);
      $('body').css('background', 'url(/uploads/admin/<?php echo $interface['background'] ?>)')
    });
  </script>
<?php elseif($interface['color']): ?>
  <script>   
    $(document).ready(function(){
      var color = "<?php echo $interface['color'] ?>";
      $('body').css('background', color)
    });
  </script>
<?php endif; ?>