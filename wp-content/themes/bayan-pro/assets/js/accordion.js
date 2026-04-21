(() => {
  const accordions = document.querySelectorAll('.wp-block-details');
  accordions.forEach((item) => {
    item.addEventListener('toggle', () => {
      if (!item.open) return;
      accordions.forEach((other) => {
        if (other !== item) other.open = false;
      });
    });
  });
})();
