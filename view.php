<?php
		
    require_once "_conf.php";
    if ( isset($_GET['id']) and !empty($_GET['id']) ){ 
        
        $domain_id  =   strip_tags($_GET['id']);
        $row        =   $db->get_row("SELECT * FROM domain_list Where domain_status = '1' and domain_id = '$domain_id' LIMIT 1");
        
        if ( $db->num_rows != '1'){
                                    header("Location:tables.php?alert=5");
                                    die;
        }
        

    }else{

      header("Location:tables.php?alert=4");
      die;
    }


?>
<!DOCTYPE html>
<html class='no-js' lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title><?php echo $_title; ?>Add Domain</title>
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
          <li class='active launcher'>
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
          <li class='title'>Domain View Page</li>
        </ul>
        <div id='toolbar'>
          
        </div>
      </section>
      <!-- Content -->
      <div id='content'>
        <div class='panel panel-default'>
          <div class='panel-heading'>
            <i class='icon-edit icon-large'></i>
            Domain View 
          </div>
          <div class='panel-body'>
            <div class='form-actions' style="float:right;">
                  <a href="<?php echo $_link.'delete.php?id='.$row->domain_id;?>"><button class='btn btn-default' type='button'>Domain Delete</button></a>
                </div>
            <form method="POST" action="update.php">
              <fieldset>
                
                <?php if ($row->domain_ext != 'other'){ ?>
                <div class='form-actions'>
                  <a href="<?php echo $_link.'api.php?id='.$row->domain_id;?>"><button class='btn btn-default' type='button'>Get Update Information</button></a> - <?php echo date('d.m.Y H:i:s',$row->domain_update_date);?>
                </div>
                <?php } ?>
                <div style="margin-top:15px;">
                </div>
                <div class='form-group'>
                  <label class='control-label' style="color:Red;">Expiration Date</label>
                  <input class='form-control' placeholder='' type='text' name='domain_expiration_date' value="<?php echo date('d.m.Y',$row->domain_expiration_date);?>">
                </div>
                <div class='form-group'>
                  <label class='control-label'>Creation Date</label>
                  <input class='form-control' placeholder='' type='text' name='domain_creation_date' value="<?php echo date('d.m.Y',$row->domain_creation_date);?>">
                </div>
                <div class='form-group'>
                  <label class='control-label'>Domain Name (e.g google.com)</label>
                  <input class='form-control' placeholder='google' type='text' name='domain_link' value="<?php echo $row->domain_link;?>">
                </div>
                <div class='form-group'>
                  <label class='control-label'>Registered Company</label>
                  <input class='form-control' placeholder='' type='text' name='domain_company' value="<?php echo $row->domain_company;?>">
                </div>
                
                <?php if (isset ($row->domain_ns1) and !empty($row->domain_ns1) or ($row->domain_ext == 'other') ){ ?>
                <div class='form-group'>
                  <label class='control-label'>Domain Name Server 1</label>
                  <input class='form-control' placeholder='' type='text' name='domain_ns1' value="<?php echo $row->domain_ns1;?>">
                </div>
                <?php } ?>
                <?php if (isset ($row->domain_ns2) and !empty($row->domain_ns2) or ($row->domain_ext == 'other') ){ ?>
                <div class='form-group'>
                  <label class='control-label'>Domain Name Server 2</label>
                  <input class='form-control' placeholder='' type='text' name='domain_ns2' value="<?php echo $row->domain_ns2;?>">
                </div>
                <?php } ?>
                <?php if (isset ($row->domain_ns3) and !empty($row->domain_ns3) or ($row->domain_ext == 'other') ){ ?>
                <div class='form-group'>
                  <label class='control-label'>Domain Name Server 3</label>
                  <input class='form-control' placeholder='' type='text' name='domain_ns3' value="<?php echo $row->domain_ns3;?>">
                </div>
                <?php } ?>
                <?php if (isset ($row->domain_ip1) and !empty($row->domain_ip1) ){ ?>
                <div class='form-group'>
                  <label class='control-label'>Domain Name Server IP 1</label>
                  <input class='form-control' placeholder='' type='text' name='domain_ip1' value="<?php echo $row->domain_ip1;?>">
                </div>
                <?php } ?>
                <?php if (isset ($row->domain_ip2) and !empty($row->domain_ip2) ){ ?>
                <div class='form-group'>
                  <label class='control-label'>Domain Name Server IP 2</label>
                  <input class='form-control' placeholder='' type='text' name='domain_ip2' value="<?php echo $row->domain_ip2;?>">
                </div>
                <?php } ?>
                <?php if (isset ($row->domain_ip3) and !empty($row->domain_ip3) ){ ?>
                <div class='form-group'>
                  <label class='control-label'>Domain Name Server IP 3</label>
                  <input class='form-control' placeholder='' type='text' name='domain_ip3' value="<?php echo $row->domain_ip3;?>">
                </div>
                <?php } ?>
                <?php if ($row->domain_ext == 'other'){ ?>
                <div class='form-actions'>
                  <button class='btn btn-default' type='submit'>Manuel Update</button>
                </div>
                <?php } ?>
                <div class='form-group'>
                  <input class='form-control' placeholder='' type='hidden' name='domain_id' value="<?php echo $row->domain_id;?>">
                </div>
               </form> 
                </div>
              </fieldset>
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
