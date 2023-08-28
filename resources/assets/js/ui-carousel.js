/**
 * UI Carousel
 */

'use strict';

(function () {
  const swiperDefault = document.querySelector('#swiper-default'),
    swiperWithArrows = document.querySelector('#swiper-with-arrows'),
    swiperWithPagination = document.querySelector('#swiper-with-pagination'),
    swiperWithProgress = document.querySelector('#swiper-with-progress'),
    swiperWithScrollbar = document.querySelector('#swiper-with-scrollbar'),
    verticalSwiper = document.querySelector('#swiper-vertical'),
    swiperMultipleSlides = document.querySelector('#swiper-multiple-slides'),
    swiper3dCoverflowEffect = document.querySelector('#swiper-3d-coverflow-effect'),
    swiper3dCubeEffect = document.querySelector('#swiper-3d-cube-effect'),
    swiper3dFlipEffect = document.querySelector('#swiper-3d-flip-effect'),
    galleryThumbs = document.querySelector('.gallery-thumbs'),
    galleryTop = document.querySelector('.gallery-top');
  let galleryInstance;

  // Default
  // --------------------------------------------------------------------
  if (swiperDefault) {
   
  }

  // With arrows
  // --------------------------------------------------------------------
  if (swiperWithArrows) {
   
  }

  // With pagination
  // --------------------------------------------------------------------
  if (swiperWithPagination) {
   
  }

  // With progress
  // --------------------------------------------------------------------
  if (swiperWithProgress) {
    
  }

  // With scrollbar
  // --------------------------------------------------------------------
  if (swiperWithScrollbar) {
    
  }

  // Vertical
  // --------------------------------------------------------------------
  if (verticalSwiper) {
    
  }

  // Multiple slides
  // --------------------------------------------------------------------
  if (swiperMultipleSlides) {
    
  }

  // 3D coverflow effect
  // --------------------------------------------------------------------
  if (swiper3dCoverflowEffect) {
    
  }

  // 3D cube effect
  // --------------------------------------------------------------------
  if (swiper3dCubeEffect) {
    
  }

  // 3D flip effect
  // --------------------------------------------------------------------
  if (swiper3dFlipEffect) {
   
  }

  // Gallery effect
  // --------------------------------------------------------------------
  if (galleryThumbs) {
    galleryInstance = new Swiper(galleryThumbs, {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true
    });
  }

  if (galleryTop) {
    
  }
})();
