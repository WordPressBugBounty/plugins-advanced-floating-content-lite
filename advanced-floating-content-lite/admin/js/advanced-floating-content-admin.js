(function( $ ) {
	'use strict';

	if( jQuery().wpColorPicker ) {
		$(function() {
			$(".color-picker-afc").wpColorPicker();
		});
	}
	jQuery(document).ready(function($) {
		var $lightbox = $('.afc-lightbox');
		var $lightboxImage = $('.lightbox-image');
		var $lightboxLink = $('.lightbox-link');
		var $currentCounter = $('.lightbox-counter .current');
		var $totalCounter = $('.lightbox-counter .total');
		
		var images = [];
		var currentIndex = 0;
		
		// Collect all images
		$('.thumbnail-item img').each(function(index) {
			images.push({
				src: $(this).attr('src'),
				alt: $(this).attr('alt'),
				index: index
			});
		});
		
		// Set total counter
		$totalCounter.text(images.length);
		
		// Thumbnail click
		$('.thumbnail-item').on('click', function(e) {
			e.preventDefault();
			currentIndex = $(this).data('index');
			showImage(currentIndex);
			$lightbox.addClass('active');
			$('body').css('overflow', 'hidden');
		});
		
		// Navigation
		$('.lightbox-nav.prev').on('click', function(e) {
			e.preventDefault();
			e.stopPropagation();
			currentIndex = (currentIndex - 1 + images.length) % images.length;
			showImage(currentIndex);
		});
		
		$('.lightbox-nav.next').on('click', function(e) {
			e.preventDefault();
			e.stopPropagation();
			currentIndex = (currentIndex + 1) % images.length;
			showImage(currentIndex);
		});
		
		// Close
		$('.lightbox-close, .lightbox-overlay').on('click', function(e) {
			e.preventDefault();
			$lightbox.removeClass('active');
			$('body').css('overflow', '');
		});
		
		// Keyboard navigation
		$(document).on('keydown', function(e) {
			if (!$lightbox.hasClass('active')) return;
			
			switch(e.key) {
				case 'Escape':
					$lightbox.removeClass('active');
					$('body').css('overflow', '');
					break;
				case 'ArrowLeft':
					currentIndex = (currentIndex - 1 + images.length) % images.length;
					showImage(currentIndex);
					break;
				case 'ArrowRight':
				case ' ':
					e.preventDefault();
					currentIndex = (currentIndex + 1) % images.length;
					showImage(currentIndex);
					break;
			}
		});
		
		// Show image function
		function showImage(index) {
			if (!images[index]) return;
			
			var image = images[index];
			$lightboxImage.attr('src', image.src).attr('alt', image.alt);
			$currentCounter.text(index + 1);
			
			// Scroll to top of container
			$('.lightbox-image-container').scrollTop(0);
		}
		
		// Prevent lightbox content from closing lightbox
		$('.lightbox-content').on('click', function(e) {
			e.stopPropagation();
		});
	});
})( jQuery );
