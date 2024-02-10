// ========== Toggle Icon Burger ==========
/**
 * Toggle burger icon functionality.
 */
function goblog_free_toggle_icon_burger() {
	const boxMenu = document.getElementById("box-menu");
	const fontNavBar = document.getElementById("toggle-burger-mobile");
	const list = document.querySelectorAll(".box-menu ul li a");

	fontNavBar.addEventListener("click", function () {
		boxMenu.classList.toggle("show-box-menu");

		// get first element to be focused inside modal
		const firstFocusableElement = document.getElementById(
			"toggle-burger-mobile"
		);

		// get last element to be focused inside modal
		const last = list[list.length - 1];
		const lastFocusableElement = last;

		document.addEventListener("keydown", function (e) {
			let isTabPressed = e.key === "Tab" || e.keyCode === 9;

			if (!isTabPressed) {
				return;
			}

			// if shift key pressed for shift + tab combination
			if (e.shiftKey) {
				if (document.activeElement === firstFocusableElement) {
					lastFocusableElement.focus();
					e.preventDefault();
				}
			} else {
				if (document.activeElement === lastFocusableElement) {
					firstFocusableElement.focus();
					e.preventDefault();
				}
			}
		});
	});
}
// Initialize toggle burger icon functionality.
goblog_free_toggle_icon_burger();

// ========== Append Icon Arrow  ==========
/**
 * Append arrow icon to menu items with children.
 */
function goblog_free_append_icon_arrow() {
	const hasChildrenLink = document.querySelectorAll(
		".menu-item-has-children > a"
	);
	hasChildrenLink.forEach(function (e) {
		e.innerHTML +=
			'<span class="sub-btn"><i class="fas fa-angle-down"></i></span>';
	});
}
// Append arrow icon to applicable menu items.
goblog_free_append_icon_arrow();

// ========== Nav Box Search Full  ==========
/**
 * Toggle search box functionality.
 */
function goblog_free_nav_box_search_full() {

	const SearchOpen   = document.querySelector('.box-search-open');
	const SearchInput  = document.querySelector('.container-search-full input');
	const SearchSubmit = document.querySelector('.container-search-full .search-submit');
	const SearchClose  = document.querySelector('.container-search-full .box-search-close svg');
	const body         = document.body;

	SearchInput.tabIndex  = "-1";
	SearchSubmit.tabIndex = "-1";
	SearchClose.tabIndex  = "-1";

	SearchOpen.addEventListener("click", function () {
		body.classList.add("open-popup-search");

		SearchInput.tabIndex  = "1";
		SearchSubmit.tabIndex = "2";
		SearchClose.tabIndex  = "3";
		SearchInput.focus();

		// get first element to be focused inside modal
		const firstFocusableElement = SearchInput;

		// get last element to be focused inside modal
		const lastFocusableElement = SearchClose;

		document.addEventListener("keydown", function (e) {
			let isTabPressed = e.key === "Tab" || e.keyCode === 9;

			if (!isTabPressed) {
				return;
			}

			// if shift key pressed for shift + tab combination
			if (e.shiftKey) {
				if (document.activeElement === firstFocusableElement) {
					lastFocusableElement.focus();
					e.preventDefault();
				}
			} else {
				if (document.activeElement === lastFocusableElement) {
					firstFocusableElement.focus();
					e.preventDefault();
				}
			}
		});
		
	});

	SearchClose.addEventListener("click", function () {
		body.classList.remove("open-popup-search");

		SearchOpen.focus();
		SearchInput.tabIndex  = "-1";
		SearchSubmit.tabIndex = "-2";
		SearchClose.tabIndex  = "-3";

	});

	SearchClose.addEventListener("keyup", function(event) {
		if (event.keyCode === 13 || event.keyCode === 32 ) {
			body.classList.remove("open-popup-search");

			SearchOpen.focus();
			SearchInput.tabIndex  = "-1";
			SearchSubmit.tabIndex = "-2";
			SearchClose.tabIndex  = "-3";
		}
	});

}
// Initialize search box functionality.
goblog_free_nav_box_search_full();

// ========== Scroll  ==========
// Scroll top button visibility on scroll.
window.onscroll = function () {
	goblog_free_scroll_top();
};

/**
 * Scroll top button visibility.
 */
function goblog_free_scroll_top() {
	const goblogFreeBtnTop = document.getElementById("button-scroll");
	if (
		document.body.scrollTop > 500 ||
		document.documentElement.scrollTop > 500
	) {
		goblogFreeBtnTop.style.visibility = "visible";
		goblogFreeBtnTop.style.opacity = 1;
	} else {
		goblogFreeBtnTop.style.visibility = "hidden";
		goblogFreeBtnTop.style.opacity = 0;
	}
}

/**
 * Scroll top button animation.
 */
function goblog_free_scroll_animate() {
	const goblogFreeBtnTop = document.getElementById("button-scroll");
	goblogFreeBtnTop.addEventListener("click", function (e) {
		e.preventDefault();
	});
}
goblog_free_scroll_animate();

/**
 * Scroll smoothly to top.
 */
function goblog_free_scroll_smooth() {
	const goblogFreeBtnTop = document.getElementById("button-scroll");
	goblogFreeBtnTop.addEventListener("click", () =>
		window.scrollTo({
			top: 0.1,
			behavior: "smooth",
		})
	);
}
// Scroll Smooth
goblog_free_scroll_smooth();
