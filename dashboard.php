<?php require_once "_conf.php"; ?>
<!DOCTYPE html>
<html class='no-js' lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title><?php echo $_title; ?>Dashboard</title>
    <meta content='' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link href="assets/stylesheets/application-a07755f5.css"                            rel="stylesheet"  type="text/css"   />
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css"  rel="stylesheet"  type="text/css"   />
    <link href="assets/images/favicon.ico"                                              rel="icon"        type="image/ico"  />
    
  </head>
  <body class='main page'>
    <!-- Navbar -->
    <div class='navbar navbar-default' id='navbar'>
      <a class='navbar-brand' href='<?php echo $_link; ?>'>Domain Manager</a>
      <ul class='nav navbar-nav pull-right'>
        <li class='dropdown user'>
          <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
            <i class='icon-user'></i>
            <strong>A.Çetinkaya</strong>
            <img class="img-rounded" src="http://placehold.it/20x20/ccc/777" />
            <b class='caret'></b>
          </a>
          <ul class='dropdown-menu'>
            <li><a href='#'>Edit Profile</a></li>
            <li class='divider'></li>
            <li><a href="/">Sign out</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div id='wrapper'>
      <!-- Sidebar -->
      <section id='sidebar'>
        <i class='icon-align-justify icon-large' id='toggle'></i>
        <ul id='dock'>
          <li class='active launcher'>
            <i class='icon-dashboard'></i>
            <a href="dashboard.php">Dashboard</a>
          </li>
          <li class='launcher'>
            <i class='icon-file-text-alt'></i>
            <a href="forms.php">Add Domain</a>
          </li>
          <li class='launcher'>
            <i class='icon-table'></i>
            <a href="tables.php">Tables</a>
          </li>
          <li class='launcher'>
            <i class='icon-bug'></i>
            <a href='#'>Feedback</a>
          </li>
        </ul>
      </section>
      <!-- Tools -->
      <section id='tools'>
        <ul class='breadcrumb' id='breadcrumb'>
          <li class='title'>Dashboard Page</li>
        </ul>
      </section>
      <!-- Content -->
      <div id='content'>
        <div class='panel panel-default'>
          <div class='panel-heading'>
            Hello World :)
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <!-- Javascripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js" type="text/javascript"></script>
    <script src="assets/javascripts/application-985b892b.js" type="text/javascript"></script>
  </body>
</html>
