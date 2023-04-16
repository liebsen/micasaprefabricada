<?php snippet('header') ?>
  <div id="wrapper" class="divided">
    <section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right" id="home">
      <div class="content">
        <div class="anchor" name="<?= $site->children()->first()->slug() ?>"></div>
        <h1><?php echo $page->title()->html() ?></h1>
        <p class="text-light major"><?= $page->text()->kirbytext() ?></p>
        <ul class="actions stacked">
          <li><a href="#<?= $site->children()->first()->next()->slug() ?>" class="button large wide smooth-scroll-middle">Comenzar</a></li>
        </ul>
      </div>
      <div class="onscroll-content-fade-left" style="<?= $site->children()->first()->style()->value() ?: '' ?>">
        <div class="swiffy" style="background-image: url('<?= $page->files()->first() ? $page->files()->first()->url() : ''; ?>')">
          <div class="swiffy-slider">
            <ul class="slider-container">
              <?php foreach($site->find('modelos')->children() as $item):?>
              <li>
                <a href="<?= $item->url() ?>" class="swiffy-item">
                  <div class="swiffy-img" style="background-image: url('<?= $item->files()->first() ? $item->files()->first()->url() : '' ?>')"></div>
                  <div class="swiffy-text">
                    <h4><?= $item->title() ?></h4>
                    <p><?= $item->subtitle() ?></p>
                  </div>
                </a>
              </li>
            <?php endforeach ?>
            </ul>

            <button type="button" class="slider-nav"></button>
            <button type="button" class="slider-nav slider-nav-next"></button>

            <div class="slider-indicators">
              <button class="active"></button>
              <button></button>
              <button></button>
            </div>
          </div>
        </div>
        <div class="tail" name="<?= $site->children()->first()->slug() ?>"></div>
      </div>
    </section>

    <?php $i=0; foreach($site->children()->visible() as $section):?>
      <?php if ($section->home()->value() === 'true'):?>
      <section class="spotlight style1 orient-<?= intval($i%2) == 0 ? 'right' : 'left' ?> content-align-left image-position-center onscroll-image-fade-in onscroll-content-fade-<?= intval($i%2) == 0 ? 'right' : 'left' ?>" id="<?= $section->slug() ?>">        
        <div class="content">
          <div class="anchor" name="<?= $section->slug() ?>"></div>
          <h2><?= $section->title() ?></h2>
          <p class="text-light align-left"><?= $section->intro() ?></p>
          <ul class="actions special">
            <li><a href="/<?= $section->slug() ?>" class="button primary"> Conocer más </a></li>
          </ul>
          <div class="tail" name="<?= $section->slug() ?>"></div>
        </div>
        <div class="image" style="<?= $section->style()->value() ?: '' ?>">
          <?php if($section->files()->first()):?>
          <img src="<?= $section->files()->first()->url()?>" alt="" />
          <?php endif;?>
        </div>        
      </section>
    <?php $i++;  endif;?>
    <?php endforeach;?>
  </div>

<?php snippet('footer') ?>
