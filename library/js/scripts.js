jQuery(document).ready(function ($) {
	const $window = $(window);
	// mobileNav();
	toggleMoreText();
	loadMore();
	setOffsetBoxesActions();
	accordionCards();
	navigateToCertainPageSectionBasedOnHash();
	mobileAccordionActions();
	setFocusOnSearchModalInput();
	initLenis();

	// function mobileNav() {
	// 	$("body").on("click", ".mobile-menu-list .menu-item a", function () {
	// 		if ($(this).attr("aria-expanded") === "true") {
	// 			window.location.href = $(this).attr("href");
	// 		}
	// 	});
	// }

	function toggleMoreText() {
		$("body").on("click", ".box-more-btn", function (e) {
			e.preventDefault();
			const $this = $(this);
			let target = $this.data("target");
			let targetElem = $(".text-" + target);
			$this.toggleClass("more-open");
			targetElem.fadeToggle(500);
		});
	}

	function loadMore() {
		const DISABLED_CLASS = "disabled";

		$(".btn-load-more").on("click", function (e) {
			e.preventDefault();
			const $this = $(this);
			const $span = $this.find("span");
			const href = $this.attr("href");

			$.ajax({
				url: href,
				type: "GET",
				dataType: "html",
				beforeSend: function () {
					$this.addClass(DISABLED_CLASS);
					$span.text(global_vars.loading);
				},
			})
				.done(successFunction)
				.fail(failFunction);

			function successFunction(data) {
				const $data = $(data);
				const $nextLink = $data.find(".btn-load-more");
				const nextPage = $nextLink.attr("href");
				if (nextPage) {
					$this.attr("href", nextPage);
				} else {
					$this.parent().remove();
				}

				const $gridPosts = $data.find(".posts-grid > article");
				$gridPosts.appendTo($(".posts-grid"));

				$span.text(global_vars.load_more);
				$this.removeClass(DISABLED_CLASS);
			}
		});
	}

	function failFunction(request, textStatus, errorThrown) {
		console.log(
			"An error occurred during your request: " +
				request.status +
				" " +
				textStatus +
				" " +
				errorThrown
		);
	}

	function setOffsetBoxesActions() {
		if ($(".section-alternate-colored-boxes").length) {
			createOffsets();
			animateBoxes();
			$window.on("resize", createOffsets);
		}
	}

	function createOffsets() {
		const $sectionWithAlternateColoredBoxes = $(
			".section-alternate-colored-boxes"
		);
		const mq = window.matchMedia("(min-width: 960px)");
		const $wW = $window.width();
		const containerWidth = 800; //100 less than container's small width
		let res = 0;

		if (mq.matches) {
			res = `${containerWidth + ($wW - containerWidth) / 2}px`;
		} else {
			res = "auto";
		}

		$sectionWithAlternateColoredBoxes
			.get(0)
			.style.setProperty("--width", res);
	}

	function animateBoxes() {
		$(".box").each(function () {
			const $this = $(this);
			const $els = $this.find(".el");
			const tl = gsap.timeline({
				scrollTrigger: {
					trigger: $this,
					start: "top bottom-=100px",
					//markers: "true",
				},
			});
			tl.to($this, {
				clipPath: "inset(0% 0% 0% 0%)",
				duration: 0.85,
			}).to($els, {
				opacity: 1,
				y: 0,
				stagger: 0.1,
				duration: 0.25,
			});
		});
	}

	function accordionCards() {
		if ($(".section-accordion-slider").length) {
			$(".accordion-wrapper li").hover(
				function (e) {
					const $this = $(this);
					$(".accordion-wrapper li.active .content").stop().slideUp();
					$(".accordion-wrapper li.active").removeClass("active");
					$this.addClass("active");
					$this.find(".content").stop().slideDown();
				},
				function () {}
			);
		}
	}

	function navigateToCertainPageSectionBasedOnHash() {
		if (location.hash) {
			scroll({
				top:
					document.querySelector(":target").offsetTop -
					document.querySelector(".header").offsetHeight,
			});
		}
	}

	function mobileAccordionActions() {
		$(".mobile-menu-list a").on("click", function (e) {
			const $this = $(this);
			const $item = $this.closest("li");
			if ($(e.target).closest("svg").length || $(e.target).is("svg")) {
				e.preventDefault();
				const $next = $this.next();
				if ($next.length) {
					$item.toggleClass("open");
					$next.slideToggle(200);
				}
			}
		});
	}

	function setFocusOnSearchModalInput() {
		UIkit.util.on("#search-modal-form", "shown", function () {
			const $input = $("#search-modal-form input");
			setTimeout(function () {
				$input.focus();
			}, 200);
		});
	}

	function initLenis() {
		const lenis = new Lenis();

		function raf(time) {
			lenis.raf(time);
			requestAnimationFrame(raf);
		}

		requestAnimationFrame(raf);
	}
});
