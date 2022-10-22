        </div>
        <footer>
          <div class="wrap">
           <div class="row">
           <div class="medium-8 large-5 columns">
               <p>Contact &nbsp;<i class="fi-comments large hide-for-small-only"></i></p>
                <hr>
                 <a href="tel:555-000-0000">(571) 458-7400</a>
                 <a href="/contact-us?category=info">info@choisystechnology.com</a>
                 <a data-open="revealMap">722 East Market St. Suite # 103<br>Leesburg, VA 20176</a>
                 <div class="reveal" id="revealMap" data-reveal>
                   <p><strong>Choisys Technology</strong></p>
                   <p>722 East Market Street,<br> Suite # 103, <br>Leesburg, VA 20176</p>
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3095.99445760725!2d-77.54922288433174!3d39.10659634219009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b63d7629212997%3A0x6209b55c8b32213e!2s722+E+Market+St%2C+Leesburg%2C+VA+20176!5e0!3m2!1sen!2sus!4v1463406317919" width="90%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                   <button class="close-button" data-close aria-label="Close modal" type="button">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
             </div>
             <div class="small-5 medium-4 large-3 columns">
               <p>Site Map &nbsp;<i class="fi-compass large hide-for-small-only"></i></p>
                <hr>
                 <a href="/about-us">About us</a>
                 <a href="/what-we-do">What we do</a>
                 <a href="/contracts">Contracts</a>
                 <a href="/careers">Careers</a>
                 <a href="/contact-us">Contact us</a>
             </div>
             <div class="small-7 medium-12 large-4 columns">
               <p>Certifications &nbsp;<i class="fi-star large hide-for-small-only"></i></p>
                 <hr>
                 <a href="/contents/ISO_Certificate_05-16.pdf" target="_blank">ISO 9001:2008</a>
                 <a href="https://www.vip.vetbiz.gov/Public/Search/ViewSearchResults.aspx?SCID=3133007" target="_blank"><span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" title="Service Disabled Veteran Owned Small Business">SDVOSB</span></a>
             </div>
           </div>
          </div>
        </footer>
      </div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="/assets/js/app.js"></script>
  </body>
</html>
<?php
  if(isset($connection)) {
    mysqli_close($connection);
  }
?>
