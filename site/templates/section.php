<?php snippet('header') ?>

  <div id="wrapper" class="divided">
    <section class="section wrapper style1 align-center">
      <div class="anchor" name="<?= $page->slug() ?>"></div>
      <header>
        <div class="section-image" style="background-image:url(<?= $page->image()->url() ?>)">
          <!--h1><?= $page->title() ?></h1>
          <p><?= $page->subtitle() ?></p-->
        </div>
      </header>
      <div class="inner">
        <h2 class="align-left"><?= $page->title() ?></h2>
        <p class="align-left"><?= $page->subtitle() ?></p>
        <hr>
        <div class="p-align-left"><?= $page->text()->kirbytext() ?></div>
        <!-- Pages -->
        <div class="items style2 medium onscroll-fade-in">
        <?php foreach($page->children() as $folder): ?>
          <section>
            <a class="icon" href="<?= $folder->url() ?>">
              <div class="inner">
                <span class="icon style2 major fa-edit"></span>
                <h3><?= $folder->title() ?></h3>
                <p><?= $folder->intro()->kirbytext() ?></p>
              </div>
            </a>
          </section>        
        <?php endforeach ?>
        </div>
      </div>
      <!-- Gallery -->
      <div class="gallery style2 medium lightbox onscroll-fade-in">
      <?php foreach($page->files() as $file) :?>
        <article>
          <a href="<?= $file->url() ?>" class="image">
            <div class="slide-image" style="background-image: url('<?= $file->url() ?>')"></div>
          </a>
          <div class="caption">
            <h3><?= $file->title() ?></h3>
            <p><?= $file->caption() ?></p>
            <ul class="actions fixed">
              <li><span class="button small">Detalles</span></li>
            </ul>
          </div>
        </article>
      <?php endforeach; ?>
      </div>
    </section>
  </div>

<?php snippet('footer') ?>