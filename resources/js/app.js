import './bootstrap';
import './translations';
import Swup from 'swup';

const swup = new Swup({
    containers: ['#swup']
});

document.addEventListener('DOMContentLoaded', () => {
    const translations = window.dyanafTranslations || {};
    const neoLoader = document.getElementById('neo-loader');
    const currentLangDesktop = document.getElementById('current-lang-desktop');
    const currentLangMobile = document.getElementById('current-lang-mobile');
    const langBtnDesktop = document.getElementById('lang-btn-desktop');
    const langDropdownDesktop = document.getElementById('lang-dropdown-desktop');
    const langBtnMobile = document.getElementById('lang-btn-mobile');
    const langDropdownMobile = document.getElementById('lang-dropdown-mobile');
    const langOptions = document.querySelectorAll('.lang-option');

    // Integration with Swup for smooth page transitions using #neo-loader
    if (neoLoader) {
        let loaderTimer = null;
        let fadeTimer = null;

        swup.hooks.on('visit:start', () => {
            clearTimeout(loaderTimer);
            clearTimeout(fadeTimer);
            neoLoader.style.display = 'flex';
            neoLoader.classList.remove('fade-out');
        });

        swup.hooks.on('page:view', () => {
            window.scrollTo({ top: 0, behavior: 'instant' });
            loaderTimer = setTimeout(() => {
                neoLoader.classList.add('fade-out');
                fadeTimer = setTimeout(() => {
                    neoLoader.style.display = 'none';
                }, 400);
            }, 1000);
        });
    }

    // Toggle dropdowns
    if (langBtnDesktop && langDropdownDesktop) {
        langBtnDesktop.addEventListener('click', (e) => {
            e.stopPropagation();
            langDropdownDesktop.classList.toggle('hidden');
        });
    }

    if (langBtnMobile && langDropdownMobile) {
        langBtnMobile.addEventListener('click', (e) => {
            e.stopPropagation();
            langDropdownMobile.classList.toggle('hidden');
        });
    }

    document.addEventListener('click', () => {
        if (langDropdownDesktop) langDropdownDesktop.classList.add('hidden');
        if (langDropdownMobile) langDropdownMobile.classList.add('hidden');
    });

    function showToastMsg(msg) {
        const toast = document.createElement('div');
        toast.className = 'fixed bottom-6 right-6 z-[100] bg-[#ffdd44] border-2 border-slate-900 px-5 py-3 rounded-xl font-extrabold text-sm text-slate-900 shadow-[4px_4px_0px_0px_#1a1a1a] flex items-center gap-3 transition-all duration-300';
        toast.innerHTML = `<span>✨</span><span>${msg}</span>`;
        document.body.appendChild(toast);
        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }, 2500);
    }

    function setLanguage(lang) {
        const dictionary = translations[lang] || translations.id || {};
        
        document.querySelectorAll('[data-i18n]').forEach(el => {
            const key = el.getAttribute('data-i18n');
            if (dictionary[key]) {
                el.textContent = dictionary[key];
            }
        });

        document.querySelectorAll('[data-i18n-placeholder]').forEach(el => {
            const key = el.getAttribute('data-i18n-placeholder');
            if (dictionary[key]) {
                el.placeholder = dictionary[key];
            }
        });

        const langLabel = lang === 'en' ? 'English' : 'Indonesia';
        if (currentLangDesktop) currentLangDesktop.textContent = langLabel;
        if (currentLangMobile) currentLangMobile.textContent = langLabel;

        document.documentElement.lang = lang;
        localStorage.setItem('dyanaf_lang', lang);
    }

    function triggerLoader(callback, duration = 1000) {
        if (neoLoader) {
            neoLoader.style.display = 'flex';
            neoLoader.classList.remove('fade-out');
            
            setTimeout(() => {
                if (typeof callback === 'function') callback();
                neoLoader.classList.add('fade-out');
                setTimeout(() => {
                    neoLoader.style.display = 'none';
                }, 400);
            }, duration);
        } else {
            if (typeof callback === 'function') callback();
        }
    }

    langOptions.forEach(opt => {
        opt.addEventListener('click', () => {
            const selectedLang = opt.getAttribute('data-lang');
            
            if (langDropdownDesktop) langDropdownDesktop.classList.add('hidden');
            if (langDropdownMobile) langDropdownMobile.classList.add('hidden');
            
            triggerLoader(() => {
                setLanguage(selectedLang);
                showToastMsg(selectedLang === 'en' ? 'Language switched to English' : 'Bahasa diubah ke Indonesia');
            }, 1000);
        });
    });

    const savedLang = localStorage.getItem('dyanaf_lang');
    if (savedLang) {
        setLanguage(savedLang);
    }
});

