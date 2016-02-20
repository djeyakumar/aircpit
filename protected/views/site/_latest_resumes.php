<div>
	<input id="label-1" name="lida" type="radio" checked/>
	<label for="label-1" id="item1"><i class="ferme"> </i>Recent Resumes<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
	<div class="content" id="a1">
		<div class="scrollbar" id="style-2">
	 		<div class="force-overflow">
				<div class="popular-post-grids">
					<?php if(count($this->latest_resumes) > 0) : ?>
						<?php foreach ($this->latest_resumes as $latest_resume ) : ?>
							<div class="popular-post-grid">
								<div class="post-img">
									<a href><?=$latest_resume->getPhoto(2);?></a>
								</div>
								<div class="post-text">
									<a class="pp-title" href> <?=$latest_resume->firstname . ' - ' . $latest_resume->lastname;?></a>
									<p>
										<?php if($latest_resume->age) : ?><b>Age : </b><a class="date" href><?=$latest_resume->age;?> yrs </a><?php endif;?>
										<?php if($latest_resume->experience) : ?><b> Experience : </b><a class="date" href><?=$latest_resume->experience;?> yrs</a><?php endif;?>
									</p>
									<p><b>Industry : </b><a class="date" href><?=($latest_resume->industry1) ? ($latest_resume->industry1->industry ? $latest_resume->industry1->industry : '') : '';?></a></p>
									<p><b>Functional Area : </b><a class="date" href><?=($latest_resume->functional_area1) ? ($latest_resume->functional_area1->functional_area ? $latest_resume->functional_area1->functional_area : '') : '';?></a></p>
									<!--<p>On Feb 25 <a class="span_link" href><span class="glyphicon glyphicon-comment"></span>3 </a><a class="span_link" href><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>-->
								</div>
								<div class="clearfix"></div>
							</div>
						<?php endforeach;?>
					<?php else : ?>
						<div class="popular-post-grid">
							<p>No Latest Resumes found</p>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</div>