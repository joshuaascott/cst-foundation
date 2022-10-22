<?php
  include('../private/functions.php');
  if($_SERVER['REQUEST_URI'] === '/contracts.php') { moved_to('/contracts'); }
  define("PAGETITLE", "Contracts");
  define("PAGEAREA", "contracts");
  include('../private/header.php');
?>
<!--
          <div class="hero contracts">

          </div>
-->
           <main>
            <div class="wrap">
              <div class="row columns">
                <h1>Contracts</h1>
                <hr>
              </div>
              <div class="row">
                <div class="large-8 columns">
                  <p>At Choisys, we develop forward-thinking solutions to address the continuity of sustainable business, and bolster these solutions with our emphasis on process, people and the product of customer service.  The resultant outcome is the achievement of growth and the augmentation of our customer base as is denoted in the representative sampling of our contracts below.</p>
                </div>
                <div class="large-4 columns">
                    <h2>Point of Contact</h2>
                    <p><strong>James Barnes</strong><br>
                    VP, Operations<br>
                    571-458-7400, ext. 101</p>
                    <a href="/contact-us?category=contracts" class="large primary button"><i class="fi-comments large"></i> Contact us</a>
                </div>
              </div>
              <div class="row">
                <div class="small-12 columns">
                  <h2>Prime Contract Vehicles</h2>
                  <table class="contracts-list">
                  <tr>
                    <th width="65%">Contract</th>
                    <th class="show-for-medium">Available to</th>
                  </tr>
                  <tr>
                    <td><a href="/contracts/seaport-e">Navy SeaPort-enhanced (SeaPort-e)</a></td>
                    <td class="show-for-medium">U.S. Navy</td>
                  </tr>
                  </table><br>

                  <h2>Teaming Contract Vehicles</h2>
                  <table class="contracts-list">
                  <tr>
                    <th width="65%">Contract Vehicle</th>
                    <th class="show-for-medium">Available to</th>
                  </tr>
                  <tr>
                    <td>Army ITES-2S</td>
                    <td class="show-for-medium">U.S. Army</td>
                  </tr>
                  <tr>
                    <td>AF NETCENTS</td>
                    <td class="show-for-medium">U.S. Air Force</td>
                  </tr>
                  <tr>
                    <td>GSA Alliant</td>
                    <td class="show-for-medium">All Federal Agencies</td>
                  </tr>
                  <tr>
                    <td>NIH CIO-SP3</td>
                    <td class="show-for-medium">All Federal Agencies</td>
                  </tr>
                  </table>
                  <br>
                  <div class="callout secondary">
                  <h2>Prime Contracts</h2>
                  <ul>
                    <li>Lifelong Learning Center (LLC)</li>
                    <li>Camp Lejeune Naval Hospital</li>
                  </ul>
                  </div>
                </div>
              </div>
            </div>
          </main>
<?php include('../private/footer.php'); ?>
