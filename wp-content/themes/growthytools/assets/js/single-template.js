(function () {
  'use strict';

  const box = document.querySelector('[data-buy-box]');
  if (!box) return;

  const radios = box.querySelectorAll('input[name="gt_license"]');
  const price = box.querySelector('[data-license-price]');
  const oldPrice = box.querySelector('[data-license-old-price]');
  const checkoutBtn = box.querySelector('[data-checkout-button]');
  if (!checkoutBtn || !price || !oldPrice) return;

  const update = (radio) => {
    if (!radio) return;
    price.textContent = radio.dataset.price || '';
    oldPrice.textContent = radio.dataset.oldPrice || '';
    oldPrice.style.display = radio.dataset.oldPrice ? 'block' : 'none';
    checkoutBtn.href = radio.dataset.checkoutUrl || '#';
  };

  radios.forEach((radio) => {
    radio.addEventListener('change', () => update(radio));
  });

  const checked = box.querySelector('input[name="gt_license"]:checked');
  if (checked) update(checked);
})();
