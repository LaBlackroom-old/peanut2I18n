<?php use_helper('Text') ?>
<?php include_partial('public/header', array('vars' => $varHeader)) ?>
<section>

  <h1><?php echo __('Last entries') ?></h1>
  
  <?php foreach($items as $item): ?>

  <article id="page-<?php echo $item['id'] ?>">

    <header>
      <h1>
        <a
          href="<?php echo url_for('item_show', array('slug' => $item['Translation'][$culture]['slug'], 'sf_format' => 'html')) ?>"
          rel=""
        >
          <?php echo htmlentities($item['Translation'][$culture]['title']) ?>
        </a>
      </h1>
    </header>

    <section>
      <?php
        if($item['type'] == 'page' && $item['Translation'][$culture]['excerpt']):
          echo htmlspecialchars_decode($item['Translation'][$culture]['excerpt']);
        else:
          echo truncate_text(htmlspecialchars_decode($item['Translation'][$culture]['content']), 340);
        endif;
      ?>
    </section>

    <footer>
      <?php include_partial('author', array('author' => $item['sfGuardUser'])) ?>
      <?php include_partial('date', array('created' => $item['created_at'], 'updated' => $item['updated_at'], 'culture' => $culture)) ?>
    </footer>

  </article>

  <?php endforeach; ?>
  
</section>
<?php include_partial('public/footer', array('vars' => $varFooter)) ?>