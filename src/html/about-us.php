<?php

  include('../private/functions.php');
  if($_SERVER['REQUEST_URI'] === '/about-us.php') { moved_to('/about-us'); }
  define("PAGETITLE", "About Us");
  define("PAGEAREA", "about-us");
  include('../private/header.php');
?>

<!--
         <div class="hero about-us">

         </div>
-->
          <main>
            <div class="wrap">
              <div class="row">
                <div class="small-12 columns">
                  <h1>About us</h1>
                  <hr>
                </div>
              </div>
              <div class="row">
                <div class="medium-12 large-6 columns">
                  <h2>Mission</h2>
                  <p>Building strategic, responsive, reliable information systems by employing highly talented professionals who use cutting edge information technology methodologies and tools to deliver most efficient and effective solutions to our government and industry clients.</p>
                  <h2>Vision</h2>
                  <p>Our leadership team combines years of experience supporting enterprise, cloud and functional IT requirements for multiple Combatant Commands, Federal Agencies and Theaters in support of support of some of our Nation's most important missions, both domestic and internation. As a small business we are able to quickly re-position and customize team structures to support current and future requirements an mission or business dictates.</p>
                  <!--h3>Locations with Contracts</h3>
                  <img src="assets/img/map-contract-locations.png" alt="Map of states with contracts : Colorado, Nebraska, Missouri, Michigan, West Virginia, Maryland, North Carolina, and Georgia"-->
                  <h2>Certifications</h2>
                    <a href="contents/ISO_Certificate_05-16.pdf" target="_blank"><img src="assets/img/iso-9001-2008.png" alt="ISO 9001:2008 Certification" class="cert"></a>
                    <a href="https://www.vip.vetbiz.gov/Public/Search/ViewSearchResults.aspx?SCID=3133007" target="_blank"><img src="assets/img/sdvosb.png" alt="SDVOSB Certification" class="cert"></a>
                   <p>DCAA has determined that the Choisys’ accounting system design complies with the criteria contained in FAR 53.209-1(f), Standard Form 1408 (SF 1408)</p>
                </div>
                <div class="medium-12 large-5 large-offset-1 columns">
                  <h2>Clients</h2>
                  <p><strong>MEDICAL IT SERVICES</strong>
                  <ul>
                    <li>Naval Hospital</li>
                    <li>Defense Centers of Excellence</li>
                  </ul>
                  </p>
                  <p><strong>EDUCATIONAL IT SERVICES</strong>
                  <ul>
                    <li>Army TRADOC</li>
                    <li>Air Force Academy</li>
                  </ul>
                  </p>
                  <p><strong>GOVERNMENT IT SERVICES</strong>
                  <ul>
                    <li>Air Force Reserve Command</li>
                    <li>Defense Manpower Data Center</li>
                    <li>Defense Security Service</li>
                    <li>US Coast Guard</li>
                  </ul>
                  </p>
                  <p>&nbsp;</p>
                  <div class="callout secondary">
                   <p><strong>Facility Security Clearance</strong>: Top Secret</p>
                   <p><strong>Primary NAICS</strong>: 541512</p>
                  </div>
                </div>
              </div>
            </div>
          </main>
<?php include('../private/footer.php'); ?>
