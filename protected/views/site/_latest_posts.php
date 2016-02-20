<div>
	<input id="label-2" name="lida" type="radio"/>
    <label for="label-2" id="item2"><i class="icon-leaf" id="i2"></i>Recent Jobs<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
    <div class="content" id="a2">
       	<div class="scrollbar" id="style-2">
		   	<div class="force-overflow">
				<div class="popular-post-grids">
					<?php if(count($this->latest_posts) > 0) : ?>
						<?php foreach ($this->latest_posts as $latest_post ) : ?>
							<div class="popular-post-grid">
								<div class="post-img">
									<a href><?=$latest_post->getLogo(2);?></a>
								</div>
								<div class="post-text">
									<a class="pp-title" href> <?=$latest_post->title;?></a>
									<p><?=$this->trimLongText($latest_post->description, 15)?></p>
									<p><?php if($latest_post->experience) : ?><b> Experience : </b><a class="date" href><?=$latest_post->experience;?> yrs</a><?php endif;?></p>
									<p><b>Industry : </b><a class="date" href><?=($latest_post->industry1) ? ($latest_post->industry1->industry ? $latest_post->industry1->industry : '') : '';?></a></p>
									<p><b>Functional Area : </b><a class="date" href><?=($latest_post->functional_area1) ? ($latest_post->functional_area1->functional_area ? $latest_post->functional_area1->functional_area : '') : '';?></a></p>
									<!--<p>On Feb 25 <a class="span_link" href><span class="glyphicon glyphicon-comment"></span>3 </a><a class="span_link" href><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>-->
								</div>
								<div class="clearfix"></div>
							</div>
						<?php endforeach;?>
					<?php else : ?>
						<div class="popular-post-grid">
							<p>No Latest Posts found</p>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</div>