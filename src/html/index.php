<?php
  include('../private/functions.php');
  if($_SERVER['REQUEST_URI'] === '/index.php') { moved_to('/'); }
  define("PAGETITLE","Choisys Technology Home Page");
  define("PAGEAREA", "home");
  include('../private/header.php');
?>
      <div class="hero home">
       <div class="wrap">
         <h1 class="hide">Choisys Technology Homepage</h1>
          <p class="hero-message text-center">Think Beyond</p>
        </div>
      </div>
      <main>
        <div class="wrap">
          <div class="row columns">
            <h2>Who we are</h2>
          </div>
          <div class="row">
            <div class="large-8 columns">
              <p>Choisys Technology Inc. is an ISO 9001 certified and VA certified Service Disabled Veteran Owned Small Business (SDVOSB) Information Technology services provider located outside our nation's capital and in the epicenter of the Government IT industry.</p>
              <p>We are an information technology infrastructure services provider with offerings in:  Systems Engineering, Network Infrastructure Engineering, Video Teleconference Solutions Engineering, and Program Management.  Our proficiencies are Medical IT Services, Educational IT Services and Government IT Services.</p>
            </div>
            <div class="large-4 columns">
              <a href="/about-us" class="large dark-green expanded button"><i class="fi-star large"></i>  Learn More</a>
            </div>
          </div>
        </div>
      </main>
<?php include('../private/footer.php'); ?>
