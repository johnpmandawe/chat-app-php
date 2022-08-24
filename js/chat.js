window.addEventListener('pageshow', function () {

    const form = document.querySelector('.type_area'),
    msg = document.querySelector('.message'),
    btn = document.querySelector('.send'),
    chatBox = document.querySelector('.chat_box');

    form.onsubmit =(e)=> {

      e.preventDefault();

    }

    chatBox.onmouseenter = () => {

      chatBox.classList.add('active');

    }

    chatBox.onmouseleave = () => {

      chatBox.classList.remove('active');

    }
  
    btn.onclick = ()=> {
  
      let xhr = new XMLHttpRequest();
  
      xhr.open('POST', 'php/insert_chat.php', true);
  
      xhr.onload = ()=> {
  
        if (xhr.readyState === XMLHttpRequest.DONE) {
  
          if (xhr.status === 200) {

            msg.value = "";

            scrollToBottom();
  
          }
  
        }
  
      }
  
      let formData = new FormData(form);
  
      xhr.send(formData);
  
    }

    setInterval(() => {
  
      let xhr = new XMLHttpRequest();
      
      xhr.open('POST', 'php/get_chat.php', true);
      
      xhr.onload = ()=> {
      
        if (xhr.readyState === XMLHttpRequest.DONE) {
      
          if (xhr.status === 200) {
      
            let data = xhr.response;

            chatBox.innerHTML = data;

            if (!chatBox.classList.contains('active')) {

              scrollToBottom();

            }
      
          }
      
        }
      
      }

      let formData = new FormData(form);
      
      xhr.send(formData);
  
    }, 500);

    function scrollToBottom() {

      chatBox.scrollTop = chatBox.scrollHeight;

    }
  
});