const validateBasic = (value, required, regex) => {
  if (required && value === '') return false;

  if (regex && regex !== '') {
    return regex.test(value);
  } else {
    return true;
  }
};

export const validate = (el = null, params = {}) => {
  const { type, regex, value, required } = params;

  if (type === 'text' || type === 'email') {
    return validateBasic(value, required, regex);
  }
}
