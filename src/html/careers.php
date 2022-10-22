<?php
  include('../private/functions.php');
  if($_SERVER['REQUEST_URI'] === '/careers.php') { moved_to('/careers'); }
  define("PAGETITLE", "Careers");
  define("PAGEAREA", "careers");
  include('../private/header.php');
?>
<!--
          <div class="hero careers">
          </div>
-->
          <main ng-app="cstApp" ng-controller="jobsCtrl">
            <div class="wrap">
              <div class="row">
                <div class="small-12 columns">
                  <h1>Careers</h1>
                  <hr>
                </div>
              </div>
              <div class="row">
                <div class="medium-8 columns">
                  <p>When you are ready to ignite your career and augment your potential, Choisys is your solution.  With us, our employees are our most valuable resource and the nucleus of everything that we do to support vital missions and service clients nationwide.  We acknowledge that a career is a significant pursuit and you have given this serious consideration.  When you are ready to fuel your future and unite with a team that is diverse, collaborative and dedicated to what we do, simply click on the button below.  Come join us!</p>
                </div>
                <div class="medium-4 columns">
                <h2>EEO</h2>
                <p>Choisys Technology is an equal employment opportunity (EEO) employer.</p>
                </div>
              </div>
              <div class="row columns">
                <h2>Current Openings</h2>
                <span ng-show="(title) || (location.combined) || (clearance)">
                 <i class="fi-filter large"></i> = Filters applied
                 <span class="label secondary" ng-show="title" ng-click="title=removeFilter()">Job Title &nbsp;&times;</span>
                 <span class="label secondary" ng-show="location.combined" ng-click="location.combined=removeFilter()">Location &nbsp;&times;</span>
                 <span class="label secondary" ng-show="clearance" ng-click="clearance=removeFilter()">Clearance &nbsp;&times;</span>
                 <span class="label secondary" ng-show="(title) || (location.combined) || (clearance)" ng-click="clearance=removeFilter(); location.combined=removeFilter(); title=removeFilter();">Remove All Filters  &nbsp;&times;</span>
                </span>
                <table class="stacked">
                  <tr>
                    <td><label for="title" class="show-for-sr">Job Title</label><input type="text" name="title" id="title" placeholder="Job Title" ng-model="title"/></td>
                    <td class="show-for-medium"><label for="location" class="show-for-sr">Location</label><input type="text" name="location" id="location" placeholder="City or State" ng-model="location.combined"/></td>
                    <td class="show-for-large"><label for="clearance" class="show-for-sr">Clearance</label><input type="text" name="clearance" id="clearance" placeholder="Clearance" ng-model="clearance"/></td>
                  </tr>
                  <tr>
                    <th><span class="sort" ng-click="reSort('title')">Job Title <i class="fi-arrow-down" ng-show="sortOrder === 'title'"></i></span> <i class="fi-filter" ng-show="title"></i> </th>
                    <th class="show-for-medium"><span class="sort" ng-click="reSort(['location.state','location.city'])">Location  <i class="fi-arrow-down" ng-show="sortOrder === 'location.combined'"></i></span> <i class="fi-filter" ng-show="location.combined"></i> </th>
                    <th class="show-for-large"><span class="sort" ng-click="reSort('clearance')">Clearance <i class="fi-arrow-down" ng-show="sortOrder === 'clearance'"></i></span> <i class="fi-filter" ng-show="clearance"></i> </th>
                  </tr>
                  <tr ng-repeat="j in filteredJobs = (jobs | filter:{title:title, location:location, clearance:clearance} | orderBy:sortOrder)" class="ng-cloak">
                    <td><a ng-href="/careers/{{ j.jobid }}">{{ j.title }}</a>
                    <br class="show-for-small-only"><span class="loc show-for-small-only">{{ j.location.city + &quot;, &quot; + j.location.state }}</span></td>
                    <td class="show-for-medium">{{ j.location.city + &quot;, &quot; + j.location.state }}</td>
                    <td class="show-for-large">{{ j.clearance }}</td>
                  </tr>
                  <tr ng-hide="filteredJobs.length"><td colspan="3">No jobs found.</td></tr>
                </table>
              </div>
            </div>
          </main>
<?php include('../private/footer.php'); ?>
