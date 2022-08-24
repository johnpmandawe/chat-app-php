window.addEventListener('pageshow', function () {

    const form = document.querySelector('#loginForm'),
    btn = document.querySelector('.btn'),
    err_msg = document.querySelector('#err');
  
    form.onsubmit = (e)=> {
  
      e.preventDefault();
  
    }
  
    btn.onclick = ()=> {
  
      let xhr = new XMLHttpRequest();
  
      xhr.open('POST', 'php/login.php', true);
  
      xhr.onload = ()=> {
  
        if (xhr.readyState === XMLHttpRequest.DONE) {
  
          if (xhr.status === 200) {
  
            let data = xhr.response;
  
            if (data == 'success') {
  
              document.querySelector('#loginForm').reset();

              location.href = 'users.php';
  
            } else {
  
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