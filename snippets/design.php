<?php
/**
 * Grohnpetrel design: the site's colours, type and the components the pages use (gp-* classes).
 *
 * Runs on the site through the Code Snippets plugin; scripts/wp_sync.py publishes this file.
 * Edit here, not in WordPress: the next publish overwrites the snippet. To undo the redesign,
 * remove this snippet from pages/site.json (the theme's own styles then apply again).
 *
 * Direction: a North Sea field guide. Deep teal and seafoam come from the mascot, the terracotta
 * accent from its beak (also the colour the "In brief" boxes already carry). Pages read like
 * plates in a guide: ruled entries instead of boxed cards, data tables set like reference tables,
 * one aligned grid from header to footer.
 *
 * Palette: ink #0E3940, teal #124E5A (links, buttons), sea #2A6B66, text #1D3236, muted #4E6267,
 * mist #EEF4F1 and tide #E2ECE7 (the two section tints), beak #C8714F (marks only, never text),
 * beak ink #9E4A2B (accent text), focus #B85A36. All text pairs meet WCAG AA.
 *
 * Type: Platypi for headings and Manrope for text. Both ship with the Twenty Twenty-Five theme,
 * so the fonts load from this site's own server: no third-party font requests.
 */

add_action( 'wp_head', function () {
	$platypi = get_theme_file_uri( 'assets/fonts/platypi/Platypi-VariableFont_wght.woff2' );
	?>
<link rel="preload" href="<?php echo esc_url( $platypi ); ?>" as="font" type="font/woff2" crossorigin data-gp-font>
<style id="grohnpetrel-design">
@font-face{font-family:Platypi;font-style:normal;font-weight:300 800;font-display:swap;src:url('<?php echo esc_url( $platypi ); ?>') format('woff2')}

/* ---------- Tokens ---------- */
body{
	--gp-ink:#0E3940;--gp-teal:#124E5A;--gp-sea:#2A6B66;--gp-text:#1D3236;--gp-muted:#4E6267;
	--gp-paper:#FFFFFF;--gp-mist:#EEF4F1;--gp-tide:#E2ECE7;--gp-line:#D5E1DD;--gp-line-strong:#A9BDB7;
	--gp-beak:#C8714F;--gp-beak-ink:#9E4A2B;--gp-focus:#B85A36;
	--gp-on-dark:#C9DAD5;--gp-on-dark-muted:#9FBBB4;
	/* names kept for snippets/challenge.php and older markup */
	--gp-teal-dark:var(--gp-ink);--gp-ivory:#F7FAF8;--gp-foam:var(--gp-mist);--gp-sand:var(--gp-tide);--gp-gold:var(--gp-beak);
	--gp-serif:Platypi,Georgia,"Iowan Old Style","Palatino Linotype",serif;
	--gp-sans:Manrope,system-ui,-apple-system,"Segoe UI",sans-serif;
	--gp-wide:1180px;--gp-content:44rem;
	--gp-pad:clamp(1.25rem,4vw,3rem);
	--gp-section:clamp(3.5rem,8vw,6.5rem);
	--gp-radius:4px;
	--gp-arrow:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='none' stroke='black' stroke-width='1.8' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M4 10h11'/%3E%3Cpath d='m11 5.5 4.5 4.5-4.5 4.5'/%3E%3C/svg%3E");
	--wp--style--global--content-size:var(--gp-content);--wp--style--global--wide-size:var(--gp-wide);
	--wp--style--root--padding-left:var(--gp-pad);--wp--style--root--padding-right:var(--gp-pad);
	background:var(--gp-paper);color:var(--gp-text);
	font-family:var(--gp-sans);font-weight:400;font-size:clamp(1rem,.94rem + .28vw,1.125rem);line-height:1.65;
	-webkit-font-smoothing:antialiased;text-rendering:optimizeLegibility;
}
::selection{background:#CFE3DD;color:var(--gp-ink)}
body :where(input,textarea,select){accent-color:var(--gp-teal);caret-color:var(--gp-teal)}
body p,body li,body td{line-height:1.65;overflow-wrap:break-word}
body strong,body b{font-weight:700}

/* ---------- Type ---------- */
h1,h2,h3,h4,.wp-block-post-title,.wp-block-heading{font-family:var(--gp-serif);color:var(--gp-ink);font-weight:500;letter-spacing:-.012em;text-wrap:balance;font-optical-sizing:auto}
h1,.wp-block-post-title{font-size:clamp(2.375rem,1.55rem + 3.3vw,4rem);line-height:1.04;letter-spacing:-.02em}
h2.wp-block-heading{font-size:clamp(1.75rem,1.3rem + 1.8vw,2.625rem);line-height:1.1;letter-spacing:-.016em}
h3.wp-block-heading{font-size:clamp(1.25rem,1.12rem + .55vw,1.5rem);line-height:1.22;font-weight:550}
h4.wp-block-heading{font-family:var(--gp-sans);font-size:1rem;font-weight:700;letter-spacing:0;line-height:1.4}
p,li{text-wrap:pretty}
a{color:var(--gp-teal);text-decoration-line:underline;text-decoration-thickness:1px;text-decoration-color:rgba(18,78,90,.4);text-underline-offset:.2em;transition:color .15s,text-decoration-color .15s}
a:hover{color:var(--gp-ink);text-decoration-color:var(--gp-beak)}
:where(body) :focus-visible{outline:2px solid var(--gp-focus);outline-offset:3px;border-radius:2px}
.wp-block-post-content li::marker{color:var(--gp-beak)}
.wp-block-post-content :where(ul.wp-block-list>li+li,ol.wp-block-list>li+li){margin-top:.4em}
figcaption,.wp-element-caption{color:var(--gp-muted);font-size:.8125rem;line-height:1.5;text-align:left;margin-top:.6rem}
.has-small-font-size{font-size:.875rem!important;line-height:1.6}
.wp-block-post-content p.has-small-font-size{color:var(--gp-muted)}
hr.wp-block-separator{border:0;border-top:1px solid var(--gp-line);opacity:1}

/* Reading rhythm inside articles: more room above a heading than below it */
.wp-block-post-content>h2.wp-block-heading{margin-top:clamp(2.5rem,5vw,3.5rem)}
.wp-block-post-content>h3.wp-block-heading{margin-top:2.25rem}
.wp-block-post-content>:where(h2,h3)+*{margin-top:.85rem}
.wp-block-post-content>p{margin-top:1.1em}

/* ---------- Header and navigation ---------- */
header.wp-block-template-part{background:var(--gp-paper);border-bottom:1px solid var(--gp-line);position:relative;z-index:20}
header.wp-block-template-part>.wp-block-group>.wp-block-group>.alignwide{padding-top:1rem!important;padding-bottom:1rem!important}
header .wp-block-site-logo img{border-radius:var(--gp-radius);width:40px;height:40px}
header .wp-block-site-title{font-family:var(--gp-serif);font-size:1.375rem;font-weight:600;letter-spacing:-.01em;line-height:1}
header .wp-block-site-title a{color:var(--gp-ink);text-decoration:none}
header.wp-block-template-part .wp-block-navigation{font-size:.9375rem;font-weight:500;gap:.25rem 1.6rem}
header.wp-block-template-part .wp-block-navigation a{color:var(--gp-text);text-decoration:none}
header.wp-block-template-part .wp-block-navigation .wp-block-navigation-item__content{padding-block:.5rem}
header.wp-block-template-part .wp-block-navigation a:hover,header.wp-block-template-part .wp-block-navigation [aria-current="page"]{color:var(--gp-teal);text-decoration:underline;text-decoration-color:var(--gp-beak);text-decoration-thickness:2px;text-underline-offset:.45em}
header .wp-block-navigation .wp-block-navigation__submenu-container{background:var(--gp-paper)!important;border:1px solid var(--gp-line)!important;border-radius:6px;padding:.5rem!important;box-shadow:0 12px 32px -8px rgba(14,57,64,.16);min-width:15rem!important}
header .wp-block-navigation .wp-block-navigation__submenu-container .wp-block-navigation-item__content{padding:.55rem .75rem!important;border-radius:var(--gp-radius)}
header .wp-block-navigation .wp-block-navigation__submenu-container a:hover{background:var(--gp-mist);text-decoration:none}
header .wp-block-navigation__submenu-icon svg{stroke:var(--gp-muted)}
header .wp-block-navigation__responsive-container-open{padding:10px;margin:-10px;color:var(--gp-ink)}
header .wp-block-navigation__responsive-container.is-menu-open{background:var(--gp-paper)!important;color:var(--gp-text)!important;padding:1.25rem var(--gp-pad) 2rem!important}
header .wp-block-navigation__responsive-container.is-menu-open .wp-block-navigation__responsive-container-content{padding-top:3.5rem;align-items:flex-start;gap:0}
header .wp-block-navigation__responsive-container.is-menu-open .wp-block-navigation__container{gap:0;width:100%;align-items:stretch}
header .wp-block-navigation__responsive-container.is-menu-open .wp-block-navigation-item{width:100%;border-bottom:1px solid var(--gp-line);align-items:flex-start}
header .wp-block-navigation__responsive-container.is-menu-open .wp-block-navigation-item__content{font-size:1.125rem;padding:.8rem 0!important}
header .wp-block-navigation__responsive-container.is-menu-open .wp-block-navigation__submenu-container{border:0!important;box-shadow:none;padding:0 0 .6rem 1rem!important;min-width:0!important;background:transparent!important}
header .wp-block-navigation__responsive-container.is-menu-open .wp-block-navigation__submenu-container .wp-block-navigation-item{border:0}
header .wp-block-navigation__responsive-container.is-menu-open .wp-block-navigation__submenu-container .wp-block-navigation-item__content{font-size:1rem;color:var(--gp-muted);padding:.5rem 0!important}
header .wp-block-navigation__responsive-container-close{padding:10px;margin:-10px}
header .wp-block-navigation__responsive-container.is-menu-open :is(.wp-block-navigation__responsive-container-content,.wp-block-navigation__container,.wp-block-navigation-item,.wp-block-navigation__submenu-container){align-items:flex-start!important;text-align:left;justify-content:flex-start}
header.wp-block-template-part :focus-visible{outline:2px solid var(--gp-focus)!important;outline-offset:2px}
header.wp-block-template-part :focus:not(:focus-visible){outline:none}

/* Language row (printed by snippets/seo-head.php before the content) */
.grohnpetrel-lang{box-sizing:border-box;max-width:var(--gp-content);margin:1.5rem auto 0!important;padding:0 0 .7rem;border-bottom:1px solid var(--gp-line);text-align:right;font-size:.8125rem;color:var(--gp-muted);line-height:1.6}
.grohnpetrel-lang a{color:var(--gp-teal);text-decoration-color:rgba(18,78,90,.3)}
.page-template-page-no-title .grohnpetrel-lang{max-width:var(--gp-wide);margin:0 auto!important;padding:.55rem 0;border-bottom:0}

/* Page masthead on templates with a title */
main.wp-block-group:has(>.wp-block-group .wp-block-post-title){margin-top:0!important}
main>.wp-block-group:has(.wp-block-post-title){padding-top:clamp(2.5rem,6vw,5rem)!important;padding-bottom:var(--gp-section)!important}
main .wp-block-post-title{margin-top:.5rem!important}

/* ---------- Buttons ---------- */
.wp-element-button,.wp-block-button__link{display:inline-flex;align-items:center;justify-content:center;gap:.5em;min-height:44px;box-sizing:border-box;background-color:var(--gp-teal)!important;color:#fff!important;border:1.5px solid var(--gp-teal);border-radius:6px;padding:.7em 1.3em;font-family:var(--gp-sans);font-size:.9375rem;font-weight:600;letter-spacing:.005em;line-height:1.25;text-decoration:none;transition:background-color .15s,border-color .15s,color .15s}
.wp-element-button:hover,.wp-block-button__link:hover{background-color:var(--gp-ink)!important;border-color:var(--gp-ink);color:#fff!important}
.is-style-outline .wp-block-button__link{background-color:transparent!important;color:var(--gp-teal)!important;border-color:var(--gp-teal)}
.is-style-outline .wp-block-button__link:hover{background-color:var(--gp-teal)!important;color:#fff!important}
.wp-block-buttons{gap:.75rem}

/* ---------- Tables: set like reference tables ---------- */
.wp-block-table{overflow-x:auto}
.wp-block-table table{border-collapse:collapse;background:transparent;border-radius:0;font-size:.9375rem;font-variant-numeric:tabular-nums lining-nums;border-top:2px solid var(--gp-ink)}
.wp-block-table thead{border-bottom:0}
.wp-block-table th{background:transparent;color:var(--gp-ink);text-align:left;font-weight:700;font-size:.8125rem;letter-spacing:.02em;vertical-align:bottom}
.wp-block-table th,.wp-block-table td{border:0;border-bottom:1px solid var(--gp-line);padding:.75em 1.1em .75em 0;line-height:1.5}
.wp-block-table thead th{border-bottom:1px solid var(--gp-ink)}
.wp-block-table:not(:has(tr>:nth-child(3))) td:first-child{font-weight:600;color:var(--gp-ink)}
/* data tables with four or more columns get a wider measure than prose */
.wp-block-post-content>.wp-block-table:has(tr>:nth-child(4)){max-width:min(100%,58rem)}
.wp-block-table :where(th,td):last-child{padding-right:0}
.wp-block-table.is-style-stripes{border-bottom:0}
.wp-block-table.is-style-stripes tbody tr:nth-child(odd){background:transparent}
.wp-block-table figcaption{margin-top:.75rem}

/* ---------- "In brief" and other boxed groups ---------- */
.wp-block-group[style*="border-left-color:#d8794b"]{background-color:var(--gp-mist)!important;border-left:0!important;border-radius:var(--gp-radius);padding:1.4rem 1.6rem!important;font-size:1.0625rem}
.wp-block-group[style*="border-left-color:#d8794b"] strong:first-child{color:var(--gp-beak-ink)}
.wp-block-group[style*="border-left-color:#d8794b"]>*{margin-top:0}
.wp-block-group[style*="border-left-color:#d8794b"]>*+*{margin-top:.75rem}

/* ---------- Images and media ---------- */
.wp-block-image img{border-radius:2px}
.gp-media .wp-block-media-text__media img{border-radius:2px}
.gp-media.wp-block-media-text{gap:0}
.gp-media .wp-block-media-text__content{padding:0 0 0 clamp(1.5rem,5vw,4.5rem)}
.gp-media.has-media-on-the-right .wp-block-media-text__content{padding:0 clamp(1.5rem,5vw,4.5rem) 0 0}
.gp-media .wp-block-media-text__content>:first-child{margin-top:0}
.gp-section>.gp-media+*{margin-top:clamp(3rem,6vw,4.5rem)!important}
.gp-credit{font-size:.75rem!important;line-height:1.5;color:var(--gp-muted)!important;max-width:var(--gp-wide);margin:.6rem auto 0!important;padding:0}
.gp-credit a{color:inherit}
/* the photo credit under the closing banner joins the footer band instead of floating on white */
.gp-banner+.gp-credit{margin-top:0!important;padding:.9rem 0;background:var(--gp-ink);box-shadow:0 0 0 100vmax var(--gp-ink);clip-path:inset(0 -100vmax);color:var(--gp-on-dark-muted)!important;border-bottom:1px solid rgba(255,255,255,.12)}
.gp-banner+.gp-credit a{color:var(--gp-on-dark);text-decoration-color:rgba(255,255,255,.3)}

/* ---------- Page sections (full-width bands) ---------- */
.gp-section{padding:var(--gp-section) var(--gp-pad)!important;margin-top:0!important;margin-bottom:0!important}
.gp-bg-white{background:var(--gp-paper)}.gp-bg-foam{background:var(--gp-mist)}.gp-bg-sand{background:var(--gp-tide)}.gp-bg-ivory{background:var(--gp-paper)}
.gp-section>*{margin-left:auto;margin-right:auto}
.gp-section+.gp-section.gp-bg-white,.gp-section.gp-bg-white+.gp-section{border-top:0}
.gp-kicker{font-family:var(--gp-sans);font-size:.75rem!important;font-weight:700;letter-spacing:.14em;text-transform:uppercase;line-height:1.4;color:var(--gp-beak-ink)!important;margin-bottom:0!important}
.gp-kicker+h1,.gp-kicker+h2{margin-top:.75rem!important}
.gp-section h2.wp-block-heading+*{margin-top:1.1rem}
.gp-lead{font-size:clamp(1.0625rem,1rem + .35vw,1.25rem);line-height:1.6;color:var(--gp-text)}
.gp-section>.gp-measure{max-width:40rem;margin-left:max(0px,calc((100% - var(--gp-wide))/2))!important;margin-right:auto!important}
.gp-section>.wp-block-heading+.gp-grid,.gp-section>.gp-measure+.gp-grid{margin-top:clamp(2rem,4vw,3rem)!important}
.gp-note{font-size:.8125rem!important;line-height:1.55;color:var(--gp-muted)}

/* ---------- Hero and closing banner (cover blocks) ---------- */
.gp-hero,.gp-banner{margin-top:0!important;margin-bottom:0!important;padding-left:0!important;padding-right:0!important}
.gp-hero{min-height:min(84vh,780px)!important;padding-top:clamp(4rem,10vw,7rem)!important;padding-bottom:clamp(3.5rem,8vw,6rem)!important}
.gp-banner{min-height:0!important;padding-top:var(--gp-section)!important;padding-bottom:var(--gp-section)!important}
.gp-hero .wp-block-cover__inner-container,.gp-banner .wp-block-cover__inner-container{max-width:none!important;width:100%;margin:0!important;box-sizing:border-box;padding-left:max(var(--gp-pad),calc((100% - var(--gp-wide))/2))!important;padding-right:var(--gp-pad)!important}
.gp-hero .wp-block-cover__inner-container>*,.gp-banner .wp-block-cover__inner-container>*{margin-left:0!important;margin-right:0!important;max-width:42rem}
.gp-hero .wp-block-cover__background,.gp-banner .wp-block-cover__background{background:linear-gradient(90deg,rgba(14,57,64,.95) 0%,rgba(14,57,64,.9) 38%,rgba(14,57,64,.55) 68%,rgba(14,57,64,.2) 100%)!important;opacity:1!important}
.gp-banner .wp-block-cover__background{background:linear-gradient(90deg,rgba(14,57,64,.96) 0%,rgba(14,57,64,.9) 50%,rgba(14,57,64,.62) 100%)!important}
.gp-hero h1,.gp-hero h2,.gp-hero p,.gp-banner h2,.gp-banner p{color:#fff!important}
.gp-hero h1{font-size:clamp(2.5rem,1.45rem + 3.9vw,4.5rem);line-height:1.02;letter-spacing:-.024em;text-shadow:none}
.gp-hero .wp-block-cover__inner-container>h1{max-width:11.5em}
.gp-banner h2{max-width:20ch}
.gp-hero .gp-kicker,.gp-banner .gp-kicker{color:#F0C9B6!important}
.gp-hero .gp-lead,.gp-banner p:not(.gp-note):not(.gp-kicker){max-width:38rem;font-size:clamp(1.0625rem,1rem + .4vw,1.25rem);line-height:1.6;color:#E3EEEA!important}
.gp-hero .wp-block-buttons,.gp-banner .wp-block-buttons{margin-top:2rem!important}
.gp-hero .wp-block-button__link,.gp-banner .wp-block-button__link{background-color:#fff!important;border-color:#fff;color:var(--gp-ink)!important}
.gp-hero .wp-block-button__link:hover,.gp-banner .wp-block-button__link:hover{background-color:var(--gp-mist)!important;border-color:var(--gp-mist);color:var(--gp-ink)!important}
.gp-hero .is-style-outline .wp-block-button__link,.gp-banner .is-style-outline .wp-block-button__link{background-color:transparent!important;border-color:rgba(255,255,255,.7);color:#fff!important}
.gp-hero .is-style-outline .wp-block-button__link:hover,.gp-banner .is-style-outline .wp-block-button__link:hover{background-color:#fff!important;border-color:#fff;color:var(--gp-ink)!important}
.gp-hero .gp-note,.gp-banner .gp-note{color:var(--gp-on-dark)!important;margin-top:1.75rem!important;padding-top:1rem;border-top:1px solid rgba(255,255,255,.18);max-width:38rem}
.gp-hero :focus-visible,.gp-banner :focus-visible,footer.wp-block-template-part :focus-visible{outline-color:#fff}

/* ---------- Ruled entries (formerly cards) ---------- */
.gp-grid{display:grid!important;grid-template-columns:repeat(3,minmax(0,1fr))!important;gap:clamp(2rem,4vw,3rem) clamp(1.75rem,3.5vw,3rem)!important}
.gp-grid-4{grid-template-columns:repeat(4,minmax(0,1fr))!important;gap:clamp(2rem,4vw,3rem) clamp(1.5rem,2.5vw,2.25rem)!important;margin-top:clamp(2rem,4vw,3rem)!important;margin-bottom:clamp(1.5rem,3vw,2.25rem)!important}
.gp-card{background:transparent;border:0;border-top:1px solid var(--gp-line-strong);border-radius:0;padding:1.4rem 0 0!important;box-shadow:none;display:flex;flex-direction:column;height:100%;box-sizing:border-box}
.gp-card>*{margin-top:0}
.gp-card>*+*{margin-top:.7rem}
.gp-card h3{margin-bottom:0;font-size:clamp(1.1875rem,1.1rem + .35vw,1.375rem)!important}
.gp-card p{font-size:.9688rem;line-height:1.6}
.gp-card .wp-block-buttons{margin-top:auto!important;padding-top:.75rem}
.gp-card .wp-block-button__link,.gp-card .is-style-outline .wp-block-button__link{background:transparent!important;border:0;border-radius:0;padding:.6rem 0;min-height:44px;color:var(--gp-teal)!important;font-size:.9375rem;font-weight:700;text-align:left;justify-content:flex-start}
.gp-card .wp-block-button__link::after{content:"";flex:0 0 auto;width:1.05em;height:1.05em;background:var(--gp-beak);-webkit-mask:var(--gp-arrow) center/contain no-repeat;mask:var(--gp-arrow) center/contain no-repeat;transition:transform .2s cubic-bezier(.2,.7,.2,1)}
.gp-card .wp-block-button__link:hover{background:transparent!important;color:var(--gp-ink)!important}
.gp-card .wp-block-button__link:hover::after{transform:translateX(3px)}
.gp-card .gp-num{font-family:var(--gp-serif);color:var(--gp-beak);font-size:2.25rem!important;font-weight:400;line-height:1;margin:0 0 .4rem!important;font-variant-numeric:lining-nums}
.gp-grid-4 .gp-card{padding:1.25rem 0 0!important}

/* Icons above entry headings: a plain line icon, no tile */
.gp-ico{position:relative}
.gp-ico::before{content:"";display:block;width:1.75rem;height:1.75rem;margin-bottom:1rem;background:var(--gp-teal);-webkit-mask:var(--gp-i) center/contain no-repeat;mask:var(--gp-i) center/contain no-repeat}
.gp-ico::after{content:none}
.gp-ico-bird{--gp-i:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='black' stroke-width='1.6' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M2 10c3.5 0 6.5 1.6 10 5.5 3.5-3.9 6.5-5.5 10-5.5'/%3E%3Cpath d='M12 15.5V19'/%3E%3Ccircle cx='12' cy='7' r='1.6'/%3E%3C/svg%3E")}
.gp-ico-alert{--gp-i:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='black' stroke-width='1.6' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M12 3 22 20H2z'/%3E%3Cpath d='M12 10v4.5'/%3E%3Cpath d='M12 17.5h.01'/%3E%3C/svg%3E")}
.gp-ico-shield{--gp-i:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='black' stroke-width='1.6' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M12 3 20 6v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6z'/%3E%3Cpath d='m8.5 12.5 2.5 2.5 4.5-5'/%3E%3C/svg%3E")}
.gp-ico-compass{--gp-i:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='black' stroke-width='1.6' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='12' cy='12' r='9'/%3E%3Cpath d='m15.5 8.5-2 5-5 2 2-5z'/%3E%3C/svg%3E")}
.gp-ico-cap{--gp-i:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='black' stroke-width='1.6' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M2 9l10-5 10 5-10 5z'/%3E%3Cpath d='M6 11v5c3.5 2.5 8.5 2.5 12 0v-5'/%3E%3C/svg%3E")}
.gp-ico-book{--gp-i:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='black' stroke-width='1.6' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M3 5c3-1 6-1 9 1 3-2 6-2 9-1v14c-3-1-6-1-9 1-3-2-6-2-9-1z'/%3E%3Cpath d='M12 6v14'/%3E%3C/svg%3E")}
.gp-ico-question{--gp-i:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='black' stroke-width='1.6' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='12' cy='12' r='9'/%3E%3Cpath d='M9.5 9.5a2.5 2.5 0 1 1 3.4 2.3c-.6.3-.9.8-.9 1.5v.7'/%3E%3Cpath d='M12 17h.01'/%3E%3C/svg%3E")}
.gp-ico-people{--gp-i:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='black' stroke-width='1.6' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='9' cy='8' r='3'/%3E%3Cpath d='M3 20c0-3.3 2.7-5.5 6-5.5s6 2.2 6 5.5'/%3E%3Cpath d='M16 5.2a3 3 0 0 1 0 5.6'/%3E%3Cpath d='M18.5 14.8c1.6.8 2.5 2.4 2.5 4.2'/%3E%3C/svg%3E")}

/* Species and habitat plates: photo, name, Latin name, facts */
.gp-species{padding:0!important;border-top:0;overflow:visible}
.gp-species>*{padding-left:0;padding-right:0}
.gp-species>.wp-block-image{padding:0;margin:0!important}
.gp-species .wp-block-image img{width:100%;aspect-ratio:3/2;object-fit:cover;display:block;border-radius:2px}
.gp-species .wp-block-image figcaption{font-size:.6875rem;line-height:1.4;color:var(--gp-muted);margin:.5rem 0 0;text-align:left}
.gp-species h3{font-size:1.375rem!important;margin-top:1.1rem!important;padding-top:1rem;border-top:1px solid var(--gp-line-strong)}
.gp-species h3 a{text-decoration:none;color:var(--gp-ink)}
.gp-species h3 a:hover{color:var(--gp-teal);text-decoration:underline;text-decoration-color:var(--gp-beak)}
.gp-species__latin{font-size:.875rem;color:var(--gp-muted);margin-top:.2rem!important;font-style:italic}
.gp-species p{font-size:.9375rem!important;line-height:1.6}
.gp-species__facts{list-style:none;padding-left:0!important;font-size:.875rem!important;line-height:1.5}
.gp-species__facts li{margin:0;padding:.45rem 0;border-top:1px solid var(--gp-line)}
.gp-species__facts li:last-child{border-bottom:1px solid var(--gp-line)}
.gp-species__links{font-size:.875rem;margin-top:auto!important;padding-top:.8rem;padding-bottom:0}

/* ---------- Video ---------- */
.gp-video{max-width:340px;margin-left:auto!important;margin-right:auto!important}
.gp-video video{width:100%;aspect-ratio:9/16;border-radius:var(--gp-radius);background:var(--gp-ink);display:block}
.gp-video figcaption{text-align:left}
.gp-video-split{max-width:var(--gp-wide)!important;gap:clamp(2rem,6vw,6rem)!important}
.gp-video-split .gp-video{max-width:320px;margin-right:0!important}
.gp-video-grid .gp-video{max-width:100%}
.gp-video-card h3{font-size:1.1875rem!important;min-height:2.5em}
.gp-video-card .gp-transcript{margin-top:.5rem}
.gp-transcript{background:transparent;border:0;border-top:1px solid var(--gp-line);border-bottom:1px solid var(--gp-line);border-radius:0;padding:0}
.gp-transcript summary{cursor:pointer;font-weight:700;font-size:.9375rem;color:var(--gp-teal);padding:.75rem 0;min-height:44px;box-sizing:border-box;display:flex;align-items:center;gap:.5rem;list-style:none}
.gp-transcript summary::-webkit-details-marker{display:none}
.gp-transcript summary::before{content:"";flex:0 0 auto;width:.8rem;height:.8rem;background:var(--gp-beak);-webkit-mask:var(--gp-arrow) center/contain no-repeat;mask:var(--gp-arrow) center/contain no-repeat;transform:rotate(90deg);transition:transform .2s}
.gp-transcript:not([open]) summary::before{transform:none}
.gp-transcript p{font-size:.9375rem;padding-bottom:.25rem}
.wp-block-details:not(.gp-transcript) summary{cursor:pointer;font-weight:700;color:var(--gp-ink)}

/* ---------- Lists and sequences ---------- */
.gp-list{list-style:none;padding-left:0!important;border-bottom:1px solid var(--gp-line)}
.gp-list li{background:transparent;border:0;border-top:1px solid var(--gp-line);border-radius:0;padding:1rem 0;margin:0;color:var(--gp-muted);font-size:.9375rem}
.gp-list li a{font-family:var(--gp-serif);font-size:1.1875rem;font-weight:500;line-height:1.35;color:var(--gp-ink);text-decoration:none;margin-right:.35rem}
.gp-list li a:hover{color:var(--gp-teal);text-decoration:underline;text-decoration-color:var(--gp-beak)}
.gp-steps{list-style:none;padding-left:0!important;counter-reset:gp-step;border-bottom:1px solid var(--gp-line)}
.gp-steps li{counter-increment:gp-step;position:relative;background:transparent;border:0;border-top:1px solid var(--gp-line);border-radius:0;padding:1.4rem 0 1.4rem 4rem;margin:0;box-shadow:none;font-size:1.0313rem;line-height:1.6}
.gp-steps li::before{content:counter(gp-step);position:absolute;left:0;top:1.15rem;width:auto;height:auto;border-radius:0;background:none;color:var(--gp-beak);font-family:var(--gp-serif);font-size:2.25rem;font-weight:400;line-height:1;display:block;font-variant-numeric:lining-nums}
.gp-steps li strong{display:block;color:var(--gp-ink);font-family:var(--gp-serif);font-weight:550;font-size:1.25rem;margin-bottom:.3rem}
.gp-timeline{list-style:none;padding-left:0!important;border-left:1px solid var(--gp-line-strong);margin-left:.3rem}
.gp-timeline li{position:relative;padding:0 0 1.4rem 1.6rem;margin:0}
.gp-timeline li::before{content:"";position:absolute;left:-5px;top:.5em;width:9px;height:9px;border-radius:50%;background:var(--gp-teal);box-shadow:0 0 0 3px var(--gp-paper)}
.gp-timeline li strong{color:var(--gp-beak-ink);display:block;font-size:.75rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;margin-bottom:.15rem}
.gp-topics{margin-top:1.5rem!important;margin-bottom:2.25rem!important}
.gp-topic-links{padding-left:1.1rem!important;margin:0}
.gp-topic-links li{margin:.3rem 0}
.gp-about-media{margin-bottom:.4rem!important}
.gp-about-media .wp-block-media-text__content p{margin-top:0}
.gp-about-media+.gp-credit{max-width:var(--gp-content);padding:0}
.gp-jump{box-sizing:border-box;background:var(--gp-mist);border:0;border-radius:var(--gp-radius);padding:.8rem 1.1rem;font-size:.875rem;line-height:1.9}

/* ---------- Journal: latest posts ---------- */
.wp-block-latest-posts.wp-block-latest-posts__list{padding-left:0;border-bottom:1px solid var(--gp-line)}
.wp-block-latest-posts__list li{margin:0!important;padding:1.4rem 0 1.5rem;border-top:1px solid var(--gp-line)}
.wp-block-latest-posts__post-title{display:block;font-family:var(--gp-serif);font-size:clamp(1.25rem,1.15rem + .45vw,1.5rem);font-weight:500;line-height:1.25;letter-spacing:-.01em;color:var(--gp-ink);text-decoration:none;text-wrap:balance}
.wp-block-latest-posts__post-title:hover{color:var(--gp-teal);text-decoration:underline;text-decoration-color:var(--gp-beak)}
.wp-block-latest-posts__post-date{display:block;margin-top:.35rem;font-size:.8125rem;color:var(--gp-muted);font-variant-numeric:tabular-nums}
.wp-block-latest-posts__post-excerpt{margin-top:.6rem;font-size:.9688rem;line-height:1.6;color:var(--gp-text)}
.wp-block-latest-posts__post-excerpt a{font-weight:600}

/* ---------- Continue exploring and About this page (printed by seo-head.php) ---------- */
.gp-continue{max-width:var(--gp-content);margin:clamp(3rem,6vw,4.5rem) auto 0;padding:0;border-radius:0;background:transparent}
.gp-continue__title{font-family:var(--gp-serif);font-weight:500;color:var(--gp-ink);font-size:1.5rem;letter-spacing:-.01em;margin:0 0 1rem!important}
.gp-continue li{margin:0!important}
.gp-continue ul{list-style:none;margin:0;padding:0;align-items:start;display:grid;grid-template-columns:repeat(auto-fit,minmax(12.5rem,1fr));gap:0 1.75rem}
.gp-continue li a{display:flex;align-items:flex-start;justify-content:space-between;gap:1rem;height:100%;box-sizing:border-box;background:transparent;border:0;border-top:1px solid var(--gp-ink);border-radius:0;padding:.9rem 0 1.1rem;text-decoration:none;color:var(--gp-ink);font-weight:600;font-size:.9688rem;line-height:1.4}
.gp-continue li a::after{content:"";flex:0 0 auto;width:1.1rem;height:1.1rem;margin-top:.1rem;background:var(--gp-beak);-webkit-mask:var(--gp-arrow) center/contain no-repeat;mask:var(--gp-arrow) center/contain no-repeat;transition:transform .2s cubic-bezier(.2,.7,.2,1)}
.gp-continue li a:hover,.gp-continue li a:focus-visible{color:var(--gp-teal);border-color:var(--gp-beak)}
.gp-continue li a:hover::after{transform:translateX(3px)}
.gp-page-info{max-width:var(--gp-content);margin:clamp(2.5rem,5vw,3.5rem) auto 0;padding:1.25rem 0 0;border:0;border-top:1px solid var(--gp-line);border-radius:0;background:transparent;font-size:.8125rem;color:var(--gp-muted)}
.gp-page-info p{margin:.25rem 0!important;line-height:1.6}
.gp-page-info .gp-page-info__title{font-family:var(--gp-sans);font-weight:700;color:var(--gp-ink);font-size:.8125rem;margin-bottom:.4rem!important}
.gp-page-info a{color:var(--gp-teal)}

/* ---------- Breadcrumbs, fact panels, flow diagrams, learn-more links ---------- */
.gp-breadcrumbs{font-size:.8125rem;line-height:1.5;color:var(--gp-muted);margin-bottom:.25rem!important}
.gp-breadcrumbs ol{list-style:none;margin:0;padding:0;display:flex;flex-wrap:wrap;gap:.15rem .5rem}
.gp-breadcrumbs li{margin:0}
.gp-breadcrumbs li+li::before{content:"/";color:var(--gp-line-strong);margin-right:.5rem}
.gp-breadcrumbs a{color:var(--gp-teal);text-decoration-color:rgba(18,78,90,.3)}
.gp-breadcrumbs [aria-current]{color:var(--gp-muted)}
.gp-factpanel{box-sizing:border-box;max-width:var(--gp-content);background:var(--gp-mist);border:0;border-radius:var(--gp-radius);padding:1.5rem 1.6rem 1.3rem!important;margin:1.75rem auto 2.25rem!important;box-shadow:none}
.gp-factpanel h3{margin:0 0 1rem!important}
.gp-factpanel__source{font-size:.8125rem!important;color:var(--gp-muted);margin-top:1rem!important;margin-bottom:0!important}
.gp-facts{list-style:none;padding:0!important;margin:0!important;display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:1.25rem 1.75rem}
.gp-facts li{font-size:.9375rem;line-height:1.55;margin:0;padding:.8rem 0 0;border:0;border-top:1px solid var(--gp-line-strong)}
.gp-facts strong{display:block;font-family:var(--gp-serif);font-weight:500;color:var(--gp-ink);font-size:1.5rem;line-height:1.15;margin-bottom:.2rem;font-variant-numeric:lining-nums}
.gp-flow-wrap{margin-top:1.5rem!important;margin-bottom:2.25rem!important}
.gp-flow{list-style:none;padding:0!important;margin:0!important;display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:1.75rem}
.gp-flow li{position:relative;background:transparent;border:0;border-top:2px solid var(--gp-ink);border-radius:0;padding:1rem 0 0;box-shadow:none;font-size:.9375rem;line-height:1.55;margin:0}
.gp-flow li:not(:last-child)::after{content:"";position:absolute;right:-1.45rem;top:-.6rem;width:1.1rem;height:1.1rem;background:var(--gp-beak);-webkit-mask:var(--gp-arrow) center/contain no-repeat;mask:var(--gp-arrow) center/contain no-repeat;transform:none;left:auto;bottom:auto}
.gp-flow strong{display:block;font-family:var(--gp-serif);font-weight:550;color:var(--gp-ink);font-size:1.125rem;line-height:1.3;margin:.2rem 0 .35rem}
.gp-flow svg{width:1.75rem;height:1.75rem;display:block;margin-bottom:.75rem;padding:0;border-radius:0;background:none;color:var(--gp-teal);box-sizing:border-box}
.gp-flow__caption{font-size:.8125rem!important;color:var(--gp-muted);margin-top:.9rem!important}
.gp-flow__step{display:block;font-size:.75rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--gp-beak-ink)}
.gp-habitats{margin-top:2rem!important;margin-bottom:2.5rem!important}
.gp-learn{list-style:none;padding:0!important;display:grid;grid-template-columns:repeat(auto-fit,minmax(13rem,1fr));gap:0 1.75rem}
.gp-learn li{margin:0}
.gp-learn a{display:block;height:100%;box-sizing:border-box;background:transparent;border:0;border-top:1px solid var(--gp-line-strong);border-radius:0;padding:.85rem 0 1rem;text-decoration:none;color:var(--gp-text);font-size:.9375rem;line-height:1.5}
.gp-learn a strong{display:block;color:var(--gp-ink);font-size:1rem}
.gp-learn a:hover,.gp-learn a:focus-visible{border-color:var(--gp-beak)}
.gp-learn a:hover strong{color:var(--gp-teal)}

/* ---------- Social links: one quiet style, no platform colours ---------- */
.gp-connect .gp-social{margin-top:1.5rem!important;margin-bottom:1.25rem!important}
.gp-follow{margin-bottom:.4rem!important}
.gp-social{gap:.6rem!important}
.gp-social .wp-social-link{background:transparent!important;color:var(--gp-teal)!important;border:1px solid var(--gp-line-strong);border-radius:6px!important;transition:border-color .15s,background-color .15s}
.gp-social .wp-social-link a{color:inherit!important;padding:.55em 1em!important;min-height:44px;box-sizing:border-box;gap:.5em;text-decoration:none}
.gp-social .wp-social-link-label{font-size:.875rem!important;font-weight:600;padding-inline-start:0!important}
.gp-social .wp-social-link svg{fill:currentColor;width:1.1rem;height:1.1rem}
.gp-social .wp-social-link:hover{border-color:var(--gp-teal);background:var(--gp-paper)!important;transform:none}

/* ---------- Footer ---------- */
footer.wp-block-template-part{margin-top:0!important}
footer.wp-block-template-part>.has-background{background-color:var(--gp-ink)!important;color:var(--gp-on-dark)!important;padding:clamp(3.5rem,7vw,5.5rem) var(--gp-pad) 2rem!important;font-size:.9375rem}
footer.wp-block-template-part .wp-block-columns{max-width:var(--gp-wide);margin-left:auto;margin-right:auto;gap:clamp(2rem,5vw,4.5rem)}
footer.wp-block-template-part .wp-block-columns>.wp-block-column:first-child{flex-basis:44%!important;flex-grow:0}
footer.wp-block-template-part p,footer.wp-block-template-part li{color:var(--gp-on-dark)}
footer.wp-block-template-part a{color:#fff;text-decoration-color:rgba(255,255,255,.35)}
footer.wp-block-template-part a:hover{color:#fff;text-decoration-color:var(--gp-beak)}
footer.wp-block-template-part .wp-block-column:first-child>p:first-child{font-family:var(--gp-serif);font-size:1.375rem!important;font-weight:600!important;letter-spacing:.08em!important;line-height:1.1;margin-bottom:1.1rem}
footer.wp-block-template-part .wp-block-column:first-child>p:first-child a{text-decoration:none;color:#fff}
footer.wp-block-template-part h2{font-family:var(--gp-sans);font-size:.75rem!important;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--gp-on-dark-muted)!important;margin-bottom:1rem}
footer.wp-block-template-part .wp-block-navigation{font-size:.9375rem}
footer.wp-block-template-part .wp-block-navigation a{text-decoration:none;color:#fff}
footer.wp-block-template-part .wp-block-navigation a:hover{text-decoration:underline;text-decoration-color:var(--gp-beak);text-underline-offset:.3em}
footer.wp-block-template-part .wp-block-navigation__container{gap:.55rem!important}
footer.wp-block-template-part .gp-footer-langs,footer.wp-block-template-part .gp-footer-social{margin-top:1.5rem;font-size:.875rem;line-height:1.9}
footer.wp-block-template-part .gp-footer-social{margin-top:1rem}
footer.wp-block-template-part .gp-footer-langs a,footer.wp-block-template-part .gp-footer-social a{color:#fff;text-decoration:underline;text-decoration-color:rgba(255,255,255,.35);text-underline-offset:.2em}
footer.wp-block-template-part .gp-footer-langs [aria-current]{font-weight:700}
.gp-footer-langs__label{display:block;font-family:var(--gp-sans);font-size:.75rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--gp-on-dark-muted);margin-bottom:.2rem}
footer.wp-block-template-part hr.wp-block-separator{max-width:var(--gp-wide);margin:clamp(2.5rem,5vw,3.5rem) auto 1.25rem!important;border-top:1px solid rgba(255,255,255,.16)!important;background:none!important;color:transparent!important;height:0}
footer.wp-block-template-part>.has-background>p:last-child{max-width:var(--gp-wide);margin-left:auto;margin-right:auto;font-size:.8125rem!important;line-height:1.6;color:var(--gp-on-dark-muted)}

/* ---------- Languages without Latin glyphs in Platypi ---------- */
:lang(ru) :is(h1,h2,h3,h4,.wp-block-post-title,.wp-block-heading,.gp-num,.gp-continue__title){font-family:Georgia,"Times New Roman",serif;font-weight:400;letter-spacing:-.015em}
:lang(zh) body,:lang(zh) :is(h1,h2,h3,h4,.wp-block-heading,.wp-block-post-title,.gp-continue__title){font-family:"PingFang SC","Hiragino Sans GB","Noto Sans SC","Microsoft YaHei",sans-serif;letter-spacing:0}
:lang(zh) :is(h1,h2,h3,.wp-block-heading){font-weight:600}
:lang(zh) .gp-kicker{letter-spacing:.05em}
:lang(zh) :is(.grohnpetrel-lang,.gp-footer-langs) a:not(:lang(zh)){font-family:var(--gp-sans)}

/* ---------- Responsive ---------- */
@media (max-width:1000px){
	.gp-grid{grid-template-columns:repeat(2,minmax(0,1fr))!important}
	.gp-flow{grid-template-columns:repeat(2,minmax(0,1fr));gap:1.75rem 2.25rem}
	.gp-flow li:nth-child(2n)::after{display:none}
}
@media (max-width:781px){
	.gp-grid-4{grid-template-columns:repeat(2,minmax(0,1fr))!important}
	.gp-media .wp-block-media-text__media img[src*="grohnpetrel-logo"]{max-width:16rem}
	.gp-video-split .gp-video{margin-left:0!important;margin-right:auto!important}
	.gp-hero .wp-block-cover__background,.gp-banner .wp-block-cover__background{background:linear-gradient(180deg,rgba(14,57,64,.78) 0%,rgba(14,57,64,.92) 55%,rgba(14,57,64,.96) 100%)!important}
	.gp-hero{min-height:0!important}
	.gp-media .wp-block-media-text__content,.gp-media.has-media-on-the-right .wp-block-media-text__content{padding:1.75rem 0 0!important}
	footer.wp-block-template-part .wp-block-columns>.wp-block-column:first-child{flex-basis:100%!important}
}
@media (max-width:600px){
	.gp-grid,.gp-grid-4{grid-template-columns:1fr!important}
	.gp-flow{grid-template-columns:1fr;gap:1.5rem}
	.gp-flow li::after{display:none!important}
	.gp-facts{grid-template-columns:1fr}
	.gp-steps li{padding-left:3rem}
	.gp-steps li::before{font-size:1.875rem}
	.wp-block-table table{font-size:.875rem}
	.wp-block-table th,.wp-block-table td{padding:.6em .8em .6em 0;hyphens:auto}
	.gp-hero .wp-block-buttons,.gp-banner .wp-block-buttons{flex-direction:column;align-items:stretch}
	.gp-hero .wp-block-button,.gp-banner .wp-block-button{width:100%}
	.gp-hero .wp-block-button__link,.gp-banner .wp-block-button__link{width:100%}
	h1,h2,.wp-block-post-title{hyphens:auto;overflow-wrap:break-word}
	.grohnpetrel-lang{text-align:left}
}
@media (prefers-reduced-motion:reduce){
	body *,body *::before,body *::after{transition:none!important;animation:none!important;scroll-behavior:auto!important}
}
</style>
	<?php
}, 20 );
