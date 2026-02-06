<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-fafcing aspects of the plugin.
 *
 * @link       http://www.codetides.com/
 * @since      1.0.0
 *
 * @pafckage    Advanced_Floating_Content
 * @subpafckage Advanced_Floating_Content/admin/views
 */
?>
<div class="afc-premium-screenshots">
    <!-- Thumbnail grid -->
    <div class="screenshot-thumbnails">
        <div class="thumbnail-item" data-index="0">
            <img src="<?php echo plugins_url('../assets/screenshot-1.jpg', __FILE__); ?>" 
                 alt="Premium Features Screenshot 1">
            <div class="thumbnail-overlay">Click to view</div>
        </div>
        <div class="thumbnail-item" data-index="1">
            <img src="<?php echo plugins_url('../assets/screenshot-2.jpg', __FILE__); ?>" 
                 alt="Premium Features Screenshot 2">
            <div class="thumbnail-overlay">Click to view</div>
        </div>
        <div class="thumbnail-item" data-index="2">
            <img src="<?php echo plugins_url('../assets/screenshot-3.jpg', __FILE__); ?>" 
                 alt="Premium Features Screenshot 3">
            <div class="thumbnail-overlay">Click to view</div>
        </div>
		<div class="thumbnail-item" data-index="3">
            <img src="<?php echo plugins_url('../assets/screenshot-4.jpg', __FILE__); ?>" 
                 alt="Premium Features Screenshot 4">
            <div class="thumbnail-overlay">Click to view</div>
        </div>
		<div class="thumbnail-item" data-index="4">
            <img src="<?php echo plugins_url('../assets/screenshot-5.jpg', __FILE__); ?>" 
                 alt="Premium Features Screenshot 5">
            <div class="thumbnail-overlay">Click to view</div>
        </div>
		<div class="thumbnail-item" data-index="5">
            <img src="<?php echo plugins_url('../assets/screenshot-6.jpg', __FILE__); ?>" 
                 alt="Premium Features Screenshot 6">
            <div class="thumbnail-overlay">Click to view</div>
        </div>
		<div class="thumbnail-item" data-index="6">
            <img src="<?php echo plugins_url('../assets/screenshot-7.jpg', __FILE__); ?>" 
                 alt="Premium Features Screenshot 7">
            <div class="thumbnail-overlay">Click to view</div>
        </div>
		<div class="thumbnail-item" data-index="7">
            <img src="<?php echo plugins_url('../assets/screenshot-8.jpg', __FILE__); ?>" 
                 alt="Premium Features Screenshot 8">
            <div class="thumbnail-overlay">Click to view</div>
        </div>
    </div>
    
    <!-- Lightbox -->
    <div class="afc-lightbox">
        <div class="lightbox-overlay"></div>
        <div class="lightbox-content">
            <!-- Close button -->
            <button class="lightbox-close">&times;</button>
            
            <!-- Navigation -->
            <button class="lightbox-nav prev">&lt;</button>
            <button class="lightbox-nav next">&gt;</button>
            
            <!-- Image container -->
            <div class="lightbox-image-container">
                <a href="https://1.envato.market/5By11?subId1=afc_lite_wp&subId2=afc_lite" target="_blank" class="lightbox-link">
                    <img class="lightbox-image" src="" alt="">
                </a>
            </div>
            
            <!-- Counter -->
            <div class="lightbox-counter">
                <span class="current">1</span> / <span class="total">8</span>
            </div>
        </div>
    </div>
</div>