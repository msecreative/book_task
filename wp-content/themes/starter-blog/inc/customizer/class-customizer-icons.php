<?php

class StarterBlog_Font_Icons {
	static $_instance;
	static $_icons;
	static $enqueued;
	private $picked_types = array();

	static function get_instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Get support icons
	 *
	 * @return array
	 */
	function get_icons() {
		if ( is_null( self::$_icons ) ) {
			$icons        = array(
				'font-awesome' => array(
					'name'         => __( 'FontAwesome', 'starter-blog' ),
					'icons'        => $this->get_font_awesome_icons(),
					'url'          => esc_url( get_template_directory_uri() ) . '/assets/fonts/font-awesome/css/font-awesome.min.css',
					'class_config' => 'fa __icon_name__', // __icon_name__ will replace by icon class name
				),
			);
			self::$_icons = apply_filters( 'starterblog/customizer/font_icons', $icons );
		}

		return self::$_icons;

	}

	function is_used() {
		if ( is_customize_preview() ) {
			return true;
		}
		$check = apply_filters( 'starterblog/load-icons', true );
		if ( is_null( $check ) ) {
			$builders = array( 'header_builder_panel', 'footer_builder_panel' );
			$list     = apply_filters( 'starterblog/icon_used', array() );

			foreach ( $builders as $setting_key ) {
				$data = StarterBlog()->get_setting( $setting_key );
				if ( is_array( $data ) ) {
					foreach ( $data as $devices => $rows ) {
						foreach ( (array) $rows as $row_id => $items ) {
							foreach ( (array) $items as $item ) {
								if ( is_array( $item ) ) {
									if ( isset( $list[ $item['id'] ] ) && $list[ $item['id'] ] ) {
										return true;
									}
								}
							}
						}
					}
				}
			}
		}

		return $check;
	}

	function enqueue() {
		if ( $this->is_used() ) {
			if ( is_null( self::$enqueued ) ) {
				foreach ( $this->get_icons() as $icon_id => $icon ) {
					wp_dequeue_style( $icon_id );
					wp_enqueue_style( $icon_id, $icon['url'], array(), '5.0.0' );
				}
				self::$enqueued = true;
			}
		}
	}

	/**
	 * Get FontAwesome icons
	 *
	 * @return array
	 */
	function get_font_awesome_icons() {
		$icons = array(
			0   => 'fa-glass',
			1   => 'fa-music',
			2   => 'fa-search',
			3   => 'fa-envelope-o',
			4   => 'fa-heart',
			5   => 'fa-star',
			6   => 'fa-star-o',
			7   => 'fa-user',
			8   => 'fa-film',
			9   => 'fa-th-large',
			10  => 'fa-th',
			11  => 'fa-th-list',
			12  => 'fa-check',
			13  => 'fa-remove',
			14  => 'fa-close',
			15  => 'fa-times',
			16  => 'fa-search-plus',
			17  => 'fa-search-minus',
			18  => 'fa-power-off',
			19  => 'fa-signal',
			20  => 'fa-gear',
			21  => 'fa-cog',
			22  => 'fa-trash-o',
			23  => 'fa-home',
			24  => 'fa-file-o',
			25  => 'fa-clock-o',
			26  => 'fa-road',
			27  => 'fa-download',
			28  => 'fa-arrow-circle-o-down',
			29  => 'fa-arrow-circle-o-up',
			30  => 'fa-inbox',
			31  => 'fa-play-circle-o',
			32  => 'fa-rotate-right',
			33  => 'fa-repeat',
			34  => 'fa-refresh',
			35  => 'fa-list-alt',
			36  => 'fa-lock',
			37  => 'fa-flag',
			38  => 'fa-headphones',
			39  => 'fa-volume-off',
			40  => 'fa-volume-down',
			41  => 'fa-volume-up',
			42  => 'fa-qrcode',
			43  => 'fa-barcode',
			44  => 'fa-tag',
			45  => 'fa-tags',
			46  => 'fa-book',
			47  => 'fa-bookmark',
			48  => 'fa-print',
			49  => 'fa-camera',
			50  => 'fa-font',
			51  => 'fa-bold',
			52  => 'fa-italic',
			53  => 'fa-text-height',
			54  => 'fa-text-width',
			55  => 'fa-align-left',
			56  => 'fa-align-center',
			57  => 'fa-align-right',
			58  => 'fa-align-justify',
			59  => 'fa-list',
			60  => 'fa-dedent',
			61  => 'fa-outdent',
			62  => 'fa-indent',
			63  => 'fa-video-camera',
			64  => 'fa-photo',
			65  => 'fa-image',
			66  => 'fa-picture-o',
			67  => 'fa-pencil',
			68  => 'fa-map-marker',
			69  => 'fa-adjust',
			70  => 'fa-tint',
			71  => 'fa-edit',
			72  => 'fa-pencil-square-o',
			73  => 'fa-share-square-o',
			74  => 'fa-check-square-o',
			75  => 'fa-arrows',
			76  => 'fa-step-backward',
			77  => 'fa-fast-backward',
			78  => 'fa-backward',
			79  => 'fa-play',
			80  => 'fa-pause',
			81  => 'fa-stop',
			82  => 'fa-forward',
			83  => 'fa-fast-forward',
			84  => 'fa-step-forward',
			85  => 'fa-eject',
			86  => 'fa-chevron-left',
			87  => 'fa-chevron-right',
			88  => 'fa-plus-circle',
			89  => 'fa-minus-circle',
			90  => 'fa-times-circle',
			91  => 'fa-check-circle',
			92  => 'fa-question-circle',
			93  => 'fa-info-circle',
			94  => 'fa-crosshairs',
			95  => 'fa-times-circle-o',
			96  => 'fa-check-circle-o',
			97  => 'fa-ban',
			98  => 'fa-arrow-left',
			99  => 'fa-arrow-right',
			100 => 'fa-arrow-up',
			101 => 'fa-arrow-down',
			102 => 'fa-mail-forward',
			103 => 'fa-share',
			104 => 'fa-expand',
			105 => 'fa-compress',
			106 => 'fa-plus',
			107 => 'fa-minus',
			108 => 'fa-asterisk',
			109 => 'fa-exclamation-circle',
			110 => 'fa-gift',
			111 => 'fa-leaf',
			112 => 'fa-fire',
			113 => 'fa-eye',
			114 => 'fa-eye-slash',
			115 => 'fa-warning',
			116 => 'fa-exclamation-triangle',
			117 => 'fa-plane',
			118 => 'fa-calendar',
			119 => 'fa-random',
			120 => 'fa-comment',
			121 => 'fa-magnet',
			122 => 'fa-chevron-up',
			123 => 'fa-chevron-down',
			124 => 'fa-retweet',
			125 => 'fa-shopping-cart',
			126 => 'fa-folder',
			127 => 'fa-folder-open',
			128 => 'fa-arrows-v',
			129 => 'fa-arrows-h',
			130 => 'fa-bar-chart-o',
			131 => 'fa-bar-chart',
			132 => 'fa-twitter-square',
			133 => 'fa-facebook-square',
			134 => 'fa-camera-retro',
			135 => 'fa-key',
			136 => 'fa-gears',
			137 => 'fa-cogs',
			138 => 'fa-comments',
			139 => 'fa-thumbs-o-up',
			140 => 'fa-thumbs-o-down',
			141 => 'fa-star-half',
			142 => 'fa-heart-o',
			143 => 'fa-sign-out',
			144 => 'fa-linkedin-square',
			145 => 'fa-thumb-tack',
			146 => 'fa-external-link',
			147 => 'fa-sign-in',
			148 => 'fa-trophy',
			149 => 'fa-github-square',
			150 => 'fa-upload',
			151 => 'fa-lemon-o',
			152 => 'fa-phone',
			153 => 'fa-square-o',
			154 => 'fa-bookmark-o',
			155 => 'fa-phone-square',
			156 => 'fa-twitter',
			157 => 'fa-facebook-f',
			158 => 'fa-facebook',
			159 => 'fa-github',
			160 => 'fa-unlock',
			161 => 'fa-credit-card',
			162 => 'fa-feed',
			163 => 'fa-rss',
			164 => 'fa-hdd-o',
			165 => 'fa-bullhorn',
			166 => 'fa-bell',
			167 => 'fa-certificate',
			168 => 'fa-hand-o-right',
			169 => 'fa-hand-o-left',
			170 => 'fa-hand-o-up',
			171 => 'fa-hand-o-down',
			172 => 'fa-arrow-circle-left',
			173 => 'fa-arrow-circle-right',
			174 => 'fa-arrow-circle-up',
			175 => 'fa-arrow-circle-down',
			176 => 'fa-globe',
			177 => 'fa-wrench',
			178 => 'fa-tasks',
			179 => 'fa-filter',
			180 => 'fa-briefcase',
			181 => 'fa-arrows-alt',
			182 => 'fa-group',
			183 => 'fa-users',
			184 => 'fa-chain',
			185 => 'fa-link',
			186 => 'fa-cloud',
			187 => 'fa-flask',
			188 => 'fa-cut',
			189 => 'fa-scissors',
			190 => 'fa-copy',
			191 => 'fa-files-o',
			192 => 'fa-paperclip',
			193 => 'fa-save',
			194 => 'fa-floppy-o',
			195 => 'fa-square',
			196 => 'fa-navicon',
			197 => 'fa-reorder',
			198 => 'fa-bars',
			199 => 'fa-list-ul',
			200 => 'fa-list-ol',
			201 => 'fa-strikethrough',
			202 => 'fa-underline',
			203 => 'fa-table',
			204 => 'fa-magic',
			205 => 'fa-truck',
			206 => 'fa-pinterest',
			207 => 'fa-pinterest-square',
			208 => 'fa-google-plus-square',
			209 => 'fa-google-plus',
			210 => 'fa-money',
			211 => 'fa-caret-down',
			212 => 'fa-caret-up',
			213 => 'fa-caret-left',
			214 => 'fa-caret-right',
			215 => 'fa-columns',
			216 => 'fa-unsorted',
			217 => 'fa-sort',
			218 => 'fa-sort-down',
			219 => 'fa-sort-desc',
			220 => 'fa-sort-up',
			221 => 'fa-sort-asc',
			222 => 'fa-envelope',
			223 => 'fa-linkedin',
			224 => 'fa-rotate-left',
			225 => 'fa-undo',
			226 => 'fa-legal',
			227 => 'fa-gavel',
			228 => 'fa-dashboard',
			229 => 'fa-tachometer',
			230 => 'fa-comment-o',
			231 => 'fa-comments-o',
			232 => 'fa-flash',
			233 => 'fa-bolt',
			234 => 'fa-sitemap',
			235 => 'fa-umbrella',
			236 => 'fa-paste',
			237 => 'fa-clipboard',
			238 => 'fa-lightbulb-o',
			239 => 'fa-exchange',
			240 => 'fa-cloud-download',
			241 => 'fa-cloud-upload',
			242 => 'fa-user-md',
			243 => 'fa-stethoscope',
			244 => 'fa-suitcase',
			245 => 'fa-bell-o',
			246 => 'fa-coffee',
			247 => 'fa-cutlery',
			248 => 'fa-file-text-o',
			249 => 'fa-building-o',
			250 => 'fa-hospital-o',
			251 => 'fa-ambulance',
			252 => 'fa-medkit',
			253 => 'fa-fighter-jet',
			254 => 'fa-beer',
			255 => 'fa-h-square',
			256 => 'fa-plus-square',
			257 => 'fa-angle-double-left',
			258 => 'fa-angle-double-right',
			259 => 'fa-angle-double-up',
			260 => 'fa-angle-double-down',
			261 => 'fa-angle-left',
			262 => 'fa-angle-right',
			263 => 'fa-angle-up',
			264 => 'fa-angle-down',
			265 => 'fa-desktop',
			266 => 'fa-laptop',
			267 => 'fa-tablet',
			268 => 'fa-mobile-phone',
			269 => 'fa-mobile',
			270 => 'fa-circle-o',
			271 => 'fa-quote-left',
			272 => 'fa-quote-right',
			273 => 'fa-spinner',
			274 => 'fa-circle',
			275 => 'fa-mail-reply',
			276 => 'fa-reply',
			277 => 'fa-github-alt',
			278 => 'fa-folder-o',
			279 => 'fa-folder-open-o',
			280 => 'fa-smile-o',
			281 => 'fa-frown-o',
			282 => 'fa-meh-o',
			283 => 'fa-gamepad',
			284 => 'fa-keyboard-o',
			285 => 'fa-flag-o',
			286 => 'fa-flag-checkered',
			287 => 'fa-terminal',
			288 => 'fa-code',
			289 => 'fa-mail-reply-all',
			290 => 'fa-reply-all',
			291 => 'fa-star-half-empty',
			292 => 'fa-star-half-full',
			293 => 'fa-star-half-o',
			294 => 'fa-location-arrow',
			295 => 'fa-crop',
			296 => 'fa-code-fork',
			297 => 'fa-unlink',
			298 => 'fa-chain-broken',
			299 => 'fa-question',
			300 => 'fa-info',
			301 => 'fa-exclamation',
			302 => 'fa-superscript',
			303 => 'fa-subscript',
			304 => 'fa-eraser',
			305 => 'fa-puzzle-piece',
			306 => 'fa-microphone',
			307 => 'fa-microphone-slash',
			308 => 'fa-shield',
			309 => 'fa-calendar-o',
			310 => 'fa-fire-extinguisher',
			311 => 'fa-rocket',
			312 => 'fa-maxcdn',
			313 => 'fa-chevron-circle-left',
			314 => 'fa-chevron-circle-right',
			315 => 'fa-chevron-circle-up',
			316 => 'fa-chevron-circle-down',
			317 => 'fa-html5',
			318 => 'fa-css3',
			319 => 'fa-anchor',
			320 => 'fa-unlock-alt',
			321 => 'fa-bullseye',
			322 => 'fa-ellipsis-h',
			323 => 'fa-ellipsis-v',
			324 => 'fa-rss-square',
			325 => 'fa-play-circle',
			326 => 'fa-ticket',
			327 => 'fa-minus-square',
			328 => 'fa-minus-square-o',
			329 => 'fa-level-up',
			330 => 'fa-level-down',
			331 => 'fa-check-square',
			332 => 'fa-pencil-square',
			333 => 'fa-external-link-square',
			334 => 'fa-share-square',
			335 => 'fa-compass',
			336 => 'fa-toggle-down',
			337 => 'fa-caret-square-o-down',
			338 => 'fa-toggle-up',
			339 => 'fa-caret-square-o-up',
			340 => 'fa-toggle-right',
			341 => 'fa-caret-square-o-right',
			342 => 'fa-euro',
			343 => 'fa-eur',
			344 => 'fa-gbp',
			345 => 'fa-dollar',
			346 => 'fa-usd',
			347 => 'fa-rupee',
			348 => 'fa-inr',
			349 => 'fa-cny',
			350 => 'fa-rmb',
			351 => 'fa-yen',
			352 => 'fa-jpy',
			353 => 'fa-ruble',
			354 => 'fa-rouble',
			355 => 'fa-rub',
			356 => 'fa-won',
			357 => 'fa-krw',
			358 => 'fa-bitcoin',
			359 => 'fa-btc',
			360 => 'fa-file',
			361 => 'fa-file-text',
			362 => 'fa-sort-alpha-asc',
			363 => 'fa-sort-alpha-desc',
			364 => 'fa-sort-amount-asc',
			365 => 'fa-sort-amount-desc',
			366 => 'fa-sort-numeric-asc',
			367 => 'fa-sort-numeric-desc',
			368 => 'fa-thumbs-up',
			369 => 'fa-thumbs-down',
			370 => 'fa-youtube-square',
			371 => 'fa-youtube',
			372 => 'fa-xing',
			373 => 'fa-xing-square',
			374 => 'fa-youtube-play',
			375 => 'fa-dropbox',
			376 => 'fa-stack-overflow',
			377 => 'fa-instagram',
			378 => 'fa-flickr',
			379 => 'fa-adn',
			380 => 'fa-bitbucket',
			381 => 'fa-bitbucket-square',
			382 => 'fa-tumblr',
			383 => 'fa-tumblr-square',
			384 => 'fa-long-arrow-down',
			385 => 'fa-long-arrow-up',
			386 => 'fa-long-arrow-left',
			387 => 'fa-long-arrow-right',
			388 => 'fa-apple',
			389 => 'fa-windows',
			390 => 'fa-android',
			391 => 'fa-linux',
			392 => 'fa-dribbble',
			393 => 'fa-skype',
			394 => 'fa-foursquare',
			395 => 'fa-trello',
			396 => 'fa-female',
			397 => 'fa-male',
			398 => 'fa-gittip',
			399 => 'fa-gratipay',
			400 => 'fa-sun-o',
			401 => 'fa-moon-o',
			402 => 'fa-archive',
			403 => 'fa-bug',
			404 => 'fa-vk',
			405 => 'fa-weibo',
			406 => 'fa-renren',
			407 => 'fa-pagelines',
			408 => 'fa-stack-exchange',
			409 => 'fa-arrow-circle-o-right',
			410 => 'fa-arrow-circle-o-left',
			411 => 'fa-toggle-left',
			412 => 'fa-caret-square-o-left',
			413 => 'fa-dot-circle-o',
			414 => 'fa-wheelchair',
			415 => 'fa-vimeo-square',
			416 => 'fa-turkish-lira',
			417 => 'fa-try',
			418 => 'fa-plus-square-o',
			419 => 'fa-space-shuttle',
			420 => 'fa-slack',
			421 => 'fa-envelope-square',
			422 => 'fa-wordpress',
			423 => 'fa-openid',
			424 => 'fa-institution',
			425 => 'fa-bank',
			426 => 'fa-university',
			427 => 'fa-mortar-board',
			428 => 'fa-graduation-cap',
			429 => 'fa-yahoo',
			430 => 'fa-google',
			431 => 'fa-reddit',
			432 => 'fa-reddit-square',
			433 => 'fa-stumbleupon-circle',
			434 => 'fa-stumbleupon',
			435 => 'fa-delicious',
			436 => 'fa-digg',
			437 => 'fa-pied-piper-pp',
			438 => 'fa-pied-piper-alt',
			439 => 'fa-drupal',
			440 => 'fa-joomla',
			441 => 'fa-language',
			442 => 'fa-fax',
			443 => 'fa-building',
			444 => 'fa-child',
			445 => 'fa-paw',
			446 => 'fa-spoon',
			447 => 'fa-cube',
			448 => 'fa-cubes',
			449 => 'fa-behance',
			450 => 'fa-behance-square',
			451 => 'fa-steam',
			452 => 'fa-steam-square',
			453 => 'fa-recycle',
			454 => 'fa-automobile',
			455 => 'fa-car',
			456 => 'fa-cab',
			457 => 'fa-taxi',
			458 => 'fa-tree',
			459 => 'fa-spotify',
			460 => 'fa-deviantart',
			461 => 'fa-soundcloud',
			462 => 'fa-database',
			463 => 'fa-file-pdf-o',
			464 => 'fa-file-word-o',
			465 => 'fa-file-excel-o',
			466 => 'fa-file-powerpoint-o',
			467 => 'fa-file-photo-o',
			468 => 'fa-file-picture-o',
			469 => 'fa-file-image-o',
			470 => 'fa-file-zip-o',
			471 => 'fa-file-archive-o',
			472 => 'fa-file-sound-o',
			473 => 'fa-file-audio-o',
			474 => 'fa-file-movie-o',
			475 => 'fa-file-video-o',
			476 => 'fa-file-code-o',
			477 => 'fa-vine',
			478 => 'fa-codepen',
			479 => 'fa-jsfiddle',
			480 => 'fa-life-bouy',
			481 => 'fa-life-buoy',
			482 => 'fa-life-saver',
			483 => 'fa-support',
			484 => 'fa-life-ring',
			485 => 'fa-circle-o-notch',
			486 => 'fa-ra',
			487 => 'fa-resistance',
			488 => 'fa-rebel',
			489 => 'fa-ge',
			490 => 'fa-empire',
			491 => 'fa-git-square',
			492 => 'fa-git',
			493 => 'fa-y-combinator-square',
			494 => 'fa-yc-square',
			495 => 'fa-hacker-news',
			496 => 'fa-tencent-weibo',
			497 => 'fa-qq',
			498 => 'fa-wechat',
			499 => 'fa-weixin',
			500 => 'fa-send',
			501 => 'fa-paper-plane',
			502 => 'fa-send-o',
			503 => 'fa-paper-plane-o',
			504 => 'fa-history',
			505 => 'fa-circle-thin',
			506 => 'fa-header',
			507 => 'fa-paragraph',
			508 => 'fa-sliders',
			509 => 'fa-share-alt',
			510 => 'fa-share-alt-square',
			511 => 'fa-bomb',
			512 => 'fa-soccer-ball-o',
			513 => 'fa-futbol-o',
			514 => 'fa-tty',
			515 => 'fa-binoculars',
			516 => 'fa-plug',
			517 => 'fa-slideshare',
			518 => 'fa-twitch',
			519 => 'fa-yelp',
			520 => 'fa-newspaper-o',
			521 => 'fa-wifi',
			522 => 'fa-calculator',
			523 => 'fa-paypal',
			524 => 'fa-google-wallet',
			525 => 'fa-cc-visa',
			526 => 'fa-cc-mastercard',
			527 => 'fa-cc-discover',
			528 => 'fa-cc-amex',
			529 => 'fa-cc-paypal',
			530 => 'fa-cc-stripe',
			531 => 'fa-bell-slash',
			532 => 'fa-bell-slash-o',
			533 => 'fa-trash',
			534 => 'fa-copyright',
			535 => 'fa-at',
			536 => 'fa-eyedropper',
			537 => 'fa-paint-brush',
			538 => 'fa-birthday-cake',
			539 => 'fa-area-chart',
			540 => 'fa-pie-chart',
			541 => 'fa-line-chart',
			542 => 'fa-lastfm',
			543 => 'fa-lastfm-square',
			544 => 'fa-toggle-off',
			545 => 'fa-toggle-on',
			546 => 'fa-bicycle',
			547 => 'fa-bus',
			548 => 'fa-ioxhost',
			549 => 'fa-angellist',
			550 => 'fa-cc',
			551 => 'fa-shekel',
			552 => 'fa-sheqel',
			553 => 'fa-ils',
			554 => 'fa-meanpath',
			555 => 'fa-buysellads',
			556 => 'fa-connectdevelop',
			557 => 'fa-dashcube',
			558 => 'fa-forumbee',
			559 => 'fa-leanpub',
			560 => 'fa-sellsy',
			561 => 'fa-shirtsinbulk',
			562 => 'fa-simplybuilt',
			563 => 'fa-skyatlas',
			564 => 'fa-cart-plus',
			565 => 'fa-cart-arrow-down',
			566 => 'fa-diamond',
			567 => 'fa-ship',
			568 => 'fa-user-secret',
			569 => 'fa-motorcycle',
			570 => 'fa-street-view',
			571 => 'fa-heartbeat',
			572 => 'fa-venus',
			573 => 'fa-mars',
			574 => 'fa-mercury',
			575 => 'fa-intersex',
			576 => 'fa-transgender',
			577 => 'fa-transgender-alt',
			578 => 'fa-venus-double',
			579 => 'fa-mars-double',
			580 => 'fa-venus-mars',
			581 => 'fa-mars-stroke',
			582 => 'fa-mars-stroke-v',
			583 => 'fa-mars-stroke-h',
			584 => 'fa-neuter',
			585 => 'fa-genderless',
			586 => 'fa-facebook-official',
			587 => 'fa-pinterest-p',
			588 => 'fa-whatsapp',
			589 => 'fa-server',
			590 => 'fa-user-plus',
			591 => 'fa-user-times',
			592 => 'fa-hotel',
			593 => 'fa-bed',
			594 => 'fa-viacoin',
			595 => 'fa-train',
			596 => 'fa-subway',
			597 => 'fa-medium',
			598 => 'fa-yc',
			599 => 'fa-y-combinator',
			600 => 'fa-optin-monster',
			601 => 'fa-opencart',
			602 => 'fa-expeditedssl',
			603 => 'fa-battery-4',
			604 => 'fa-battery',
			605 => 'fa-battery-full',
			606 => 'fa-battery-3',
			607 => 'fa-battery-three-quarters',
			608 => 'fa-battery-2',
			609 => 'fa-battery-half',
			610 => 'fa-battery-1',
			611 => 'fa-battery-quarter',
			612 => 'fa-battery-0',
			613 => 'fa-battery-empty',
			614 => 'fa-mouse-pointer',
			615 => 'fa-i-cursor',
			616 => 'fa-object-group',
			617 => 'fa-object-ungroup',
			618 => 'fa-sticky-note',
			619 => 'fa-sticky-note-o',
			620 => 'fa-cc-jcb',
			621 => 'fa-cc-diners-club',
			622 => 'fa-clone',
			623 => 'fa-balance-scale',
			624 => 'fa-hourglass-o',
			625 => 'fa-hourglass-1',
			626 => 'fa-hourglass-start',
			627 => 'fa-hourglass-2',
			628 => 'fa-hourglass-half',
			629 => 'fa-hourglass-3',
			630 => 'fa-hourglass-end',
			631 => 'fa-hourglass',
			632 => 'fa-hand-grab-o',
			633 => 'fa-hand-rock-o',
			634 => 'fa-hand-stop-o',
			635 => 'fa-hand-paper-o',
			636 => 'fa-hand-scissors-o',
			637 => 'fa-hand-lizard-o',
			638 => 'fa-hand-spock-o',
			639 => 'fa-hand-pointer-o',
			640 => 'fa-hand-peace-o',
			641 => 'fa-trademark',
			642 => 'fa-registered',
			643 => 'fa-creative-commons',
			644 => 'fa-gg',
			645 => 'fa-gg-circle',
			646 => 'fa-tripadvisor',
			647 => 'fa-odnoklassniki',
			648 => 'fa-odnoklassniki-square',
			649 => 'fa-get-pocket',
			650 => 'fa-wikipedia-w',
			651 => 'fa-safari',
			652 => 'fa-chrome',
			653 => 'fa-firefox',
			654 => 'fa-opera',
			655 => 'fa-internet-explorer',
			656 => 'fa-tv',
			657 => 'fa-television',
			658 => 'fa-contao',
			659 => 'fa-500px',
			660 => 'fa-amazon',
			661 => 'fa-calendar-plus-o',
			662 => 'fa-calendar-minus-o',
			663 => 'fa-calendar-times-o',
			664 => 'fa-calendar-check-o',
			665 => 'fa-industry',
			666 => 'fa-map-pin',
			667 => 'fa-map-signs',
			668 => 'fa-map-o',
			669 => 'fa-map',
			670 => 'fa-commenting',
			671 => 'fa-commenting-o',
			672 => 'fa-houzz',
			673 => 'fa-vimeo',
			674 => 'fa-black-tie',
			675 => 'fa-fonticons',
			676 => 'fa-reddit-alien',
			677 => 'fa-edge',
			678 => 'fa-credit-card-alt',
			679 => 'fa-codiepie',
			680 => 'fa-modx',
			681 => 'fa-fort-awesome',
			682 => 'fa-usb',
			683 => 'fa-product-hunt',
			684 => 'fa-mixcloud',
			685 => 'fa-scribd',
			686 => 'fa-pause-circle',
			687 => 'fa-pause-circle-o',
			688 => 'fa-stop-circle',
			689 => 'fa-stop-circle-o',
			690 => 'fa-shopping-bag',
			691 => 'fa-shopping-basket',
			692 => 'fa-hashtag',
			693 => 'fa-bluetooth',
			694 => 'fa-bluetooth-b',
			695 => 'fa-percent',
			696 => 'fa-gitlab',
			697 => 'fa-wpbeginner',
			698 => 'fa-wpforms',
			699 => 'fa-envira',
			700 => 'fa-universal-access',
			701 => 'fa-wheelchair-alt',
			702 => 'fa-question-circle-o',
			703 => 'fa-blind',
			704 => 'fa-audio-description',
			705 => 'fa-volume-control-phone',
			706 => 'fa-braille',
			707 => 'fa-assistive-listening-systems',
			708 => 'fa-asl-interpreting',
			709 => 'fa-american-sign-language-interpreting',
			710 => 'fa-deafness',
			711 => 'fa-hard-of-hearing',
			712 => 'fa-deaf',
			713 => 'fa-glide',
			714 => 'fa-glide-g',
			715 => 'fa-signing',
			716 => 'fa-sign-language',
			717 => 'fa-low-vision',
			718 => 'fa-viadeo',
			719 => 'fa-viadeo-square',
			720 => 'fa-snapchat',
			721 => 'fa-snapchat-ghost',
			722 => 'fa-snapchat-square',
			723 => 'fa-pied-piper',
			724 => 'fa-first-order',
			725 => 'fa-yoast',
			726 => 'fa-themeisle',
			727 => 'fa-google-plus-circle',
			728 => 'fa-google-plus-official',
			729 => 'fa-fa',
			730 => 'fa-font-awesome',
			731 => 'fa-handshake-o',
			732 => 'fa-envelope-open',
			733 => 'fa-envelope-open-o',
			734 => 'fa-linode',
			735 => 'fa-address-book',
			736 => 'fa-address-book-o',
			737 => 'fa-vcard',
			738 => 'fa-address-card',
			739 => 'fa-vcard-o',
			740 => 'fa-address-card-o',
			741 => 'fa-user-circle',
			742 => 'fa-user-circle-o',
			743 => 'fa-user-o',
			744 => 'fa-id-badge',
			745 => 'fa-drivers-license',
			746 => 'fa-id-card',
			747 => 'fa-drivers-license-o',
			748 => 'fa-id-card-o',
			749 => 'fa-quora',
			750 => 'fa-free-code-camp',
			751 => 'fa-telegram',
			752 => 'fa-thermometer-4',
			753 => 'fa-thermometer',
			754 => 'fa-thermometer-full',
			755 => 'fa-thermometer-3',
			756 => 'fa-thermometer-three-quarters',
			757 => 'fa-thermometer-2',
			758 => 'fa-thermometer-half',
			759 => 'fa-thermometer-1',
			760 => 'fa-thermometer-quarter',
			761 => 'fa-thermometer-0',
			762 => 'fa-thermometer-empty',
			763 => 'fa-shower',
			764 => 'fa-bathtub',
			765 => 'fa-s15',
			766 => 'fa-bath',
			767 => 'fa-podcast',
			768 => 'fa-window-maximize',
			769 => 'fa-window-minimize',
			770 => 'fa-window-restore',
			771 => 'fa-times-rectangle',
			772 => 'fa-window-close',
			773 => 'fa-times-rectangle-o',
			774 => 'fa-window-close-o',
			775 => 'fa-bandcamp',
			776 => 'fa-grav',
			777 => 'fa-etsy',
			778 => 'fa-imdb',
			779 => 'fa-ravelry',
			780 => 'fa-eercast',
			781 => 'fa-microchip',
			782 => 'fa-snowflake-o',
			783 => 'fa-superpowers',
			784 => 'fa-wpexplorer',
			785 => 'fa-meetup',
		);

		return apply_filters( 'starterblog/customizer/font_icons/font_awesome_icons', $icons );
	}

}
