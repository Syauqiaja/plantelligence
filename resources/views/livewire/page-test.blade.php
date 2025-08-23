@push('styles')

<style>
  /* Flipbook container styles */
  .flipbook-container {
    position: relative;
    display: inline-block;
  }

  /* Navigation buttons */
  .flipbook-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 100%;
    pointer-events: none;
    z-index: 1000;
  }

  .nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.7);
    border: none;
    color: white;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    cursor: pointer;
    pointer-events: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
  }

  .nav-btn:hover {
    background: rgba(0, 0, 0, 0.9);
    transform: translateY(-50%) scale(1.1);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
  }

  .nav-btn:active {
    transform: translateY(-50%) scale(0.95);
  }

  .nav-btn:disabled {
    background: rgba(0, 0, 0, 0.3);
    cursor: not-allowed;
    opacity: 0.5;
  }

  .nav-btn:disabled:hover {
    transform: translateY(-50%) scale(1);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
  }

  .nav-prev {
    left: -25px;
  }

  .nav-next {
    right: -25px;
  }

  /* Page counter */
  .page-counter {
    position: absolute;
    bottom: -40px;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 500;
    backdrop-filter: blur(5px);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
  }

  /* Mobile responsiveness */
  @media (max-width: 768px) {
    .nav-btn {
      width: 40px;
      height: 40px;
    }

    .nav-prev {
      left: -20px;
    }

    .nav-next {
      right: -20px;
    }

    .page-counter {
      bottom: -35px;
      font-size: 12px;
      padding: 6px 12px;
    }
  }

  /* Hide navigation on very small screens if needed */
  @media (max-width: 480px) {
    .nav-prev {
      left: -15px;
    }

    .nav-next {
      right: -15px;
    }

    .nav-btn {
      width: 35px;
      height: 35px;
    }
  }

  /* Loading state */
  .flipbook-loading {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 400px;
    background: #f5f5f5;
    border-radius: 8px;
    color: #666;
    font-size: 16px;
  }
</style>
@endpush

<!-- Updated HTML structure -->
<div class="d-flex justify-content-center">
  <div>
    <!-- Updated HTML structure with navigation -->
    <div class="flipbook-container" style="position: relative;">
      <div class="wrapper" id="flipbook-wrapper">
        <div id="flipbook" class="flipbook-loading">
          Loading flipbook...
        </div>
      </div>

      <!-- Navigation arrows -->
      <div class="flipbook-nav">
        <button class="nav-btn nav-prev" id="prevBtn" title="Previous Page">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <polyline points="15,18 9,12 15,6"></polyline>
          </svg>
        </button>
        <button class="nav-btn nav-next" id="nextBtn" title="Next Page">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <polyline points="9,18 15,12 9,6"></polyline>
          </svg>
        </button>
      </div>

      <!-- Page counter -->
      <div class="page-counter" id="pageCounter">
        <span id="currentPage">1</span> / <span id="totalPages">15</span>
      </div>
    </div>

    <!-- Your pages will be loaded here after flipbook initialization -->
    <div id="flipbook-pages" style="display: none;">
      <x-portal-tugas/>
    </div>
  </div>
</div>

@push('modals')
<x-modal :modalId='"authModal"'>
  <livewire:auth.auth-modal>
</x-modal>
<x-modal :modalId='"taskSubmissionModal"'>
  <livewire:task-submission>
</x-modal>
<x-modal :modalId='"plantelligenceBot"'>
  <livewire:plantelligence-bot>
</x-modal>
@endpush

@push('scripts')
<script>
  // Enhanced responsive flipbook script with navigation
    class ResponsiveFlipbook {
      constructor() {
        this.container = null;
        this.flipbook = null;
        this.originalWidth = 1100;
        this.originalHeight = 830;
        this.currentScale = 1;
        this.isInitialized = false;
        this.resizeTimer = null;
        this.currentPage = 1;
        this.totalPages = 0;
        
        // Navigation elements
        this.prevBtn = null;
        this.nextBtn = null;
        this.pageCounter = null;
        this.currentPageSpan = null;
        this.totalPagesSpan = null;
        
        this.init();
      }
      
      init() {
        // Wait for DOM and ensure jQuery and Turn.js are loaded
        this.waitForDependencies(() => {
          this.container = document.querySelector('.wrapper');
          this.flipbook = document.getElementById('flipbook');
          
          // Get navigation elements
          this.prevBtn = document.getElementById('prevBtn');
          this.nextBtn = document.getElementById('nextBtn');
          this.pageCounter = document.getElementById('pageCounter');
          this.currentPageSpan = document.getElementById('currentPage');
          this.totalPagesSpan = document.getElementById('totalPages');
          
          if (!this.container || !this.flipbook) {
            console.error('Flipbook elements not found');
            return;
          }
          
          this.setupFlipbook();
          this.bindNavigationEvents();
        });
      }
      
      waitForDependencies(callback) {
        const checkDependencies = () => {
          if (typeof jQuery !== 'undefined' && jQuery.fn.turn) {
            callback();
          } else {
            setTimeout(checkDependencies, 100);
          }
        };
        
        if (document.readyState === 'loading') {
          document.addEventListener('DOMContentLoaded', checkDependencies);
        } else {
          checkDependencies();
        }
      }
      
      setupFlipbook() {
        try {
          console.log("Setup flipbook");
          
          // Clear any existing content
          this.flipbook.innerHTML = '';
          this.flipbook.className = '';
          
          // Move pages from hidden container to flipbook
          const pagesContainer = document.getElementById('flipbook-pages');
          if (pagesContainer) {
            // Clone and move each page individually to avoid DOM conflicts
            const pages = Array.from(pagesContainer.children);
            pages.forEach((page, index) => {
              const clonedPage = page.cloneNode(true);
              clonedPage.style.display = 'block';
              this.flipbook.appendChild(clonedPage);
            });
            
            // Set total pages
            this.totalPages = pages.length;
            this.updatePageCounter();
          }
          
          // Calculate initial scale before initializing Turn.js
          this.calculateScale();
          
          // Initialize Turn.js with scaled dimensions
          this.initializeTurnJS();
          
        } catch (error) {
          console.error('Error setting up flipbook:', error);
          this.showError();
        }
      }
      
      calculateScale() {
        if (!this.container) return;
        
        try {
          // Get available space
          const containerRect = this.container.parentElement.getBoundingClientRect();
          const padding = 40; // Account for padding
          const availableWidth = containerRect.width - padding;
          const availableHeight = containerRect.height - padding;
          
          // Calculate scale ratios
          const scaleX = availableWidth / this.originalWidth;
          const scaleY = availableHeight / this.originalHeight;
          
          console.log("Available space " + availableHeight + " : " + availableWidth);
          console.log("Available scale " + scaleY + " : " + scaleX);
          
          // Use the smaller scale and cap at 1
          this.currentScale = Math.min(scaleX, scaleY, 1);
          
        } catch (error) {
          console.error('Error calculating scale:', error);
          this.currentScale = 1;
        }
      }
      
      initializeTurnJS() {
        const $flipbook = $(this.flipbook);
        
        // Destroy existing instance if it exists
        if ($flipbook.data('turn')) {
          try {
            $flipbook.turn('destroy');
          } catch (e) {
            console.warn('Error destroying existing turn instance:', e);
          }
        }
        
        // Clear any turn-related data
        $flipbook.removeData('turn');
        $flipbook.removeClass('turn-js');
        
        // Calculate scaled dimensions
        const scaledWidth = this.originalWidth * this.currentScale;
        const scaledHeight = this.originalHeight * this.currentScale;
        
        // Wait a bit for DOM to settle
        setTimeout(() => {
          try {
            $flipbook.turn({
              gradients: true,
              acceleration: true,
              height: scaledHeight,
              width: scaledWidth,
              autoCenter: true,
              display: 'double',
              when: {
                start: (event, pageObject, corner) => {
                  // Optional: Add custom behavior when page turn starts
                },
                end: (event, pageObject, turned) => {
                  // Optional: Add custom behavior when page turn ends
                },
                turning: (event, page, view) => {
                  // Prevent DOM manipulation conflicts during turning
                  event.stopPropagation();
                },
                turned: (event, page, view) => {
                  // Page turn completed
                  this.currentPage = page;
                  this.updatePageCounter();
                  this.updateNavigationButtons();
                  console.log('Turned to page:', page);
                }
              }
            });
            
            this.isInitialized = true;
            this.adjustContainerSize();
            this.bindEvents();
            this.updateNavigationButtons();
            
            console.log('Flipbook initialized with scale:', this.currentScale);
            console.log('Scaled dimensions:', scaledWidth + 'x' + scaledHeight);
            
          } catch (error) {
            console.error('Error initializing Turn.js:', error);
            this.showError();
          }
        }, 200);
      }
      
      bindNavigationEvents() {
        if (this.prevBtn) {
          this.prevBtn.addEventListener('click', () => {
            this.previousPage();
          });
        }
        
        if (this.nextBtn) {
          this.nextBtn.addEventListener('click', () => {
            this.nextPage();
          });
        }
        
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
          if (!this.isInitialized) return;
          
          switch (e.key) {
            case 'ArrowLeft':
              e.preventDefault();
              this.previousPage();
              break;
            case 'ArrowRight':
              e.preventDefault();
              this.nextPage();
              break;
            case ' ': // Spacebar
              e.preventDefault();
              this.nextPage();
              break;
          }
        });
      }
      
      previousPage() {
        if (!this.isInitialized) return;
        
        try {
          $(this.flipbook).turn('previous');
        } catch (error) {
          console.warn('Error turning to previous page:', error);
        }
      }
      
      nextPage() {
        if (!this.isInitialized) return;
        
        try {
          $(this.flipbook).turn('next');
        } catch (error) {
          console.warn('Error turning to next page:', error);
        }
      }
      
      updatePageCounter() {
        if (this.currentPageSpan) {
          this.currentPageSpan.textContent = this.currentPage;
        }
        
        if (this.totalPagesSpan) {
          this.totalPagesSpan.textContent = this.totalPages;
        }
      }
      
      updateNavigationButtons() {
        if (this.prevBtn) {
          this.prevBtn.disabled = this.currentPage <= 1;
        }
        
        if (this.nextBtn) {
          this.nextBtn.disabled = this.currentPage >= this.totalPages;
        }
      }
      
      adjustContainerSize() {
        if (!this.isInitialized || !this.container) return;
        
        try {
          // Set container to match the scaled flipbook size
          const scaledWidth = this.originalWidth * this.currentScale;
          const scaledHeight = this.originalHeight * this.currentScale;
          
          this.container.style.width = `${scaledWidth}px`;
          this.container.style.height = `${scaledHeight}px`;
          this.container.style.transform = 'none'; // Remove any scaling transforms
          
        } catch (error) {
          console.error('Error adjusting container size:', error);
        }
      }
      
      handleResize() {
        if (!this.isInitialized) return;
        
        const oldScale = this.currentScale;
        this.calculateScale();
        
        // Only reinitialize if scale changed significantly
        if (Math.abs(oldScale - this.currentScale) > 0.05) {
          console.log('Scale changed from', oldScale, 'to', this.currentScale, '- reinitializing');
          this.reinitialize();
        }
      }
      
      bindEvents() {
        // Debounced resize handler
        const handleResize = () => {
          clearTimeout(this.resizeTimer);
          this.resizeTimer = setTimeout(() => {
            this.handleResize();
          }, 250);
        };
        
        window.addEventListener('resize', handleResize);
        window.addEventListener('orientationchange', () => {
          setTimeout(() => this.handleResize(), 500);
        });
        
        // Touch gestures for mobile
        this.addTouchGestures();
      }
      
      addTouchGestures() {
        if (!('ontouchstart' in window)) return;
        
        let startX = null;
        let startY = null;
        
        this.flipbook.addEventListener('touchstart', (e) => {
          startX = e.touches[0].clientX;
          startY = e.touches[0].clientY;
        }, { passive: true });
        
        this.flipbook.addEventListener('touchend', (e) => {
          if (!startX || !startY || !this.isInitialized) return;
          
          const endX = e.changedTouches[0].clientX;
          const endY = e.changedTouches[0].clientY;
          
          const diffX = startX - endX;
          const diffY = startY - endY;
          
          // Only handle horizontal swipes
          if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 50) {
            try {
              if (diffX > 0) {
                this.nextPage();
              } else {
                this.previousPage();
              }
            } catch (error) {
              console.warn('Error handling swipe gesture:', error);
            }
          }
          
          startX = null;
          startY = null;
        }, { passive: true });
      }
      
      showError() {
        this.flipbook.innerHTML = `
          <div class="flipbook-loading">
            <p>Error loading flipbook. Please refresh the page.</p>
          </div>
        `;
      }
      
      // Public method to go to specific page
      goToPage(pageNumber) {
        if (!this.isInitialized || pageNumber < 1 || pageNumber > this.totalPages) return;
        
        try {
          $(this.flipbook).turn('page', pageNumber);
        } catch (error) {
          console.warn('Error going to page:', pageNumber, error);
        }
      }
      
      // Public method to reinitialize if needed
      reinitialize() {
        this.isInitialized = false;
        this.setupFlipbook();
      }
    }

    // Initialize the flipbook
    let flipbookInstance;

    // Multiple initialization methods to ensure it works
    const initFlipbook = () => {
      if (!flipbookInstance) {
        flipbookInstance = new ResponsiveFlipbook();
      }
    };

    // Try different initialization approaches
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', initFlipbook);
    } else {
      initFlipbook();
    }

    // Fallback initialization
    setTimeout(initFlipbook, 1000);

    // Make instance globally available for debugging
    window.flipbookInstance = flipbookInstance;
</script>
@endpush