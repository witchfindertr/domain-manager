<?php
		require_once "_conf.php";

		if (isset($_POST['domain_link'])){
						
						$domain_link      =	strip_tags($_POST['domain_link']);
						$domain_ext 		  =	strip_tags($_POST['domain_ext']);
						$domain_company		=	strip_tags($_POST['domain_company']);
						$domain_status		=	'1'; //Aktif Domain
						

			/* Kontrol Boş Gönderimleri Engellemek */
			if (
					( $domain_link     == '' ) or 
					( $domain_ext      == '' ) or 
					( $domain_company  == '' )
				){  
					header("Location:forms.php?alert=1");
					die; 
				 }
			/* Kontrol Boş Gönderimleri Engellemek */

			/* Kayıtları DB Ekleme */
			$register = $db->query("INSERT INTO domain_list (
                        																domain_link,
                        																domain_ext,
                        																domain_company,
                        																domain_status
                        															
                        															) VALUES (
                        															
                        																'$domain_link',
                        																'$domain_ext',
                        																'$domain_company',
                        																'$domain_status'

                                                                                    )");
			if ($register){
        header("Location:forms.php?alert=2");
				die;
			}
			/* Kayıtları DB Ekleme */



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
          <li class='title'>Add Domain</li>
        </ul>
        <div id='toolbar'>
          
        </div>
      </section>
      <!-- Content -->
      <div id='content'>
        <div class='panel panel-default'>
          <div class='panel-heading'>
            <i class='icon-edit icon-large'></i>
            Add Domain Form
          </div>
          <div class='panel-body'>
            <form method="POST">
              <fieldset>
                <div class='form-group'>
                  <label class='control-label'>Domain Name (e.g google.com)</label>
                  <input class='form-control' placeholder='google.com' type='text' name='domain_link'>
                </div>
                <div class='form-group'>
                  <label class='control-label'>Domain Extension</label>
                  <select class='form-control' name='domain_ext'>
                    <option value = '.com'>.com</option>
                    <option value = '.net'>.net</option>
                    <option value = '.org'>.org</option>
                    <option value = '.info'>.info</option>
                    <option value = '.biz'>.biz</option>
                    <option value = 'other'>other (No Api)</option>
                  </select>
                </div>
                <div class='form-group'>
                  <label class='control-label'>Registered Company</label>
                  <select class='form-control' name='domain_company'>
                    <option value = 'Name.com'>Name.com</option>
                    <option value = 'Godaddy.com'>Godaddy.com</option>
                    <option value = 'Natro.com'>Natro.com</option>
                  </select>
                </div>
                <div class='form-actions'>
                  <button class='btn btn-default' type='submit'>Submit</button>
                </div>  
                </div>
              </fieldset>
            </form>
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
