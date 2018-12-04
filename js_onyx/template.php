<?php
/**
 * @package     Onyx
 * @subpackage  Template File
 *
 * @copyright   Copyright (C) 2005 - 2016 Joomlashack. Meritage Assets.  All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 *
 * Do not edit this file directly. You can copy it and create a new file called
 * 'custom.php' in the same folder, and it will override this file. That way
 * if you update the template ever, your changes will not be lost.
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

?>
<doctype>
<html>
	<head>
		<w:head />
	</head>
	<body class="<?php echo $wrightBodyClass ?>">
		<?php
			if ($this->countModules('toolbar'))
				:
		?>
		<!-- toolbar -->
		<w:nav containerClass="<?php echo $wrightContainerClass ?>" rowClass="<?php echo $wrightGridMode ?>" wrapClass="<?php echo $onyxToolbarDisplayed; ?> navbar-inverse" type="toolbar" name="toolbar" />
    <?php
			endif;
		?>
		<div class="<?php echo $wrightContainerClass; ?>">
			<!-- header -->
			<header id="header">
				<div class="<?php echo $wrightGridMode; ?> clearfix">
          <jdoc:include type="modules" name="language" />
					<w:logo name="menu" />
					<div class="clear"></div>
				</div>
			</header>
			<?php
				if ($this->countModules('top'))
					:
			?>
			<w:module type="none" name="top" chrome="wrightxhtml" />
			<?php
				endif;
			?>
			<!-- featured -->
			<?php
				if ($this->countModules('featured'))
					:
			?>
			<div id="featured">
				<w:module type="none" name="featured" chrome="wrightxhtml" />
			</div>
			<?php
				endif;
			?>
			<!-- grid-top -->
			<?php
				if ($this->countModules('grid-top'))
					:
			?>
			<div id="grid-top">
				<w:module type="row-fluid" name="grid-top" chrome="wrightflexgrid" />
			</div>
			<?php
				endif;
			?>
			<?php
				if ($this->countModules('grid-top2'))
					:
			?>
			<!-- grid-top2 -->
			<div id="grid-top2">
				<w:module type="row-fluid" name="grid-top2" chrome="wrightflexgrid" />
			</div>
			<?php
				endif;
			?>
			<div id="main-content" class="<?php echo $wrightGridMode; ?>">
				<!-- sidebar1 -->
				<aside id="sidebar1">
					<w:module name="sidebar1" chrome="wrightxhtml" />
				</aside>
				<!-- main -->
				<section id="main">
					<?php
						if ($this->countModules('above-content'))
							:
					?>
					<!-- above-content -->
					<div id="above-content">
						<w:module type="none" name="above-content" chrome="wrightxhtml" />
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
							<w:module type="single" name="breadcrumbs" chrome="none" />
					</div>
					<?php
						endif;
					?>
					<!-- component -->
					<w:content />
					<?php
						if ($this->countModules('below-content'))
							:
					?>
					<!-- below-content -->
					<div id="below-content">
						<w:module type="none" name="below-content" chrome="wrightxhtml" />
					</div>
					<?php
						endif;
					?>
				</section>
				<!-- sidebar2 -->
				<aside id="sidebar2">
					<w:module name="sidebar2" chrome="wrightxhtml" />
				</aside>
			</div>
            <?php
            if ($this->countModules('inner'))
                :
                ?>
                <!-- inner -->
                <div id="inner" >
                    <w:module type="none" name="inner" chrome="wrightxhtml" />
                </div>
            <?php
            endif;
            ?>
			<?php
				if ($this->countModules('grid-extra'))
					:
			?>
			<!-- grid-extra -->
			<div id="grid-extra" >
                <w:module type="row-fluid" name="grid-extra" chrome="wrightflexgrid" />
			</div>
			<?php
				endif;
			?>
			<?php
				if ($this->countModules('grid-bottom'))
					:
			?>
            <!-- grid-bottom -->
            <div id="grid-bottom" >
                <w:module type="row-fluid" name="grid-bottom" chrome="wrightflexgrid" />
            </div>
            <?php
                endif;
            ?>
            <?php
            if ($this->countModules('grid-bottom2'))
                :
            ?>
			<!-- grid-bottom2 -->
			<div id="grid-bottom2" >
				<w:module type="row-fluid" name="grid-bottom2" chrome="wrightflexgrid" />
			</div>
			<?php
				endif;
			?>
		</div>

		<!-- footer -->
		<div class="wrapper-footer">
		   <footer id="footer" <?php
			if ($this->params->get('stickyFooter', 1))
				:
				?> class="sticky"<?php
			endif;
				?>>

				<?php
					if ($this->countModules('bottom-menu'))
					:
				?>
				<!-- bottom-menu -->
				<w:nav containerClass="<?php echo $wrightContainerClass ?>" rowClass="<?php echo $wrightGridMode ?>" name="bottom-menu" wrapClass="navbar-inverse" />
				<?php
					endif;
				?>

		   	 <div class="<?php echo $wrightContainerClass; ?> footer-content">
		   		<?php
					if ($this->countModules('footer'))
					:
				?>
					<w:module type="row-fluid" name="footer" chrome="wrightflexgrid" />
			 	<?php
					endif;
				?>
					<w:footer />
				</div>
		   </footer>
		</div>
		<w:module type="none" name="debug" chrome="none" />
	</body>
</html>
