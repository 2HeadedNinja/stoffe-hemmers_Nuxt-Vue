const Empty = {
  is(string = false) {
    if(!string || typeof string !== 'string') {
      return true;
    } 

    if(string.split(' ').join('') === '') {
      return true;
    }

    return false;
  }
}

export default Empty;