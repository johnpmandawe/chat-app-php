window.addEventListener('pageshow', function() {

  const pword = document.querySelector('.pword'),
  
  tglBtn = document.querySelector('.eye');

  tglBtn.onclick = () => {

    if (pword.type == 'password') {

      pword.type = 'text';
      tglBtn.classList.add('active');

    } else {

      pword.type = 'password';
      tglBtn.classList.remove('active');
    }

  }

});