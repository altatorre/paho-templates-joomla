<?php defined( '_JEXEC' ) or die( 'Restricted access' );
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;
$dados = $this->params->_registry['_default']['data'];
$style = $dados->style;
$modal = $dados->modal;
$logo = $dados->logo;
$logowidth = $dados->logowidth;
$menuwidth = (12 - $logowidth);
$body_font = $dados->body_font;
$header_font = $dados->header_font;
$sidebar1 = $dados->sidebar1;
$main = $dados->main;
$sidebar2 = $dados->sidebar2;
$bs_rowmode = $dados->bs_rowmode;
if ($bs_rowmode == 'row') {
	$containerClass = 'container';
} else {
	$containerClass = 'container-fluid';
}
$responsive = $dados->responsive;
if ($responsive) {
	$classe = 'responsive';
}
$stickyFooter = $dados->stickyFooter;
$wright_bootstrap_images = $dados->wright_bootstrap_images;
$mobile_menu_text = $dados->mobile_menu_text;
$onyx_toolbar_displayed = $dados->onyx_toolbar_displayed;
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<base href="<?php echo JUri::base(); ?>index.php" />
		<jdoc:include type="head" />
		<link href="<?php echo JUri::base(); ?>templates/js_onyx/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
		<link href="<?php echo JUri::base(); ?>media/system/css/modal.css?96854a2642748013afb53d905e4d9a47" rel="stylesheet" type="text/css" />
		<link href="<?php echo JUri::base(); ?>templates/js_onyx/css/style-<?php echo $style; ?>.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo JUri::base(); ?>templates/js_onyx/css/joomla30-<?php echo $style; ?>-extended.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo JUri::base(); ?>templates/js_onyx/css/joomla30-<?php echo $style; ?>-responsive.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo JUri::base(); ?>templates/js_onyx/wright/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo JUri::base(); ?>media/mod_onyx-slider/css/owl.carousel.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo JUri::base(); ?>media/mod_onyx-slider/css/onyx_ss.css" rel="stylesheet" type="text/css" />
		<script src="<?php echo JUri::base(); ?>templates/js_onyx/js/jui/jquery.min.js?96854a2642748013afb53d905e4d9a47" type="text/javascript"></script>
		<script src="<?php echo JUri::base(); ?>media/jui/js/jquery-noconflict.js?96854a2642748013afb53d905e4d9a47" type="text/javascript"></script>
		<script src="<?php echo JUri::base(); ?>media/jui/js/jquery-migrate.min.js?96854a2642748013afb53d905e4d9a47" type="text/javascript"></script>
		<script src="<?php echo JUri::base(); ?>media/system/js/caption.js?96854a2642748013afb53d905e4d9a47" type="text/javascript"></script>
		<script src="<?php echo JUri::base(); ?>templates/js_onyx/js/jui/bootstrap.min.js?96854a2642748013afb53d905e4d9a47" type="text/javascript"></script>
		<script src="<?php echo JUri::base(); ?>media/system/js/mootools-core.js?96854a2642748013afb53d905e4d9a47" type="text/javascript"></script>
		<script src="<?php echo JUri::base(); ?>media/system/js/core.js?96854a2642748013afb53d905e4d9a47" type="text/javascript"></script>
		<script src="<?php echo JUri::base(); ?>media/system/js/mootools-more.js?96854a2642748013afb53d905e4d9a47" type="text/javascript"></script>
		<script src="<?php echo JUri::base(); ?>media/system/js/modal.js?96854a2642748013afb53d905e4d9a47" type="text/javascript"></script>
		<script src="<?php echo JUri::base(); ?>templates/js_onyx/wright/js/utils.js" type="text/javascript"></script>
		<script src="<?php echo JUri::base(); ?>templates/js_onyx/wright/js/stickyfooter.js" type="text/javascript"></script>
		<script src="<?php echo JUri::base(); ?>media/mod_onyx-slider/js/owl.carousel.min.js" type="text/javascript"></script>
		<script src="<?php echo JUri::base(); ?>media/mod_onyx-slider/js/onyx_ss.js" type="text/javascript"></script>
	</head>
	<body class="<?php echo $classe; ?>">
		<?php
			if ($this->countModules('toolbar'))
				:
		?>
		<!-- toolbar -->
		<div class="wrapper-toolbar">
			<nav id="toolbar">
				<div class="navbar navbar-inverse<?php if($onyx_toolbar_displayed) echo ' '.$onyx_toolbar_displayed; ?>">
					<div class="navbar-inner">
						<div class="<?php echo $containerClass; ?>">
							<a class="btn btn-navbar collapsed" data-toggle="collapse" data-target="#nav-toolbar">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</a>
							<div class="nav-collapse" id="nav-toolbar">
								<div class="search pull-right">
									<form action="/" method="post" class="form-inline">
										<label for="mod-search-searchword" class="element-invisible">Search ...</label>
										<input name="searchword" id="mod-search-searchword" maxlength="200" class="inputbox search-query" type="text" size="20" value="Search"  onblur="if (this.value=='') this.value='Search';" onfocus="if (this.value=='Search') this.value='';" />
										<input type="hidden" name="task" value="search" />
										<input type="hidden" name="option" value="com_search" />
										<input type="hidden" name="Itemid" value="247" />
									</form>
								</div>
								<jdoc:include type="modules" name="toolbar" style="raw" />
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
		<?php
			endif;
		?>

		<div class="<?php echo $containerClass; ?>">

			<!-- header -->
			<header id="header">
				<div class="<?php echo $bs_rowmode; ?> clearfix">

					<div id="logo" class="span<?php echo $logowidth; ?>">
						<jdoc:include type="modules" name="logo" style="raw" />
					</div>

					<div id="menu" class="span<?php echo $menuwidth; ?>">
						<nav id="menu_primary" class="clearfix">
							<div class="navbar ">
								<div class="navbar-inner">
									<a class="btn btn-navbar collapsed" data-toggle="collapse" data-target="#nav-menu">
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</a>
									<div class="nav-collapse" id="nav-menu">
										<jdoc:include type="modules" name="menu" style="raw" />
									</div>
								</div>
							</div>
						</nav>
					</div>
					<div class="clear"></div>
				</div>
			</header>

			<?php
				if ($this->countModules('top'))
					:
			?>
			<jdoc:include type="modules" name="top" style="xhtml" />
			<?php
				endif;
			?>
			<!-- featured -->
			<?php
				if ($this->countModules('featured'))
					:
			?>
			<div id="featured">
				<jdoc:include type="modules" name="featured" style="xhtml" />
			</div><!-- end of featured -->
			<?php
				endif;
			?>
			<!-- grid-top -->
			<?php
			$gt = $this->countModules( 'grid-top' );
				if ($gt)
					:
			?>
			<div id="grid-top">
				<div class="row-fluid">
			<?php
				$db = &JFactory::getDBO();
				$query = "SELECT * FROM #__modules WHERE `position`='grid-top' AND `published`=1 ORDER BY ordering";
				$db->setQuery($query);
				$results = $db->loadObjectList();
				$span = (12/count($results));
				for ($i=0;$i <count($results);$i++) {
					$fl = '';
					$params = explode ('=',$results[$i]->params);
					$modsfx = $params[1];
					$mod = ' mod_' . $i;
					if ($i == 0) $fl = ' first';
					if ($i == (count($results)-1)) {
						$mod = ' mod_0';
						$fl = ' last';
					}
					if (count($results) == 1) $fl = ' first last';
					$p = trim($modsfx) . $fl . $mod;
			?>
					<div class="module<?php echo $p; ?> span<?php echo $span; ?>">
						<?php if ($results[$i]->showtitle) echo "<h3>" . $results[$i]->title . "</h3>\n"; ?>
						<jdoc:include type="module" name="custom" title="<?php echo $results[$i]->title; ?>" style="raw" />
					</div>
<?php } ?>
				</div><!-- end of row-fluid -->
			</div><!-- end of grid-top -->
			<?php
				endif;
			?>
			<!-- grid-top2 -->
			<?php
			$gt = $this->countModules( 'grid-top2' );
				if ($gt)
					:
			?>
			<div id="grid-top2">
				<div class="row-fluid">
			<?php
				$db = &JFactory::getDBO();
				$query = "SELECT * FROM #__modules WHERE `position`='grid-top2' AND `published`=1 ORDER BY ordering";
				$db->setQuery($query);
				$results = $db->loadObjectList();
				$span = (12/count($results));
				for ($i=0;$i <count($results);$i++) {
					$fl = '';
					$params = explode ('=',$results[$i]->params);
					$modsfx = $params[1];
					$mod = ' mod_' . $i;
					if ($i == 0) $fl = ' first';
					if ($i == (count($results)-1)) {
						$mod = ' mod_0';
						$fl = ' last';
					}
					if (count($results) == 1) $fl = ' first last';
					$p = trim($modsfx) . $fl . $mod;
			?>
					<div class="module<?php echo $p; ?> span<?php echo $span; ?>">
						<?php if ($results[$i]->showtitle) echo "<h3>" . $results[$i]->title . "</h3>\n"; ?>
						<jdoc:include type="module" name="custom" title="<?php echo $results[$i]->title; ?>" style="raw" />
					</div>
<?php } ?>
				</div><!-- end of row-fluid -->
			</div><!-- end of grid-top2 -->
			<?php
				endif;
				if (!$this->countModules('sidebar1')) $main = $main + $sidebar1;
				if (!$this->countModules('sidebar2')) $main = $main + $sidebar2;
			?>
			<div id="main-content" class="<?php echo $bs_rowmode; ?>">
				<!-- sidebar1 -->
			<?php
				if ($this->countModules('sidebar1'))
					:
			?>
				<aside class="span<?php echo trim($sidebar1); ?>" id="sidebar1">
					<jdoc:include type="modules" name="sidebar1" style="xhtml" />
				</aside>
			<?php
				endif;
			?>
				<!-- main -->
				<section class="span<?php echo trim($main); ?>" id="main">
					<?php
						if ($this->countModules('above-content'))
							:
					?>
					<!-- above-content -->
					<div id="above-content">
						<jdoc:include type="modules" name="above-content" style="xhtml" />
					</div>
					<?php
						endif;
					?>
					<?php
						if ($this->countModules('breadcrumbs'))
							:
					?>
					<!-- breadcrumbs -->
					<div id="breadcrumbs">
							<jdoc:include type="modules" name="breadcrumbs" style="raw" />
					</div>
					<?php
						endif;
					?>
					<!-- component -->
					<jdoc:include type="component" />
					<?php
						if ($this->countModules('below-content'))
							:
					?>
					<!-- below-content -->
					<div id="below-content">
						<jdoc:include type="modules" name="below-content" style="xhtml" />
					</div>
					<?php
						endif;
					?>
				</section>
				<!-- sidebar2 -->
			<?php
				if ($this->countModules('sidebar2'))
					:
			?>
				<aside class="span<?php echo trim($sidebar2); ?>" id="sidebar2">
					<jdoc:include type="modules" name="sidebar2" style="xhtml" />
				</aside>
			<?php
				endif;
			?>
			</div>
            <?php
            if ($this->countModules('inner'))
                :
                ?>
                <!-- inner -->
                <div id="inner" >
                    <jdoc:include type="modules" name="inner" style="xhtml" />
                </div>
            <?php
            endif;
            ?>
			<?php
			$ge = $this->countModules( 'grid-extra' );
				if ($ge)
					:
			?>
			<!-- grid-extra -->
			<div id="grid-extra" >
				<div class="row-fluid">
			<?php
				$db = &JFactory::getDBO();
				$query = "SELECT * FROM #__modules WHERE `position`='grid-extra' AND `published`=1 ORDER BY ordering";
				$db->setQuery($query);
				$results = $db->loadObjectList();
				$span = (12/count($results));
				for ($i=0;$i <count($results);$i++) {
					$fl = '';
					$params = explode ('=',$results[$i]->params);
					$modsfx = $params[1];
					$mod = ' mod_' . $i;
					if ($i == 0) $fl = ' first';
					if ($i == (count($results)-1)) {
						$mod = ' mod_0';
						$fl = ' last';
					}
					if (count($results) == 1) $fl = ' first last';
					$p = trim($modsfx) . $fl . $mod;
			?>
					<div class="module<?php echo $p; ?> span<?php echo $span; ?>">
						<?php if ($results[$i]->showtitle) echo "<h3>" . $results[$i]->title . "</h3>\n"; ?>
						<jdoc:include type="module" name="custom" title="<?php echo $results[$i]->title; ?>" style="raw" />
					</div>
<?php } ?>
				</div>
			</div>
			<?php
				endif;
			?>
			<?php
			$gb = $this->countModules( 'grid-bottom' );
				if ($gb)
					:
			?>
            <!-- grid-bottom -->
            <div id="grid-bottom" >
							<div class="row-fluid">
			<?php
				$db = &JFactory::getDBO();
				$query = "SELECT * FROM #__modules WHERE `position`='grid-bottom' AND `published`=1 ORDER BY ordering";
				$db->setQuery($query);
				$results = $db->loadObjectList();
				$span = (12/count($results));
				for ($i=0;$i <count($results);$i++) {
					$fl = '';
					$params = explode ('=',$results[$i]->params);
					$modsfx = $params[1];
					$mod = ' mod_' . $i;
					if ($i == 0) $fl = ' first';
					if ($i == (count($results)-1)) {
						$mod = ' mod_0';
						$fl = ' last';
					}
					if (count($results) == 1) $fl = ' first last';
					$p = trim($modsfx) . $fl . $mod;
			?>
					<div class="module<?php echo $p; ?> span<?php echo $span; ?>">
						<?php if ($results[$i]->showtitle) echo "<h3>" . $results[$i]->title . "</h3>\n"; ?>
						<jdoc:include type="module" name="custom" title="<?php echo $results[$i]->title; ?>" style="raw" />
					</div>
<?php } ?>
				</div>
			</div>
            <?php
                endif;
            ?>

			<?php
			$gb = $this->countModules( 'grid-bottom2' );
				if ($gb)
					:
			?>
            <!-- grid-bottom2 -->
            <div id="grid-bottom2" >
							<div class="row-fluid">
			<?php
				$db = &JFactory::getDBO();
				$query = "SELECT * FROM #__modules WHERE `position`='grid-bottom2' AND `published`=1 ORDER BY ordering";
				$db->setQuery($query);
				$results = $db->loadObjectList();
				$span = (12/count($results));
				for ($i=0;$i <count($results);$i++) {
					$fl = '';
					$params = explode ('=',$results[$i]->params);
					$modsfx = $params[1];
					$mod = ' mod_' . $i;
					if ($i == 0) $fl = ' first';
					if ($i == (count($results)-1)) {
						$mod = ' mod_0';
						$fl = ' last';
					}
					if (count($results) == 1) $fl = ' first last';
					$p = trim($modsfx) . $fl . $mod;
			
					echo "\n<!-- Mod: " . $results[$i]->title . " - Type: " . $results[$i]->module . " - Position: ".$results[$i]->position." - ID: " . $results[$i]->id . " -->";
			?>
					<div class="module<?php echo $p; ?> span<?php echo $span; ?>">
						<?php if ($results[$i]->showtitle) echo "<h3>" . $results[$i]->title . "</h3>\n"; ?>
						<jdoc:include type="module" name="custom" title="<?php echo $results[$i]->title; ?>" style="raw" />
					</div>
<?php } ?>
				</div>
			</div>
      <?php
				endif;
			?>
		</div>
		<!-- footer -->
		<div class="wrapper-footer">
			<footer id="footer"<?php if ($stickyFooter) echo ' class="sticky"'; ?>>
		<?php
			if ($this->countModules('bottom-menu'))
				:
		?>
			<!-- bottom-menu -->
			<div class="wrapper-bottom-menu">
				<div class="container">
					<nav id="bottom-menu">
						<div class="navbar navbar-inverse">
							<div class="navbar-inner">
								<a class="btn btn-navbar collapsed" data-toggle="collapse" data-target="#nav-bottom-menu">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</a>
								<div class="nav-collapse" id="nav-bottom-menu">
									<jdoc:include type="modules" name="bottom-menu" style="raw" />
								</div>
							</div>
						</div>
					</nav>
				</div>
			</div>
		<?php
			endif;
		?>
				<div class="<?php echo $containerClass; ?> footer-content">
		   	<?php
					$ft = ($this->countModules('onyx-footer'));
					if ($ft)
					:
				?>
					<div class="row-fluid">
			<?php
				$db = &JFactory::getDBO();
				$query = "SELECT * FROM #__modules WHERE `position`='onyx-footer' AND `published`=1 ORDER BY ordering";
				$db->setQuery($query);
				$results = $db->loadObjectList();
				$span = (12/count($results));
				for ($i=0;$i <count($results);$i++) {
					$fl = '';
					$params = explode ('=',$results[$i]->params);
					$modsfx = $params[1];
					$mod = ' mod_' . $i;
					if ($i == 0) $fl = ' first';
					if ($i == (count($results)-1)) {
						$mod = ' mod_0';
						$fl = ' last';
					}
					if (count($results) == 1) $fl = ' first last';
					$p = trim($modsfx) . $fl . $mod;
					echo "\n<!-- Mod: " . $results[$i]->title . " - Type: " . $results[$i]->module . " - Position: ".$results[$i]->position." - ID: " . $results[$i]->id . " -->";
			?>
							<div class="module<?php echo $p; ?> span<?php echo $span; ?>">
								<?php if ($results[$i]->showtitle) echo "<h3>" . $results[$i]->title . "</h3>\n"; ?>
								<jdoc:include type="module" name="custom" title="<?php echo $results[$i]->title; ?>" style="raw" />
							</div>
<?php } ?>
					</div>
		 	<?php
				endif;
			?>
				</div>
			</footer>
		</div><!-- end of wrapper-footer -->
			<jdoc:include type="modules" name="debug" />
	</body>
</html>
