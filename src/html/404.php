<?php
  include('../private/functions.php');
  $page = $_SERVER['REQUEST_URI'];
  switch($page) {
      case('/contacts.php'): moved_to('/');
      case('/seaport-e.php'): moved_to('/contracts/seaport-e');
      case('/seaport-e-functional-capabilities.php'): moved_to('/contracts/seaport-e');
      case('/seaport-e-team-members.php'): moved_to('/contracts/seaport-e');
      case('/seaport-e-quality-assurance-program.php'): moved_to('/contracts/seaport-e');
      case('/seaport-e-contacts.php'): moved_to('/contracts/seaport-e');
      case('/seaport-e-task-orders.php'): moved_to('/contracts/seaport-e');
      case('/seaport-e.php'): moved_to('/contracts/seaport-e');
      case('/solutions.php'): moved_to('/what-we-do');
      case('/pro-tech-services.php'): moved_to('/what-we-do');
      case('/eng-it-services.php'): moved_to('/what-we-do');
      case('/enterprise-services.php'): moved_to('/what-we-do');
      case('/admin/'): moved_to('/admin/index.php');
      default:
        DEFINE("PAGETITLE", "File Not Found");
        DEFINE("PAGEAREA","error");
        include('../private/header.php');
  ?>
   <div class="hero error">
     <p class="hero-message text-center">Error 404</p>
   </div>
    <main>
      <div class="wrap">
        <h1>File Not Found</h1>
        <p>Sorry, the link your searching for does not exists on our server. Check you link and try again or return to the <a href="/">Homepage</a></p>
      </div>
    </main>
<?php
  include('../private/footer.php');
  }
?>
