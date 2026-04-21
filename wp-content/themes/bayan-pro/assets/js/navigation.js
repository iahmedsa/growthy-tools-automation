(() => {
  const nav = document.querySelector('.wp-block-navigation');
  if (!nav) return;

  const button = nav.querySelector('button');
  if (!button) return;

  button.setAttribute('aria-label', 'تبديل قائمة التنقل');
})();
