const scrollTop = (value) => {
  if (value) {
    document.body.scrollTop = document.documentElement.scrollTop = value;
  } else {
    return window.scrollY ||
      window.pageYOffset ||
      document.body.scrollTop ||
      document.documentElement.scrollTop ||
      0;
  }
};

export default scrollTop;
