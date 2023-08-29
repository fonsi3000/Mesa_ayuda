/**
 * Send Invoice Offcanvas
 */

'use strict';

(function () {
  // Send invoice textarea
  const invoiceMsg = document.querySelector('#invoice-message');

  const trimMsg = invoiceMsg.textContent.trim();

  invoiceMsg.value = trimMsg;
})();
