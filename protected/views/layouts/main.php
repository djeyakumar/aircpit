<!DOCTYPE html>
<html>
<head>
<title>AIRCPIT - Online Jobs in railway department</title>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- Custom Theme files -->
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Railway jobs, railway contract works, jobs in irctc, railway recruitment" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- web-fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/responsiveslides.min.js"></script>
	<script>
		$(function () {
		  $("#slider").responsiveSlides({
			auto: true,
			nav: true,
			speed: 500,
			namespace: "callbacks",
			pager: true,
		  });
		});
	</script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/move-top.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/easing.js"></script>

<!--/script-->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
		});
	});

	$(window).load(function(){
        //$('#myModal').modal('show');
    });
</script>
</head>
<body>
	<!-- Popup On load-->
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  	<div class="modal-dialog">
	        <div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		      	</div>
		      	<div class="modal-body">
		        	<img src="images/happy-pongal.jpg" width="100%">
		      	</div>
	    	</div>
	  	</div>
	</div>
	<!-- header-section-starts-here -->
	<div class="header">
		<div class="header-top">
			<div class="wrap">
				<div class="top-menu">
					<?php $this->widget('zii.widgets.CMenu',array(
						'items'=>array(
							array('label'=>'Home', 'url'=>array('/site/index')),
							array('label'=>'Privacy Policy', 'url'=>array('/site/page', 'view'=>'policy')),
							array('label'=>'Employer Login', 'url'=>array('/site/employerLogin'), 'visible'=>Yii::app()->user->isGuest),
							array('label'=>'Employer Registration', 'url'=>array('/site/employerRegistration'), 'visible'=>Yii::app()->user->isGuest),
							array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
							array('label'=>'Register', 'url'=>array('/site/registration'), 'visible'=>Yii::app()->user->isGuest),
							array('label'=>'My Profile', 'url'=>array('/site/profile'), 'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
						),
					)); ?>
				</div>
				<div class="num">
					<p> Call us : +91 8056 5461 32</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="header-bottom">
			<div class="logo text-center">
				<a href="index.html"><img src="images/logo1.png" alt="" /></a>
				<!-- <img src="images/workers.jpg" height="100"> -->
			</div>

			<div class="navigation">
				<nav class="navbar navbar-default" role="navigation">
		   			<div class="wrap">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							
						</div>
						<!--/.navbar-header-->
		
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class="active"><?php echo CHtml::link('Home',array('site/index')); ?></li>
								<li><?php echo CHtml::link('About Us',array('site/page', 'view'=>'about')); ?></li>
								<li><a href="#">Jobs</a></li>
								<li><a href="#">Recruiters</a></li>
								<li><a href="#">Companies</a></li>
							    <li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Services
									<!--<b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="entertainment.html">Movies</a></li>
										<li class="divider"></li>
									</ul>-->
								</li>
								<?php if(Yii::app()->user->isGuest) : ?>
									<li><?php echo CHtml::link('Login',array('site/login')); ?></li>
									<li><?php echo CHtml::link('Register',array('site/registration')); ?></li>
								<?php endif; ?>

								<?php if(!Yii::app()->user->isGuest) : ?>
									<?php if(Yii::app()->user->userType == 'Employer') : ?>
										<li><?php echo CHtml::link('My Posts',array('post/index')); ?></li>
									<?php endif; ?>
								<?php endif; ?>
								<div class="clearfix"></div>
							</ul>
						</div>
						<!--/.navbar-collapse-->
	 				<!--/.navbar-->
					</div>
				</nav>
			</div>
	</div>
	<!-- header-section-ends-here -->
	<div class="wrap">
		<div class="move-text">
			<div class="breaking_news">
				<h2>Breaking News</h2>
			</div>
			<div class="marquee">
				<div class="marquee1"><a class="breaking" href="single.html">>>214 foreman vaccancies in Karnataka</a></div>
				<div class="marquee2"><a class="breaking" href="single.html">>>368 labour vaccancies in Tamilnadu</a></div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
			<script type="text/javascript" src="js/jquery.marquee.min.js"></script>
			<script>
			  $('.marquee').marquee({ pauseOnHover: true });
			  //@ sourceURL=pen.js
			</script>
		</div>
	</div>
	<!-- content-section-starts-here -->
	<div class="main-body">
		<div class="wrap">
				<?php
				    foreach(Yii::app()->user->getFlashes() as $key => $message) {
				        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
				    }
				?>
				<?php echo $content; ?>
			<div class="col-md-4 side-bar">
				<?php
					$actionId = Yii::app()->controller->action->id;
					if(Yii::app()->controller->id == 'site') {
						if(	$actionId == 'index' || 
							$actionId == 'page') {
								$this->renderPartial('pages/_right');
						}
					}
				?>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- content-section-ends-here -->
	<!-- footer-section-starts-here -->
	<div class="footer">
		<div class="footer-bottom">
			<div class="wrap">
				<div class="copyrights col-md-6">
					<p> © 2015 AIRCPIT.COM. All Rights Reserved | Design by  <a href="http://www.tekgenius.in"> TekGenius</a></p>
				</div>
				<div class="footer-social-icons col-md-6">
					<ul>
						<li><a class="facebook" href="#"></a></li>
						<li><a class="twitter" href="#"></a></li>
						<li><a class="flickr" href="#"></a></li>
						<li><a class="googleplus" href="#"></a></li>
						<li><a class="dribbble" href="#"></a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- footer-section-ends-here -->
	<script type="text/javascript">
		$(document).ready(function() {
				/*
				var defaults = {
				wrapID: 'toTop', // fading element id
				wrapHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
				*/
			$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!---->
<?php
	Yii::app()->clientScript->coreScriptPosition=CClientScript::POS_HEAD;
	Yii::app()->clientScript->registerCoreScript('jquery');
?>
</body>
</html>