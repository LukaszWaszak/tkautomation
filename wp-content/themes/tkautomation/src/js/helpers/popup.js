export function popupOpen(payload) {
  window.dispatchEvent(
    new CustomEvent('popupOpen', {
      detail: payload,
    }),
  );
}

export function popupClose(payload) {
  window.dispatchEvent(
    new CustomEvent('popupClose', {
      detail: payload,
    }),
  );
}

export function popupCloseAll(payload) {
  window.dispatchEvent(
    new CustomEvent('popupCloseAll', {
      detail: payload,
    }),
  );
}

export default {
  popupOpen,
  popupClose,
  popupCloseAll,
};
