<style>
    .skew-diagonal {
        transform: skewX(12deg);
        transform-origin: top right;
    }
    
    .hero-bg {
        background-image: url('{{ asset("assets/images/hero-bg.png") }}');
        background-size: cover;
        background-position: center;
    }
    
    .precision-tools-bg {
        background-image: url('{{ asset("assets/images/precision-tools-bg.jpg") }}');
        background-size: cover;
        background-position: center;
    }
    
    .hover-scale {
        transition: transform 0.3s ease;
    }
    
    .hover-scale:hover {
        transform: scale(1.05);
    }
    
    .shadow-custom {
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    /* Mobile Menu Styles */
    .mobile-menu {
        transform: translateX(-100%);
        transition: transform 0.3s ease-in-out;
    }
    
    .mobile-menu.active {
        transform: translateX(0);
    }

    /* Language Dropdown Styles */
    .language-dropdown {
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s ease;
    }
    
    .language-dropdown.active {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    /* Hamburger Animation */
    .hamburger span {
        display: block;
        width: 25px;
        height: 3px;
        background: #374151;
        margin: 5px 0;
        transition: 0.3s;
    }
    
    .hamburger.active span:nth-child(1) {
        transform: rotate(-45deg) translate(-5px, 6px);
    }
    
    .hamburger.active span:nth-child(2) {
        opacity: 0;
    }
    
    .hamburger.active span:nth-child(3) {
        transform: rotate(45deg) translate(-5px, -6px);
    }

    /* Flag Icons */
    .flag-icon {
        width: 20px;
        height: 15px;
        background-size: cover;
        display: inline-block;
        margin-right: 8px;
        border-radius: 2px;
        border: 1px solid rgba(0,0,0,0.1);
    }

    .flag-kr {
        background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMTUiIHZpZXdCb3g9IjAgMCAyMCAxNSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8cmVjdCB3aWR0aD0iMjAiIGhlaWdodD0iMTUiIGZpbGw9IndoaXRlIi8+CiAgPGNpcmNsZSBjeD0iMTAiIGN5PSI3LjUiIHI9IjMuNSIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjMDAzNDc4IiBzdHJva2Utd2lkdGg9IjAuNSIvPgogIDxwYXRoIGQ9Ik0xMCA0QzExLjY1NyA0IDEzIDUuMzQzIDEzIDdTMTEuNjU3IDEwIDEwIDEwIDcgOC42NTcgNyA3IDguMzQzIDQgMTAgNFoiIGZpbGw9IiNDRDIxMkEiLz4KICA8cGF0aCBkPSJNMTAgMTFDOC4zNDMgMTEgNyA5LjY1NyA3IDhTOC4zNDMgNSAxMCA1IDEzIDYuMzQzIDEzIDggMTEuNjU3IDExIDEwIDExWiIgZmlsbD0iIzAwMzQ3OCIvPgogIDxnIHN0cm9rZT0iIzAwMzQ3OCIgc3Ryb2tlLXdpZHRoPSIwLjMiPgogICAgPGxpbmUgeDE9IjMiIHkxPSIzIiB4Mj0iNSIgeTI9IjEiLz4KICAgIDxsaW5lIHgxPSIzLjUiIHkxPSIzLjUiIHgyPSI0LjUiIHkyPSIyLjUiLz4KICAgIDxsaW5lIHgxPSI0IiB5MT0iNCIgeDI9IjQiIHkyPSIzIi8+CiAgICA8bGluZSB4MT0iMTciIHkxPSIzIiB4Mj0iMTUiIHkyPSIxIi8+CiAgICA8bGluZSB4MT0iMTYuNSIgeTE9IjMuNSIgeDI9IjE1LjUiIHkyPSIyLjUiLz4KICAgIDxsaW5lIHgxPSIxNiIgeTE9IjQiIHgyPSIxNiIgeTI9IjMiLz4KICAgIDxsaW5lIHgxPSIzIiB5MT0iMTIiIHgyPSI1IiB5Mj0iMTQiLz4KICAgIDxsaW5lIHgxPSIzLjUiIHkxPSIxMS41IiB4Mj0iNC41IiB5Mj0iMTIuNSIvPgogICAgPGxpbmUgeDE9IjQiIHkxPSIxMSIgeDI9IjQiIHkyPSIxMiIvPgogICAgPGxpbmUgeDE9IjE3IiB5MT0iMTIiIHgyPSIxNSIgeTI9IjE0Ii8+CiAgICA8bGluZSB4MT0iMTYuNSIgeTE9IjExLjUiIHgyPSIxNS41IiB5Mj0iMTIuNSIvPgogICAgPGxpbmUgeDE9IjE2IiB5MT0iMTEiIHgyPSIxNiIgeTI9IjEyIi8+CiAgPC9nPgo8L3N2Zz4K');
    }

    .flag-us {
        background-image: url('https://flagcdn.com/us.svg');
    }

    .flag-vn {
        background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMTUiIHZpZXdCb3g9IjAgMCAyMCAxNSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8cmVjdCB3aWR0aD0iMjAiIGhlaWdodD0iMTUiIGZpbGw9IiNEQTAyMEUiLz4KICA8cGF0aCBkPSJNMTAgM0wxMS4yIDYuNEgxNUwxMi40IDguNkwxMy42IDEyTDEwIDkuOEw2LjQgMTJMNy42IDguNkw1IDYuNEg4LjhMMTAgM1oiIGZpbGw9IiNGRkRENDAiLz4KPC9zdmc+Cg==');
    }

    .sidebar-active {
        background-color: #3b82f6;
        color: white;
        border-left: 4px solid #1d4ed8;
    }

    .sidebar-item {
        transition: all 0.3s ease;
    }

    .sidebar-item:hover {
        background-color: #f3f4f6;
        padding-left: 1.5rem;
    }

    .product-card {
        transition: all 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    /* Unified Sidebar Styles - All Blue Theme */
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    /* Mobile Navigation Enhancements */
    @media (max-width: 1023px) {
        .sm-hidden {
            display: none !important;
        }
        .mobile-nav-scroll {
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
        }
        
        .mobile-nav-scroll > * {
            scroll-snap-align: start;
        }
        
        /* Touch-friendly mobile buttons */
        .mobile-nav-button {
            min-height: 44px;
            min-width: 44px;
            touch-action: manipulation;
        }
        
        /* Improved mobile sidebar spacing */
        .mobile-sidebar-header {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
        }
        
        /* Mobile grid system */
        .mobile-grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.5rem;
        }
        
        /* Mobile customer support cards */
        .mobile-support-card {
            transition: all 0.2s ease;
            transform: translateZ(0);
        }
        
        .mobile-support-card:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    }

    /* Desktop Sidebar Enhancements */
    @media (min-width: 1024px) {
        .desktop-sidebar-nav a {
            position: relative;
            overflow: hidden;
        }
        
        .desktop-sidebar-nav a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .desktop-sidebar-nav a:hover::before {
            left: 100%;
        }
    }

    /* Unified Blue Color Theme */
    :root {
        --sidebar-primary: #2563eb;
        --sidebar-primary-dark: #1d4ed8;
        --sidebar-primary-light: #3b82f6;
        --sidebar-primary-bg: #eff6ff;
        --sidebar-primary-hover: #dbeafe;
    }

    /* Responsive Typography */
    @media (max-width: 640px) {
        .mobile-text-xs { font-size: 0.75rem; }
        .mobile-text-sm { font-size: 0.875rem; }
        .mobile-text-base { font-size: 1rem; }
    }
</style>
