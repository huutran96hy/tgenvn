<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const closeMobileMenu = document.getElementById('closeMobileMenu');

        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.add('active');
            mobileMenuBtn.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        closeMobileMenu.addEventListener('click', function() {
            mobileMenu.classList.remove('active');
            mobileMenuBtn.classList.remove('active');
            document.body.style.overflow = 'auto';
        });

        // Language Dropdown Toggle
        const languageBtn = document.getElementById('languageBtn');
        const languageDropdown = document.getElementById('languageDropdown');
        const langArrow = document.getElementById('langArrow');

        languageBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            languageDropdown.classList.toggle('active');
            langArrow.style.transform = languageDropdown.classList.contains('active') ? 'rotate(180deg)' : 'rotate(0deg)';
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function() {
            languageDropdown.classList.remove('active');
            langArrow.style.transform = 'rotate(0deg)';
        });

        // Language Selection
        const langOptions = document.querySelectorAll('.lang-option');
        const mobileLangBtns = document.querySelectorAll('.mobile-lang-btn');
        const currentLang = document.getElementById('currentLang');
        let currentLanguage = 'ko';

        // Config cho tên và icon
        const langConfig = {
            'ko': {
                text: '한국어',
                flag: 'flag-kr'
            },
            'en': {
                text: 'English',
                flag: 'flag-us'
            },
            'vi': {
                text: 'Tiếng Việt',
                flag: 'flag-vn'
            }
        };

        // --- Đọc ngôn ngữ lưu từ localStorage (nếu có) ---
        const savedLang = localStorage.getItem('selectedLang');
        if (savedLang && savedLang !== currentLanguage) {
            switchLanguage(savedLang);
        }

        function switchLanguage(lang) {
            currentLanguage = lang;

            // Lưu lại vào localStorage
            localStorage.setItem('selectedLang', lang);

            // Update current language display
            currentLang.textContent = langConfig[lang].text;
            languageBtn.querySelector('.flag-icon').className = `flag-icon ${langConfig[lang].flag}`;

            // Update mobile language buttons
            mobileLangBtns.forEach(btn => {
                if (btn.dataset.lang === lang) {
                    btn.classList.remove('bg-gray-200', 'text-gray-700');
                    btn.classList.add('bg-blue-600', 'text-white');
                } else {
                    btn.classList.remove('bg-blue-600', 'text-white');
                    btn.classList.add('bg-gray-200', 'text-gray-700');
                }
            });

            // Update all text content
            const elements = document.querySelectorAll(`[data-${lang}]`);
            elements.forEach(element => {
                const text = element.getAttribute(`data-${lang}`);
                if (text) {
                    if (element.innerHTML.includes('<br>')) {
                        element.innerHTML = text;
                    } else {
                        element.textContent = text;
                    }
                }
            });
            const langImgs = document.querySelectorAll('img[src-vi], img[src-en], img[src-ko]');
            langImgs.forEach(img => {
                const newSrc = img.getAttribute(`src-${lang}`);
                if (newSrc) {
                    img.setAttribute('src', newSrc);
                }
            });
            // Close dropdown
            languageDropdown.classList.remove('active');
            langArrow.style.transform = 'rotate(0deg)';
        }

        // Desktop language options
        langOptions.forEach(option => {
            option.addEventListener('click', function() {
                switchLanguage(this.dataset.lang);
            });
        });

        // Mobile language options
        mobileLangBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                switchLanguage(this.dataset.lang);
            });
        });

        // Smooth scrolling for anchor links
        const links = document.querySelectorAll('a[href^="#"]');
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
                // Close mobile menu if open
                mobileMenu.classList.remove('active');
                mobileMenuBtn.classList.remove('active');
                document.body.style.overflow = 'auto';
            });
        });

        // Close mobile menu when clicking on menu links
        const mobileNavLinks = document.querySelectorAll('#mobileMenu nav a');
        mobileNavLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.remove('active');
                mobileMenuBtn.classList.remove('active');
                document.body.style.overflow = 'auto';
            });
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                mobileMenu.classList.remove('active');
                mobileMenuBtn.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });

        // Product card hover effects
        const productCards = document.querySelectorAll('.product-card');
        productCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Product Sorting Functionality
        const sortBtns = document.querySelectorAll('.sort-btn');
        let currentSort = 'blames';
        let sortDirection = 'asc'; // 'asc' or 'desc'

        sortBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const sortType = this.dataset.sort;
                const arrow = this.querySelector('.sort-arrow');

                // If clicking the same button, toggle direction
                if (currentSort === sortType) {
                    sortDirection = sortDirection === 'asc' ? 'desc' : 'asc';
                } else {
                    // If clicking different button, set to ascending
                    sortDirection = 'asc';
                    currentSort = sortType;
                }

                // Reset all buttons
                sortBtns.forEach(b => {
                    b.classList.remove('active', 'bg-blue-100', 'text-blue-700');
                    b.classList.add('bg-gray-200', 'text-gray-700');
                    b.querySelector('.sort-arrow').style.opacity = '0';
                    b.querySelector('.sort-arrow').style.transform = 'rotate(0deg)';
                });

                // Activate current button
                this.classList.remove('bg-gray-200', 'text-gray-700');
                this.classList.add('active', 'bg-blue-100', 'text-blue-700');
                arrow.style.opacity = '1';

                // Set arrow direction
                if (sortDirection === 'desc') {
                    arrow.style.transform = 'rotate(180deg)';
                } else {
                    arrow.style.transform = 'rotate(0deg)';
                }

                // Sort products (you can implement actual sorting logic here)
                sortProducts(sortType, sortDirection);
            });
        });

        function sortProducts(sortType, direction) {
            const productsGrid = document.querySelector('.grid.md\\:grid-cols-2');
            const products = Array.from(productsGrid.children);

            // Simple sorting simulation - you can implement real sorting logic
            console.log(`Sorting by ${sortType} in ${direction} order`);

            // Example: shuffle products to simulate sorting
            if (sortType !== 'all') {
                const shuffled = products.sort(() => direction === 'asc' ? Math.random() - 0.5 : 0.5 - Math.random());
                shuffled.forEach(product => productsGrid.appendChild(product));
            }
        }
    });
</script>