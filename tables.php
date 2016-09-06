<?php

    require_once "_conf.php";
    $results    = $db->get_results("SELECT * FROM domain_list Where domain_status = '1' ");
                                                                                    

?>
<!DOCTYPE html>
<html class='no-js' lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title><?php echo $_title; ?>Domain Lists</title>
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
          <li class='launcher'>
            <i class='icon-dashboard'></i>
            <a href="dashboard.php">Dashboard</a>
          </li>
          <li class='launcher'>
            <i class='icon-file-text-alt'></i>
            <a href="forms.php">Add Domain</a>
          </li>
          <li class='active launcher'>
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
          <li class='title'>Domain Lists Page</li>
        </ul>
      </section>
      <!-- Content -->
      <div id='content'>
        <div class='panel panel-default grid'>
          <div class='panel-heading'>
            <i class='icon-table icon-large'></i>
            Domain Lists
          </div>
          <!--
          <div class='panel-body filters'>
            <div class='row'>
              <div class='col-md-3'>
                <div class='input-group'>
                  <input class='form-control' placeholder='Arama...' type='text'>
                  <span class='input-group-btn'>
                    <button class='btn' type='button'>
                      <i class='icon-search'></i>
                    </button>
                  </span>
                </div>
              </div>
            </div>
          </div>-->
          <table class='table'>
            <thead>
              <tr>
                <th>#</th>
                <th>Domain Name</th>
                <th>Extension</th>
                <th>Creation Date</th>
                <th>Registered Company</th>
                <th class='actions'>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php
                foreach ( $results as $db_rows ){
            ?>
              <tr class='success'>
                <td><?php echo $db_rows->domain_id;?></td>
                <td><?php echo $db_rows->domain_link.$db_rows->domain_ext;?></td>
                <td><?php echo $db_rows->domain_ext;?></td>
                <td><?php echo date('d/m/Y',$db_rows->domain_creation);?></td>
                <td><?php echo $db_rows->domain_company;?></td>
                <td class='action'>
                  <a class='btn btn-info' href='#'>
                    <i class='icon-edit'></i>
                  </a>
                  <a class='btn btn-danger' href='#'>
                    <i class='icon-trash'></i>
                  </a>
                </td>
              </tr>
              <?php } ?>
              
             
             
              
            </tbody>
          </table>
          <!--<div class='panel-footer'>
            <ul class='pagination pagination-sm'>
              <li>
                <a href='#'>«</a>
              </li>
              <li class='active'>
                <a href='#'>1</a>
              </li>
              <li>
                <a href='#'>2</a>
              </li>
              <li>
                <a href='#'>3</a>
              </li>
              <li>
                <a href='#'>4</a>
              </li>
              <li>
                <a href='#'>5</a>
              </li>
              <li>
                <a href='#'>6</a>
              </li>
              <li>
                <a href='#'>7</a>
              </li>
              <li>
                <a href='#'>8</a>
              </li>
              <li>
                <a href='#'>»</a>
              </li>
            </ul>
            <div class='pull-right'> Showing 1 to 5 of 5 entries </div>
          </div>-->

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
