<?php include_partial('public/header', array('vars' => $varHeader)) ?>
<article id="page-<?php echo $item['id'] ?>">

  <header>
    <h1>
        <a
          href="<?php echo url_for('item_show', array('slug' => $item['slug'], 'sf_format' => 'html')) ?>"
          rel=""
        >
          <?php echo htmlentities($item['title']) ?>
        </a>
      </h1>
  </header>

  <section>
    <?php echo htmlspecialchars_decode($item['content']) ?>
  </section>

  <footer>
    <?php include_partial('author', array('author' => $item['sfGuardUser'])) ?>
    <?php include_partial('date', array('created' => $item['created_at'], 'updated' => $item['updated_at'], 'culture' => $culture)) ?>
  </footer>

</article>
<?php include_partial('public/footer', array('vars' => $varFooter)) ?>
