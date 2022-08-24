window.addEventListener('pageshow', function () {

  const form = document.querySelector('.signupForm'),
  btn = document.querySelector('.btn'),
  err_msg = document.querySelector('#err'),
  succ_msg = document.querySelector('#success');

  form.onsubmit = (e)=> {

    e.preventDefault();

  }

  btn.onclick = ()=> {

    let xhr = new XMLHttpRequest();

    xhr.open('POST', 'php/signup.php', true);

    xhr.onload = ()=> {

      if (xhr.readyState === XMLHttpRequest.DONE) {

        if (xhr.status === 200) {

          let data = xhr.response;

          if (data == 'success') {
  
            err_msg.style.display = 'none';

            succ_msg.textContent = 'Account created successfully!';
  
            succ_msg.style.display = 'block';

            document.querySelector('.signupForm').reset();

          } else {
  
            succ_msg.style.display = 'none';

            err_msg.textContent = data;
  
            err_msg.style.display = 'block';

          }

        }

      }

    }

    let formData = new FormData(form);

    xhr.send(formData);

  }

});