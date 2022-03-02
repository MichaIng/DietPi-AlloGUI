(function($) {
	var defaults = {
		speed: 400,
		delay: 400
	};
	var config = {
		tooltip: 'naoTooltip',
		arrowSize: 16
	};
	$.fn.naoTooltip = function() {
		init.apply(this, arguments);

		return this;
	};
	function init(opts) {
		var options = $.extend({}, defaults, opts);
		this.data(options);
		this.each(function(i, e) {
			animateNaoTooltip($(e), options);
		});
	}
	function animateNaoTooltip(selector, opts) {
		var tooltip = selector.find('.' + config.tooltip),
		delayHappened = false,
		timer;
		setLeftOffset(selector, tooltip);
		setTopOffset(selector, tooltip);
		$(window).resize(function() {
			setLeftOffset(selector, tooltip);
			setTopOffset(selector, tooltip);
		});
		selector.on('mouseenter', function() {
			if (delayHappened === false) {
				timer = setTimeout(function() {
					delayHappened = true;
					showTooltip(tooltip, opts.speed);
				}, opts.delay);
			}
		}).on('mouseleave', function() {
			clearTimeout(timer);

			delayHappened = false;
			hideTooltip(tooltip, opts.speed);
		});
	}
	function setLeftOffset(selector, tooltip) {
		var leftOffset = 'auto';

		if (tooltip.hasClass('nt-right-top') || tooltip.hasClass('nt-right') || tooltip.hasClass('nt-right-bottom')) {
			leftOffset = selector.outerWidth() + config.arrowSize;
		}

		if (tooltip.hasClass('nt-left-top') || tooltip.hasClass('nt-left') || tooltip.hasClass('nt-left-bottom')) {
			leftOffset = '-' + (tooltip.outerWidth() + config.arrowSize);
		}

		if (tooltip.hasClass('nt-top') || tooltip.hasClass('nt-bottom')) {
			leftOffset = (selector.outerWidth() / 2) - (tooltip.outerWidth() / 2);
		}

		if (tooltip.hasClass('nt-top-right') || tooltip.hasClass('nt-bottom-right')) {
			leftOffset = selector.outerWidth() - tooltip.outerWidth();
		}

		if (tooltip.hasClass('nt-top-left') || tooltip.hasClass('nt-bottom-left')) {
			leftOffset = 0;
		}

		tooltip.css({
			left: leftOffset
		});
	}
	function setTopOffset(selector, tooltip) {
		var topOffset = 'auto';

		if (tooltip.hasClass('nt-top-left') || tooltip.hasClass('nt-top') || tooltip.hasClass('nt-top-right')) {
			topOffset = '-' + (selector.outerHeight() + tooltip.outerHeight());
		}

		if (tooltip.hasClass('nt-bottom-left') || tooltip.hasClass('nt-bottom') || tooltip.hasClass('nt-bottom-right')) {
			topOffset = selector.outerHeight() + config.arrowSize;
		}

		if (tooltip.hasClass('nt-right') || tooltip.hasClass('nt-left')) {
			topOffset = (selector.outerHeight() / 2) - (tooltip.outerHeight() / 2);
		}

		if (tooltip.hasClass('nt-left-bottom') || tooltip.hasClass('nt-right-bottom')) {
			topOffset = selector.outerHeight() - tooltip.outerHeight();
		}

		if (tooltip.hasClass('nt-left-top') || tooltip.hasClass('nt-right-top')) {
			topOffset = 0;
		}

		tooltip.css({
			top: topOffset
		});
	}
	function showTooltip(tooltip, speed) {
		tooltip.css({ visibility: 'visible' }).animate({
			opacity: 1,
			display: 'block'
		}, speed);
	}
	function hideTooltip(tooltip, speed) {
		tooltip.animate({
			opacity: 0,
			display: 'none',
		}, speed, function() {
			tooltip.css({ visibility: 'hidden' });
		});
	}
})(jQuery);