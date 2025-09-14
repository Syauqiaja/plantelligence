<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Plantelligence</title>
    <!-- Vite: SCSS and JS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- External CSS Libraries -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
    <!-- Tailwind CSS for Livewire Toaster -->
    <script src="https://cdn.tailwindcss.com"></script>
    @stack('styles')
</head>

<body class="bg-dark p-0" style="overflow: hidden;">
    <div class="container-fluid p-0 m-0">
        <!-- Mobile Sidebar Toggle -->
        {{-- <div id="mobileSidebarToggle" class="d-md-none bg-white border-bottom px-3 py-2 w-100">
            <div class="d-flex justify-content-between">
                <button class="btn btn-outline-primary" type="button" id="sidebarToggleBtn"
                    aria-label="Toggle navigation">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <a href="/" class="d-flex align-items-center link-primary text-decoration-none">
                    <i class="bi bi-mortarboard fs-2 me-2"></i>
                    <span class="fs-4 fw-bold">Plantelligence</span>
                </a>
            </div>
        </div>
        <!-- Sidebar Backdrop -->
        <div class="sidebar-backdrop d-md-none" id="sidebarBackdrop"></div> --}}
        <div class="d-flex">
            <!-- Sidebar Component -->
            {{--
            <x-navigation.sidebar /> --}}
            <!-- Main Content -->
            <div class="flex-grow-1">
                <!-- Updated HTML structure -->
                <div class="d-flex justify-content-center">
                    <div>
                        <!-- Updated HTML structure with navigation -->
                        <div class="flipbook-container" style="position: relative;">
                            <div class="wrapper" id="flipbook-wrapper">
                                <!-- Pages are now directly inside flipbook div -->
                                <div id="flipbook" class="flipbook-loading">
                                    <x-cover />
                                    <x-subcover />
                                    <x-kata-penganter />
                                    <x-petunjuk-penggunaan />
                                    <x-elemen-modul />
                                    <x-cpmk-tujuan-pembelajaran />
                                    <x-daftar-isi />
                                    <x-peta-konsep />
                                    <x-materi-satu />
                                    <x-materi-dua />
                                    <x-materi-tiga />
                                    <livewire:portal-tugas1 />
                                    <livewire:portal-tugas2 />
                                    <livewire:portal-tugas3 />
                                    <livewire:portal-tugas4 />
                                    <livewire:portal-tugas5 />
                                    <livewire:portal-tugas6 />
                                    <livewire:portal-tugas7 />
                                    <livewire:portal-tugas8 />
                                    <x-glosarium />
                                    <x-daftar-pustaka />
                                    <x-back-cover />
                                </div>
                            </div>

                            <!-- Navigation arrows -->
                            <div class="flipbook-nav">
                                <button class="nav-btn nav-prev" id="prevBtn" title="Previous Page">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="15,18 9,12 15,6"></polyline>
                                    </svg>
                                </button>
                                <button class="nav-btn nav-next" id="nextBtn" title="Next Page">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="9,18 15,12 9,6"></polyline>
                                    </svg>
                                </button>
                            </div>

                            <!-- Page counter -->
                            <div class="page-counter" id="pageCounter">
                                <span id="currentPage">1</span> / <span id="totalPages">15</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stack('modals')
    <x-modal :modalId='"authModal"'>
        <livewire:auth.auth-modal wire:key="'auth-modal'">
    </x-modal>
    <x-modal :modalId='"taskSubmissionModal"' wire:key="'task-submission-modal'">
        <livewire:task-submission>
    </x-modal>
    <x-modal :modalId='"plantelligenceBot"' wire:key="'plantelligence-bot'">
        <livewire:plantelligence-bot>
    </x-modal>

    <x-toaster-hub />

    <!-- External JS Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/turn.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Blade/Vite Stack for Extra Scripts -->
    @stack('scripts')

    <script>
        // Enhanced responsive flipbook script without moving pages
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
                    
                    // Remove loading class and text
                    this.flipbook.classList.remove('flipbook-loading');
                    
                    // Get total pages from existing children
                    this.totalPages = this.flipbook.children.length;
                    this.updatePageCounter();
                    
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
                            pagesInDOM: 7,
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
                console.log('Initializing flipbook...');
                flipbookInstance = new ResponsiveFlipbook();
            }
        };

        // Try different initialization approaches
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initFlipbook);
        } else {
            initFlipbook();
        }

        function goToPage(number){
            flipbookInstance.goToPage(number);
        }

        const pageMap = {
            btnKataPengantar: 3,
            btnPetunjukPenggunaan: 5,
            btnElemenModul: 6,
            btnCPMK: 7,
            btnDaftarIsi: 11,
            btnPetaKonsep: 12,
            btnMateri1: 13,
            btnMateri1FaktaUnik: 14,
            btnMateri1Quiz: 17,
            btnMateri2: 21,
            btnMateri2FaktaUnik: 22,
            btnMateri2Quiz: 24,
            btnMateri3: 28,
            btnMateri3FaktaUnik: 29,
            btnMateri3Quiz: 31,
            btnPortalTugas: 35,
            btnGlosarium: 43,
            btnDaftarPustaka: 46,
            btnHalamanPenutup: 47
        };

        // Loop and attach listeners
        Object.entries(pageMap).forEach(([id, page]) => {
            const el = document.getElementById(id);
            if (el) {
                el.addEventListener("click", () => goToPage(page));
            }
        });

        // Fallback initialization
        setTimeout(initFlipbook, 1000);

        // Make instance globally available for debugging
        window.flipbookInstance = flipbookInstance;
    </script>
</body>

</html>