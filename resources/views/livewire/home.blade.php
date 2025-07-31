<!-- Updated HTML structure -->
<div class="d-flex justify-content-center">
    <div>
        <!-- Updated HTML structure -->
        <div class="wrapper" id="flipbook-wrapper">
            <div id="flipbook" class="flipbook-loading">
                Loading flipbook...
            </div>
        </div>

        <!-- Your pages will be loaded here after flipbook initialization -->
        <div id="flipbook-pages" style="display: none;">
            <livewire:cover />
            <x-subcover />
            <x-kata-penganter />
            <x-petunjuk-penggunaan />
            <x-daftar-isi />
            <x-elemen-modul />
            <x-cpmk-tujuan-pembelajaran />
            <x-peta-konsep />
            <x-materi-satu />
            <x-materi-dua />
            <x-materi-tiga />
            <x-glosarium />
            <x-daftar-pustaka />
            <livewire:back-cover />
        </div>
    </div>
</div>

<script>
    // Enhanced responsive flipbook script with proper scaling
class ResponsiveFlipbook {
  constructor() {
    this.container = null;
    this.flipbook = null;
    this.originalWidth = 1100;
    this.originalHeight = 830;
    this.currentScale = 1;
    this.isInitialized = false;
    this.resizeTimer = null;
    
    this.init();
  }
  
  init() {
    // Wait for DOM and ensure jQuery and Turn.js are loaded
    this.waitForDependencies(() => {
      this.container = document.querySelector('.wrapper');
      this.flipbook = document.getElementById('flipbook');
      
      if (!this.container || !this.flipbook) {
        console.error('Flipbook elements not found');
        return;
      }
      
      this.setupFlipbook();
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
              console.log('Turned to page:', page);
            }
          }
        });
        
        this.isInitialized = true;
        this.adjustContainerSize();
        this.bindEvents();
        
        console.log('Flipbook initialized with scale:', this.currentScale);
        console.log('Scaled dimensions:', scaledWidth + 'x' + scaledHeight);
        
      } catch (error) {
        console.error('Error initializing Turn.js:', error);
        this.showError();
      }
    }, 200);
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
            $(this.flipbook).turn('next');
          } else {
            $(this.flipbook).turn('previous');
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