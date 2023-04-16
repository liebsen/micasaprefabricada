<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php snippet('pagetitle') ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <meta name="description" content="<?= $site->text() ?>"/>
  <meta property="og:type" content="<?= $site->ogtype() ?>" />
  <meta property="og:title" content="<?= $site->ogtitle() ?>" />
  <meta property="og:description" content="<?= $site->ogdescription() ?>" />
  <meta property="og:image" itemprop="image primaryImageOfPage" content="<?= $site->ogimage()->toFile()->url() ?>" />
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="<?= $site->themecolor() ?>" />
  <meta name="theme-color" content="<?= $site->themecolor() ?>" />
  <link href="https://fonts.googleapis.com/css?family=<?= $site->fontfamily() ?: '' ?>:<?= $site->fontweight() ?: '' ?>" rel="stylesheet">

  <link rel="shortcut icon" type="image/png" href="<?= $site->favicon()->toFile()->url() ?>" />
  <link rel="stylesheet" href="/assets/css/main.css" />
  <link rel="stylesheet" href="/assets/css/site.css" />
  <link rel="stylesheet" href="/assets/css/animation.css" />
  <link rel="stylesheet" href="/assets/css/swiffy-slider.min.css" />
  <noscript><link rel="stylesheet" href="as/sets/css/noscript.css" /></noscript>


  <style>
    :root {
      --theme-dark-color: <?= $site->themebackground() ?: '' ?>;
      --theme-color: <?= $site->themecolor() ?: '' ?>;
    }
    body {
      font-family: '<?= $site->fontfamily() ?: '' ?>', -apple-system,system-ui,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',sans-serif;
    }
  </style>
  <?php if($site->googleanalytics()->value()): ?>
    <?php snippet('googleanalytics') ?>
  <?php endif ?>
</head>
<body class="is-preload">
  <div id="loader" style="<?= $site->styleloader()->value() ? : '' ?>">
    <div class="loader-background">
      <div class="loader-container" style="background-image: url('<?= $site->backgroundloader()->value() ? $site->backgroundloader()->toFile()->url() : ''; ?>')">
      </div>
    </div>
  </div>
  <div class="overlay" style="<?= $site->stylemenu()->value() ? : '' ?>">
    <div class="overlay-content" style="background-image: url(<?= $site->backgroundmenu()->value() ? $site->backgroundmenu()->toFile()->url() : '' ; ?>)">
      <a class="close toggle-menu">
        <img class="is-clickable" src="/assets/images/vector-29@2x.svg" width="30" />
      </a>
      <a href="/">
        <img class="logo fadeIn delay" src="<?= $site->logomenu()->value() ? $site->logomenu()->toFile()->url() : '' ?>" width="280" />
      </a>
      <?php foreach($site->children()->visible() as $section):?>
      <?php if ($section->header()->value() === 'true'):?>
      <a class="fadeIn" href="/<?= $section->slug() ?>">
        <?= $section->title() ?>
      </a>
      <?php endif;?>
      <?php endforeach;?>      
    </div>
  </div>
  <div class="header">
    <div class="align-left">
      <a href="<?= $page->slug() !== 'home' ? '/' : '#home' ?>">
        <img class="logo" src="<?= $site->logo()->value() ? $site->logo()->toFile()->url() : '' ?>" width="200" />
      </a>
    </div>
    <div class="align-right">
      <img class="toggle-menu is-clickable" src="/assets/images/vector-20@2x.svg" width="30"/>
    </div>    
  </div>