
setTimeout(() => {
    let message=document.querySelector('#show-smg');
    if(message){
       message.style.display="none";
    }
}, 5000);

setTimeout(() => {
    let success=document.querySelector('.success');
    if(success){
      success.style.display="none";
    }
    let error=document.querySelector('.error');
    if(error){
      error.style.display="none";
    }
}, 3000);