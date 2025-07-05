<style>
    .skew-diagonal {
        transform: skewX(12deg);
        transform-origin: top right;
    }
    
    .hero-bg {
        background-image: url('https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-FuFVd63o8RxjvShtcWCiJSxycIIcjH.png');
        background-size: cover;
        background-position: center;
    }
    
    .precision-tools-bg {
        background-image: url('https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-jtCBcWufoJI0CiVFfLHDeqzeUMv8QP.png');
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
        background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMTUiIHZpZXdCb3g9IjAgMCAyMCAxNSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8cmVjdCB3aWR0aD0iMjAiIGhlaWdodD0iMTUiIGZpbGw9IndoaXRlIi8+CiAgPHJlY3Qgd2lkdGg9IjIwIiBoZWlnaHQ9IjEuMTUiIGZpbGw9IiNCMjIyMzQiLz4KICA8cmVjdCB5PSIyLjMiIHdpZHRoPSIyMCIgaGVpZ2h0PSIxLjE1IiBmaWxsPSIjQjIyMjM0Ii8+CiAgPHJlY3QgeT0iNC42IiB3aWR0aD0iMjAiIGhlaWdodD0iMS4xNSIgZmlsbD0iI0IyMjIzNCIvPgogIDxyZWN0IHk9IjYuOSIgd2lkdGg9IjIwIiBoZWlnaHQ9IjEuMTUiIGZpbGw9IiNCMjIyMzQiLz4KICA8cmVjdCB5PSI5LjIiIHdpZHRoPSIyMCIgaGVpZ2h0PSIxLjE1IiBmaWxsPSIjQjIyMjM0Ii8+CiAgPHJlY3QgeT0iMTEuNSIgd2lkdGg9IjIwIiBoZWlnaHQ9IjEuMTUiIGZpbGw9IiNCMjIyMzQiLz4KICA8cmVjdCB5PSIxMy44IiB3aWR0aD0iMjAiIGhlaWdodD0iMS4yIiBmaWxsPSIjQjIyMjM0Ii8+CiAgPHJlY3Qgd2lkdGg9IjgiIGhlaWdodD0iOCIgZmlsbD0iIzNDM0I2RSIvPgogIDxnIGZpbGw9IndoaXRlIj4KICAgIDxjaXJjbGUgY3g9IjEuNSIgY3k9IjEiIHI9IjAuMyIvPgogICAgPGNpcmNsZSBjeD0iMy41IiBjeT0iMSIgcj0iMC4zIi8+CiAgICA8Y2lyY2xlIGN4PSI1LjUiIGN5PSIxIiByPSIwLjMiLz4KICAgIDxjaXJjbGUgY3g9IjcuNSIgY3k9IjEiIHI9IjAuMyIvPgogICAgPGNpcmNsZSBjeD0iMi41IiBjeT0iMi41IiByPSIwLjMiLz4KICAgIDxjaXJjbGUgY3g9IjQuNSIgY3k9IjIuNSIgcj0iMC4zIi8+CiAgICA8Y2lyY2xlIGN4PSI2LjUiIGN5PSIyLjUiIHI9IjAuMyIvPgogICAgPGNpcmNsZSBjeD0iMS41IiBjeT0iNCIgcj0iMC4zIi8+CiAgICA8Y2lyY2xlIGN4PSIzLjUiIGN5PSI0IiByPSIwLjMiLz4KICAgIDxjaXJjbGUgY3g9IjUuNSIgY3k9IjQiIHI9IjAuMyIvPgogICAgPGNpcmNsZSBjeD0iNy41IiBjeT0iNCIgcj0iMC4zIi8+CiAgICA8Y2lyY2xlIGN4PSIyLjUiIGN5PSI1LjUiIHI9IjAuMyIvPgogICAgPGNpcmNsZSBjeD0iNC41IiBjeT0iNS41IiByPSIwLjMiLz4KICAgIDxjaXJjbGUgY3g9IjYuNSIgY3k9IjUuNSIgcj0iMC4zIi8+CiAgICA8Y2lyY2xlIGN4PSIxLjUiIGN5PSI3IiByPSIwLjMiLz4KICAgIDxjaXJjbGUgY3g9IjMuNSIgY3k9IjciIHI9IjAuMyIvPgogICAgPGNpcmNsZSBjeD0iNS41IiBjeT0iNyIgcj0iMC4zIi8+CiAgICA8Y2lyY2xlIGN4PSI3LjUiIGN5PSI3IiByPSIwLjMiLz4KICA8L2c+Cjwvc3ZnPgo=');
    }

    .flag-vn {
        background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMTUiIHZpZXdCb3g9IjAgMCAyMCAxNSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8cmVjdCB3aWR0aD0iMjAiIGhlaWdodD0iMTUiIGZpbGw9IiNEQTAyMEUiLz4KICA8cGF0aCBkPSJNMTAgM0wxMS4yIDYuNEgxNUwxMi40IDguNkwxMy42IDEyTDEwIDkuOEw2LjQgMTJMNy42IDguNkw1IDYuNEg4LjhMMTAgM1oiIGZpbGw9IiNGRkRENDAiLz4KPC9zdmc+Cg==');
    }
</style>
