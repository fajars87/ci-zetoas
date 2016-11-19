
		<div class="content-body">
			<div class="container">
				<div class="row">
					<main class="col-md-8">
                        <?php foreach ($artikel as $list) { ?>
						<article class="post">
							<header class="entry-header">
								<h1 class="entry-title">
									<a href="<?php echo base_url() ?>home/read/<?php echo $list['pslug']; ?>.aspx"><?php echo $list['title']; ?></a>
								</h1>
								<div class="entry-meta">
									<span class="post-category"><a href="<?php echo base_url() ?>home/kategori/<?php echo $list['cslug']; ?>.aspx"><?php echo $list['cname']; ?></a></span>
			
									<span class="post-date"><a href="#"><?php echo date("F d, Y", strtotime($list['created_at'])); ?></a></span>
			
									<span class="post-author"><a href="#"><?php echo $list['uname']; ?></a></span>
								</div>
							</header>
							<div class="entry-content clearfix">
								<p><?php echo $list['excerpt']; ?></p>
								<div class="read-more cl-effect-14">
									<a href="<?php echo base_url() ?>home/read/<?php echo $list['pslug']; ?>.aspx" class="more-link">Continue reading <span class="meta-nav">→</span></a>
								</div>
							</div>
						</article>
                        <?php } ?>
					</main>
					<aside class="col-md-4">
						<div class="widget widget-recent-posts">		
							<h3 class="widget-title">Recent Posts</h3>		
							<ul>
                                <?php foreach ($artikel as $list) { ?>
								<li>
									<a href="<?php echo base_url() ?>home/read/<?php echo $list['pslug']; ?>.aspx"><?php echo $list['title']; ?></a>
								</li>
                                <?php } ?>
							</ul>
						</div>
						<div class="widget widget-archives">		
							<h3 class="widget-title">Archives</h3>		
							<ul>
								<li>
									<a href="#">November 2014</a>
								</li>
								<li>
									<a href="#">September 2014</a>
								</li>
								<li>
									<a href="#">January 2013</a>
								</li>
							</ul>
						</div>

						<div class="widget widget-category">		
							<h3 class="widget-title">Category</h3>		
							<ul>
								<li>
									<a href="#">Web Design</a>
								</li>
								<li>
									<a href="#">Web Development</a>
								</li>
								<li>
									<a href="#">SEO</a>
								</li>
							</ul>
						</div>
					</aside>
				</div>
			</div>
		</div>
