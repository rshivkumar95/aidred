<?php
if($_SESSION["loggedIn"]==0){

?>



        
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="dregister.php">DONOR</a></li>
              <li><a href="bbregister.php">BANK</a></li>
              <li><a href="brequest.php">BLOOD REQUEST</a></li>
              <li><a href="event_regi.php">EVENT</a></li>
</ul>
<ul id="dropdown2" class="dropdown-content">
  <li><a href="dsearch.php">DONOR</a></li>
              <li><a href="banksearch.php">BLOOD BANK</a></li>
              <li><a href="requestsearch.php">BLOOD REQUEST</a></li>
              <li><a href="search_event.php">EVENT</a></li>
</ul>
<ul id="dropdown3" class="dropdown-content">
  
               <li><a href="bankstocksearch.php">BLOOD STOCK</a></li>
              <li><a href="donorreport.php">DONORS</a></li>
              <li><a href="whw.php">DONATION</a></li>
              <li><a href="wtw.php">TAKEN</a></li>
              
</ul>
<nav class="red darken-2 z-depth-2">
  <div class="nav-wrapper container"> 
   <a href="index.php" class="brand-logo">AidRed</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
      <li><a href="index.php">HOME</a></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown2">SEARCH<i class="material-icons right">arrow_drop_down</i></a></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">REGISTRATION<i class="material-icons right">arrow_drop_down</i></a></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown3">REPORTS<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a href="facts.php">FACTS</a></li>
        <li><a href="developers.php">DEVELOPERS</a></li>

        <li><a href="login.php">LOGIN</a></li>
    </ul>
    <ul class="side-nav" id="mobile-demo">
        <li><a href="#">HOME</a></li>
            <li class="no-padding">
                     <ul class="collapsible collapsible-accordion">
                    <li>
                      <a class="collapsible-header">SEARCH<i class="mdi-navigation-arrow-drop-down"></i></a>
                      <div class="collapsible-body">
                        <ul>
                          <li><a href="dsearch.php">DONOR</a></li>
              <li><a href="banksearch.php">BLOOD BANK</a></li>
              <li><a href="requestsearch.php">BLOOD REQUEST</a></li>
              <li><a href="search_event.php">EVENT</a></li>
                        </ul>
                      </div>
                    </li>
                  </ul>



      </li>
      <li class="no-padding">
                     <ul class="collapsible collapsible-accordion">
                    <li>
                      <a class="collapsible-header">REGISTRATION<i class="mdi-navigation-arrow-drop-down"></i></a>
                      <div class="collapsible-body">
                        <ul>
                          <li><a href="dregister.php">DONOR</a></li>
              <li><a href="bbregister.php">BLOOD BANK</a></li>
              <li><a href="brequest.php">BLOOD REQUEST</a></li>
              <li><a href="event_regi.php">EVENT</a></li>
                        </ul>
                      </div>
                    </li>
                  </ul>



      </li>
        <li><a href="facts.php">FACTS</a></li>
        <li><a href="developers.php">DEVELOPERS</a></li>
        <li><a href="login.php">LOGIN</a></li>
    </ul>
  </div>
</nav>
<?php
}
else
{
?>

        
<!-- Dropdown Structure -->

<ul id="dropdown2" class="dropdown-content">
  <li><a href="dsearch.php">DONOR</a></li>
              <li><a href="banksearch.php">BANK</a></li>
              <li><a href="requestsearch.php">BLOOD REQUEST</a></li>
              <li><a href="search_event.php">EVENT</a></li>
</ul>
</ul>
<ul id="dropdown3" class="dropdown-content">
  <li><a href="bankstocksearch.php">BLOOD STOCK</a></li>
              <li><a href="donorreport.php">DONORS</a></li>
              <li><a href="whw.php">DONATION</a></li>
              <li><a href="wtw.php">TAKEN</a></li>
              
</ul>
<nav class="red darken-2 z-depth-2">
  <div class="nav-wrapper container"> 
   <a href="#!" class="brand-logo">AidRed</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
      <li><a href="dashboard.php">HOME</a></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown2">SEARCH<i class="material-icons right">arrow_drop_down</i></a></li>

      <li><a class="dropdown-button" href="#!" data-activates="dropdown3">REPORTS<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a href="facts.php">FACTS</a></li>
        <li><a href="developers.php">DEVELOPERS</a></li>
        <li><a href="logout.php">LOGOUT</a></li>
    </ul>
    <ul class="side-nav" id="mobile-demo">
        <li><a href="dashboard.php">HOME</a></li>
            <li class="no-padding">
                     <ul class="collapsible collapsible-accordion">
                    <li>
                      <a class="collapsible-header">SEARCH<i class="mdi-navigation-arrow-drop-down"></i></a>
                      <div class="collapsible-body">
                        <ul>
                          <li><a href="dsearch.php">DONOR</a></li>
              <li><a href="banksearch.php">BANK</a></li>
              <li><a href="requestsearch.php">BLOOD REQUEST</a></li>
              <li><a href="search_event.php">EVENT</a></li>
                        </ul>
                      </div>
                    </li>
                  </ul>



      </li>
        <li><a href="facts.php">FACTS</a></li>
        <li><a href="developers.php">DEVELOPERS</a></li>
        <li><a href="logout.php">LOGOUT</a></li>
    </ul>
  </div>
</nav>

<?php

}
?>

