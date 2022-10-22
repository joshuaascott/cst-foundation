<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(isset($admin)) { echo "<meta name=\"robots\" content=\"noindex,nofollow\"/>"; } ?>
    <meta name="robots" content="noindex,nofollow">
    <title><?php echo PAGETITLE; ?></title>
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" type="image/png" href="/assets/img/favicon.png">
  </head>
  <body>
    <div class="off-canvas-wrapper">
      <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
       <!-- Menu on Right -->
        <div class="off-canvas position-right" id="offCanvas" data-off-canvas data-position="right">
          <ul class="no-bullet nav">
            <!-- <li class="link-internal"><a href="#">Employee Portal &nbsp; <i class="fi-lock large"></i></a></li> -->
            <?php if(isset($admin)) { ?>
            <li><a href="/admin/"<?php if(PAGEAREA==='admin') { echo " class=\"current\""; } ?>>Admin Home</a></li>
            <?php } else { ?>
            <li><a href="/"<?php if(PAGEAREA==='home') { echo " class=\"current\""; } ?>>Home</a></li>
            <li><a href="/about-us"<?php if(PAGEAREA==='about-us') { echo " class=\"current\""; } ?>>About us</a></li>
            <li><a href="/what-we-do"<?php if(PAGEAREA==='what-we-do') { echo " class=\"current\""; } ?>>What we do</a></li>
            <li><a href="/contracts"<?php if(PAGEAREA==='contracts') { echo " class=\"current\""; } ?>>Contracts</a></li>
            <li><a href="/careers"<?php if(PAGEAREA==='careers') { echo " class=\"current\""; } ?>>Careers</a></li>
            <li><a href="/contact-us"<?php if(PAGEAREA==='contact-us') { echo " class=\"current\""; } ?>>Contact us</a></li>
            <?php } ?>
          </ul>
        </div>
        <!-- Content of Page -->
        <div class="off-canvas-content" data-off-canvas-content>
         <!-- Navigation Top Bar -->
         <div class="top-bar">
            <div class="wrap">
              <div class="top-bar-left">
                <span class="title-bar-title"><a href="/"><img src="/assets/img/logo.png" class="cst-logo" alt="Choisys Technology Logo"></a></span>
              </div>
              <div class="top-bar-right">
                  <ul class="menu show-for-large float-right nav">
                    <?php if(isset($admin)) { ?>
                    <li><a href="/admin/"<?php if(PAGEAREA==='admin') { echo " class=\"current\""; } ?>>Admin Home</a></li>
                    <?php } else { ?>
                    <li><a href="/about-us"<?php if(PAGEAREA==='about-us') { echo " class=\"current\""; } ?>>About us</a></li>
                    <li><a href="/what-we-do"<?php if(PAGEAREA==='what-we-do') { echo " class=\"current\""; } ?>>What we do</a></li>
                    <li><a href="/contracts"<?php if(PAGEAREA==='contracts') { echo " class=\"current\""; } ?>>Contracts</a></li>
                    <li><a href="/careers"<?php if(PAGEAREA==='careers') { echo " class=\"current\""; } ?>>Careers</a></li>
                    <li><a href="/contact-us"<?php if(PAGEAREA==='contact-us') { echo " class=\"current\""; } ?>>Contact us</a></li>
                    <!-- <li><a href="#">Employee Portal&nbsp;<i class="fi-lock large"></i></a></li> -->
                    <?php } ?>
                  </ul>
                  <button type="button" class="menu-icon float-right hide-for-large" data-open="offCanvas">
                    <span class="show-for-sr">Menu</span>
                  </button>
                </div>
            </div>
          </div>
