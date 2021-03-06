
        <div class="content-body">
			<div class="container">
				<div class="row">
					<main class="col-md-12">
						<h1 class="page-title"><?php echo $about['title']; ?></h1>
						<article class="post">
							<div class="entry-content clearfix">
								<figure class="img-responsive-center">
									<img class="img-responsive" src="<?php echo base_url() . $about['picture']; ?>" alt="Developer Image">
								</figure>
								<?php echo $about['body']; ?>
								<div class="height-40px"></div>
								<h2 class="title text-center">Social</h2>
								<ul class="social">
									<li class="facebook"><a href="<?php echo $about['facebook']; ?>"><span class="ion-social-facebook"></span></a></li>
									<li class="twitter"><a href="<?php echo $about['twitter']; ?>"><span class="ion-social-twitter"></span></a></li>
									<li class="tumblr"><a href="<?php echo $about['instagram']; ?> "><span class="ion-social-instagram"></span></a></li>
								</ul>
							</div>
						</article>
					</main>
				</div>
			</div>
		</div>