(function () {
  'use strict';

  const html = document.documentElement;
  const toggle = document.querySelector('[data-theme-toggle]');
  const header = document.querySelector('.gt-site-header');
  const themeLabel = document.querySelector('[data-theme-label]');
  const storageKey = 'growthytools-theme';

  const getSystemTheme = () => window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';

  const resolveTheme = (mode) => {
    if (mode === 'system') return getSystemTheme();
    return mode;
  };

  const applyTheme = (mode, persist = false) => {
    const resolved = resolveTheme(mode);
    html.setAttribute('data-theme', resolved);
    html.setAttribute('data-theme-source', mode);
    if (persist) localStorage.setItem(storageKey, mode);
    if (themeLabel) {
      themeLabel.textContent = mode === 'dark' ? 'الوضع الداكن' : mode === 'light' ? 'الوضع الفاتح' : 'حسب الجهاز';
    }
  };

  const allowedModes = [];
  if (growthytoolsData.enableLight) allowedModes.push('light');
  if (growthytoolsData.enableDark) allowedModes.push('dark');
  allowedModes.push('system');

  const stored = localStorage.getItem(storageKey);
  const initial = stored && allowedModes.includes(stored) ? stored : growthytoolsData.appearance;
  applyTheme(initial);

  if (toggle) {
    toggle.addEventListener('click', () => {
      const current = html.getAttribute('data-theme-source') || growthytoolsData.appearance;
      const next = current === 'dark' ? 'light' : 'dark';
      if (!allowedModes.includes(next)) return;
      applyTheme(next, true);
    });
  }

  if (header) {
    const onScroll = () => {
      header.classList.toggle('is-scrolled', window.scrollY > 8);
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
    const current = html.getAttribute('data-theme-source');
    if (current === 'system') applyTheme('system');
  });
})();
