
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->benchmark->mark('code_start'); ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
		<title>{titulo}</title>

		<!-- Bootstrap -->

		{headerinc}
		<!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
		<!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- Hotjar Tracking Code for opiniaopop.com.br -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:513037,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>
	</head>
	<body>
		<div class="app app-default">
			<!---menu--->
			<div class="container-fluid">
				<aside class="app-sidebar" id="sidebar">
					<div class="sidebar-header">
						<a class="sidebar-brand" href="#"><span class="highlight">Opiniãopop</span> Admin</a>
						<button type="button" class="sidebar-toggle">
							<i class="fa fa-times"></i>
						</button>
					</div>
					<div class="sidebar-menu">
						<ul class="sidebar-nav">
							<li class="active">
								<a href="<?php echo base_url('dashborad/pesquisas'); ?>">
								<div class="icon">
									<i class="fa fa-tasks" aria-hidden="true"></i>
								</div>
								<div class="title">
									Pesquisas
								</div> </a>
							</li>
							<li class="@@menu.messaging">
								<a href="<?php echo base_url('dashboard/enquete'); ?>">
								<div class="icon">
									<i class="fa fa-comments" aria-hidden="true"></i>
								</div>
								<div class="title">
									Enquetes
								</div> </a>
							</li>
							<li class="dropdown ">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<div class="icon">
									<i class="fa fa-cube" aria-hidden="true"></i>
								</div>
								<div class="title">
									UI Kits
								</div> </a>
								<div class="dropdown-menu">
									<ul>
										<li class="section">
											<i class="fa fa-file-o" aria-hidden="true"></i> UI Kits
										</li>
										<li>
											<a href="./uikits/customize.html">Customize</a>
										</li>
										<li>
											<a href="./uikits/components.html">Components</a>
										</li>
										<li>
											<a href="./uikits/card.html">Card</a>
										</li>
										<li>
											<a href="./uikits/form.html">Form</a>
										</li>
										<li>
											<a href="./uikits/table.html">Table</a>
										</li>
										<li>
											<a href="./uikits/icons.html">Icons</a>
										</li>
										<li class="line"></li>
										<li class="section">
											<i class="fa fa-file-o" aria-hidden="true"></i> Advanced Components
										</li>
										<li>
											<a href="./uikits/pricing-table.html">Pricing Table</a>
										</li>
										<!-- <li><a href="./uikits/timeline.html">Timeline</a></li> -->
										<li>
											<a href="./uikits/chart.html">Chart</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<div class="icon">
									<i class="fa fa-file-o" aria-hidden="true"></i>
								</div>
								<div class="title">
									Pages
								</div> </a>
								<div class="dropdown-menu">
									<ul>
										<li class="section">
											<i class="fa fa-file-o" aria-hidden="true"></i> Admin
										</li>
										<li>
											<a href="./pages/form.html">Form</a>
										</li>
										<li>
											<a href="./pages/profile.html">Profile</a>
										</li>
										<li>
											<a href="./pages/search.html">Search</a>
										</li>
										<li class="line"></li>
										<li class="section">
											<i class="fa fa-file-o" aria-hidden="true"></i> Landing
										</li>
										<!-- <li><a href="./pages/landing.html">Landing</a></li> -->
										<li>
											<a href="./pages/login.html">Login</a>
										</li>
										<li>
											<a href="./pages/register.html">Register</a>
										</li>
										<!-- <li><a href="./pages/404.html">404</a></li> -->
									</ul>
								</div>
							</li>
						</ul>
					</div>
					
					<div class="sidebar-footer">
						<ul class="menu">
							<li>
								<a href="/" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-cogs" aria-hidden="true"></i> </a>
							</li>
							<li>
								<a href="#"><span class="flag-icon flag-icon-th flag-icon-squared"></span></a>
							</li>
						</ul>
					</div>
				</aside>
			</div>
			<!--- Conteudo---->
			<div class="app-container">
				
				<nav class="navbar navbar-default" id="navbar">
					<div class="container-fluid">
						<div class="navbar-collapse collapse in">
							<ul class="nav navbar-nav navbar-mobile">
								<li>
									<button type="button" class="sidebar-toggle">
										<i class="fa fa-bars"></i>
									</button>
								</li>
								<li class="logo">
									<a class="navbar-brand" href="#"><span class="highlight">Flat v3</span> Admin</a>
								</li>
								<li>
									<button type="button" class="navbar-toggle">
										<img class="profile-img" src="./assets/images/profile.png">
									</button>
								</li>
							</ul>
							<ul class="nav navbar-nav navbar-left">
								<li class="navbar-title">
									Dashboard
								</li>
								<li class="navbar-search hidden-sm">
									<input id="search" type="text" placeholder="Pesquisar..">
									<button class="btn-search">
										<i class="fa fa-search"></i>
									</button>
								</li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown notification">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<div class="icon">
										<i class="fa fa-shopping-basket" aria-hidden="true"></i>
									</div>
									<div class="title">
										New Orders
									</div>
									<div class="count">
										0
									</div> </a>
									<div class="dropdown-menu">
										<ul>
											<li class="dropdown-header">
												Ordering
											</li>
											<li class="dropdown-empty">
												No New Ordered
											</li>
											<li class="dropdown-footer">
												<a href="#">View All <i class="fa fa-angle-right" aria-hidden="true"></i></a>
											</li>
										</ul>
									</div>
								</li>
								<li class="dropdown notification warning">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<div class="icon">
										<i class="fa fa-comments" aria-hidden="true"></i>
									</div>
									<div class="title">
										Unread Messages
									</div>
									<div class="count">
										99
									</div> </a>
									<div class="dropdown-menu">
										<ul>
											<li class="dropdown-header">
												Message
											</li>
											<li>
												<a href="#"> <span class="badge badge-warning pull-right">10</span>
												<div class="message">
													<img class="profile" src="https://placehold.it/100x100">
													<div class="content">
														<div class="title">
															"Payment Confirmation.."
														</div>
														<div class="description">
															Alan Anderson
														</div>
													</div>
												</div> </a>
											</li>
											<li>
												<a href="#"> <span class="badge badge-warning pull-right">5</span>
												<div class="message">
													<img class="profile" src="https://placehold.it/100x100">
													<div class="content">
														<div class="title">
															"Hello World"
														</div>
														<div class="description">
															Marco  Harmon
														</div>
													</div>
												</div> </a>
											</li>
											<li>
												<a href="#"> <span class="badge badge-warning pull-right">2</span>
												<div class="message">
													<img class="profile" src="https://placehold.it/100x100">
													<div class="content">
														<div class="title">
															"Order Confirmation.."
														</div>
														<div class="description">
															Brenda Lawson
														</div>
													</div>
												</div> </a>
											</li>
											<li class="dropdown-footer">
												<a href="#">View All <i class="fa fa-angle-right" aria-hidden="true"></i></a>
											</li>
										</ul>
									</div>
								</li>
								<li class="dropdown notification danger">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<div class="icon">
										<i class="fa fa-bell" aria-hidden="true"></i>
									</div>
									<div class="title">
										System Notifications
									</div>
									<div class="count">
										10
									</div> </a>
									<div class="dropdown-menu">
										<ul>
											<li class="dropdown-header">
												Notification
											</li>
											<li>
												<a href="#"> <span class="badge badge-danger pull-right">8</span>
												<div class="message">
													<div class="content">
														<div class="title">
															New Order
														</div>
														<div class="description">
															$400 total
														</div>
													</div>
												</div> </a>
											</li>
											<li>
												<a href="#"> <span class="badge badge-danger pull-right">14</span> Inbox </a>
											</li>
											<li>
												<a href="#"> <span class="badge badge-danger pull-right">5</span> Issues Report </a>
											</li>
											<li class="dropdown-footer">
												<a href="#">View All <i class="fa fa-angle-right" aria-hidden="true"></i></a>
											</li>
										</ul>
									</div>
								</li>
								<li class="dropdown profile">
									<a href="/html/pages/profile.html" class="dropdown-toggle"  data-toggle="dropdown"> <img class="profile-img" src="./assets/images/profile.png">
									<div class="title">
										Profile
									</div> </a>
									<div class="dropdown-menu">
										<div class="profile-info">
											<h4 class="username"><?php echo $this->session->userdata('user_nome');  ?></h4>
										</div>
										<ul class="action">
											<li>
												<a href="<?php echo base_url('dashboard/usuario/conta') ?>"> Conta </a>
											</li>
											<li>
												<a href="#"> <span class="badge badge-danger pull-right">5</span> My Inbox </a>
											</li>
											<li>
												<a href="#"> Setting </a>
											</li>
											<li>
												<a href="<?php echo base_url('dashboard/autenticacao/logout') ?>"> Sair </a>
											</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</nav>
				
				<div class="btn-floating" id="help-actions">
					<div class="btn-bg"></div>
					<button type="button" class="btn btn-default btn-toggle" data-toggle="toggle" data-target="#help-actions">
						<i class="icon fa fa-plus"></i>
						<span class="help-text">Shortcut</span>
					</button>
					<!--Button float-->
					<div class="toggle-content">
						<ul class="actions">
							<li>
								<a href="#">Website</a>
							</li>
							<li>
								<a href="#">Documentation</a>
							</li>
							<li>
								<a href="#">Issues</a>
							</li>
							<li>
								<a href="#">About</a>
							</li>
						</ul>
					</div>
					
				</div>
				
				<!--Painel principal--->
				<div class="container-fluid">

						{conteudo}
			
				</div>
				<br />
					<footer class="app-footer">
						<div class="row">
							<div class="col-xs-12">
								<div class="footer-copyright">
									Copyright © 2017 Opiniãopop.
								</div>
							</div>
						</div>
					</footer>
			</div>

		</div>
		<!-- /.container-fluid -->

		<!-- /.row -->

		{footerinc}

	</body>
	
<?php $this->benchmark->mark('code_end');

echo '<p class="text-center">'.$this->benchmark->elapsed_time('code_start', 'code_end').'</p>'; ?>
</html>