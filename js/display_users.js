window.addEventListener('pageshow', function () {

  const users_list = document.querySelector('.users_list'),
  searchBar = document.querySelector('.search');

  searchBar.onkeyup = () => {

    let searchStr = searchBar.value;

    if (searchStr != "") {

      searchBar.classList.add('active');

    } else {

      searchBar.classList.remove('active');

    }
  
    let xhr = new XMLHttpRequest();
    
    xhr.open('POST', 'php/search.php', true);
    
    xhr.onload = ()=> {
    
      if (xhr.readyState === XMLHttpRequest.DONE) {
    
        if (xhr.status === 200) {
    
          let data = xhr.response;
  
          users_list.innerHTML = data;
    
        }
    
      }
    
    }

    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    
    xhr.send("searchStr=" + searchStr);

  }

  setInterval(() => {
  
    let xhr = new XMLHttpRequest();
    
    xhr.open('POST', 'php/display_users.php', true);
    
    xhr.onload = ()=> {
    
      if (xhr.readyState === XMLHttpRequest.DONE) {
    
        if (xhr.status === 200) {
    
          let data = xhr.response;

          if (!searchBar.classList.contains('active')) {
  
            users_list.innerHTML = data;

          }
    
        }
    
      }
    
    }
    
    xhr.send();

  }, 500);
  
});