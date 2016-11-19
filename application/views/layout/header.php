		<div class="container">	
			<header id="site-header">
				<div class="row">
					<div class="col-md-4 col-sm-5 col-xs-8">
						<div class="logo">
							<h1><a href="<?php echo base_url(); ?>"><b>Zeto Aryo Suseto</a></h1>
						</div>
					</div><!-- col-md-4 -->
					<div class="col-md-8 col-sm-7 col-xs-4">
						<nav class="main-nav" role="navigation">
							<div class="navbar-header">
  								<button type="button" id="trigger-overlay" class="navbar-toggle">
    								<span class="ion-navicon"></span>
  								</button>
							</div>

							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  								<ul class="nav navbar-nav navbar-right">
								  	<?php
										//print_r($menu);
										foreach($menu as $rmenu){
									?>
    								<li class="cl-effect-11"><a href="<?php echo base_url().$rmenu['url']; ?>.aspx" data-hover="<?php echo $rmenu['title']?>"><?php echo $rmenu['title']?></a></li>
									<?php } ?>
  								</ul>
							</div><!-- /.navbar-collapse -->
						</nav>
					</div><!-- col-md-8 -->
				</div>
			</header>
		</div>