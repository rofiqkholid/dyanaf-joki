import './bootstrap';
import './translations';

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

        const langLabel = lang === 'en' ? 'English' : 'Indonesia';
        if (currentLangDesktop) currentLangDesktop.textContent = langLabel;
        if (currentLangMobile) currentLangMobile.textContent = langLabel;

        document.documentElement.lang = lang;
        localStorage.setItem('dyanaf_lang', lang);
    }

    function triggerLoader(callback, duration = 600) {
        if (neoLoader) {
            neoLoader.style.display = 'flex';
            neoLoader.classList.remove('fade-out');
            
            setTimeout(() => {
                if (typeof callback === 'function') callback();
                
                setTimeout(() => {
                    neoLoader.classList.add('fade-out');
                    setTimeout(() => neoLoader.style.display = 'none', 400);
                }, 150);
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
            }, 600);
        });
    });

    const savedLang = localStorage.getItem('dyanaf_lang');
    if (savedLang) {
        setLanguage(savedLang);
    }
});

