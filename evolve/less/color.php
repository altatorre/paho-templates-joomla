<?php
header("Content-type: text/css; charset=utf-8");

$main_color = '#'.htmlspecialchars($_GET["main_color"]);
$header_bg_color = '#'.htmlspecialchars($_GET["header_bg_color"]);
$header_color = '#'.htmlspecialchars($_GET["header_color"]);
?>
#header .topbar{
    background:<?php echo $header_bg_color; ?>
}
#header .topbar{
    color:<?php echo $header_color; ?>
}
.premium .plan-currency,
.premium .plan-price,
.premium .plan-features a.button:hover,
.landing-imac ul li:hover,
.sb-navigation-left-3:hover i,
.sb-navigation-right-3:hover i,
.featured-box:hover > .circle-2 i,
.featured-box:hover > .square-2 i,
.widget_latest_posts li a:hover,
.circle-1 i, .square-1 i, .icons-center i,
.circle-2-line i, .featured-box:hover > .circle-2-line i,
.square-2-line i, .featured-box:hover > .square-2-line i,
.icon-left i,
.button.line-color,
.bg-tagline a:hover,
.sb-navigation-left-2:hover i,
.sb-navigation-right-2:hover i,
a, a:visited,
#not-found i,
.portfolio-item:hover > figure > .item-description a h5,
#header .topbar .call li i,
#current,
.menu >ul  >li.active >a,
.menu ul li a:hover,
.menu ul > li:hover > a
.comment-by span.reply a:hover,
.comment-by span.reply a:hover i,
#footer .widget-text h4 a:hover,
.categories a:hover,
.testimonials-author,
.happy-clients-author,
.team-email a:hover,
.dropcap,
#not-found h2,
.post-content h2 a:hover,
.post-format span:hover,
.meta ul li a:hover,
.search-button:hover,
.list-1 li:before,
.list-2 li:before,
.list-3 li:before,
.list-4 li:before,
.author { color: <?php echo $main_color; ?>; }

.widget-thumb a img:hover,
#footer .widget-thumb a img:hover,
.sb-navigation-left:hover,
.sb-navigation-right:hover,
.sb-navigation-left-4:hover,
.sb-navigation-right-4:hover,
.circle-1, .square-1,
.circle-2-line, .square-2-line,
.button.line-color,
.button.line-color:hover,
#current,
blockquote,
#filters a:hover,
.selected,
.services-box-animated .back,
.flickr-widget-blog a:hover,
.flex-control-paging li a:hover,
.flex-control-paging li a.flex-active { border-color: #d2be82; }
.menu ul ul { border-top-color: <?php echo $main_color; ?>; }

iframe,
.skill-bar li span,
.circle-2, .square-2,
.button.line-color:hover,
.featured-box:hover > .circle,
.featured-box:hover > .circle span,
.featured-box:hover > .circle-1,
.featured-box:hover > .square-1,
.sb-navigation-left:hover,
.sb-navigation-right:hover,
.sb-navigation-left-4:hover,
.sb-navigation-right-4:hover,
.newsletter-btn,
.post-content .testimonial,
.search-btn { background-color: <?php echo $main_color; ?>; }

#filters a:hover, .selected { background-color: <?php echo $main_color; ?> !important; }

.premium.plan h3,
.premium .plan-features  { background-color: <?php echo $main_color; ?>; }

.featured-box:hover > .circle-2, .featured-box:hover > .square-2 { box-shadow: 0 0 0 1px rgba(210, 190, 130, 1); }

iframe,
.date span,
.bg-color,
#current:after,
.menu ul > li > a:after,
.pagination .current,
.pagination ul li a:hover,
.tags a:hover,
.button.gray:hover,
.button.light:hover,
.button.color,
input[type="button"],
input[type="submit"],
input[type="button"]:focus,
input[type="submit"]:focus,
#contact-form button[type="submit"],
.st-frm-login-wrap button[type="submit"]:hover,
.tabs-nav li.active a,
.ui-accordion .ui-accordion-header-active:hover,
.ui-accordion .ui-accordion-header-active,
.trigger.active a,
.trigger.active a:hover,
.skill-bar-value,
.highlight.color,
.chart .percentage-light,
.item-description span:after,
.featured .plan-features a.button:hover,
.premium .plan-features,
.services-box-animated .back,
.avatar:hover img,
.notice-box:hover,
.topbar.color { background: <?php echo $main_color; ?>; }
.widget-thumb a img:hover, #footer .widget-thumb a img:hover, .sb-navigation-left:hover, .sb-navigation-right:hover, .sb-navigation-left-4:hover, .sb-navigation-right-4:hover, .circle-1, .square-1, .circle-2-line, .square-2-line, .button.line-color, .button.line-color:hover, #current, blockquote, #filters a:hover, .selected, .services-box-animated .back, .flickr-widget-blog a:hover, .flex-control-paging li a:hover, .flex-control-paging li a.flex-active{
    border-color:<?php echo $main_color; ?>;
}