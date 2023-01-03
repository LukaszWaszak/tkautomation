const getOffset = (el, relEl) => {
  if (!el || el === relEl) return { l: 0, t: 0 };
  const eOffset = { l: el.offsetLeft, t: el.offsetTop };
  const pOffset = getOffset(el.offsetParent, relEl);
  return { l: eOffset.l + pOffset.l, t: eOffset.t + pOffset.t };
};

export default getOffset;
