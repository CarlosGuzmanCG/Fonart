let navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () => {
  navbar.classList.toggle('active');
  profile.classList.remove('active');
}

let profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () => {
  profile.classList.toggle('active');
  navbar.classList.remove('active');
}


window.onscroll = () =>{
  profile.classList.remove('active');
  navbar.classList.remove('active');
}

function myFunction(smallImg) {
    var fullImg = document.getElementById("imageBox");
    fullImg.src = smallImg.src;
  }

  const modalAdd = document.querySelector('#modalAdd');

  const openModal = () => {
    modalAdd.style.display = 'flex';
  }

  const closeModal = () => {
    modalAdd.style.display = 'none';
  }

  modalAdd.onclick = (event) => {
    if(event.target == modalAdd){
      closeModal();
    }
  }