const header=document.querySelector("header");

window.addEventListener("scroll",function(){
    header.classList.toggle("sticky", window.scrollY > 120);
});
let menu=document.querySelector('#menu-icon');
let navlist=document.querySelector('.navlist');

menu.onclick =() => {
    menu.classList.toggle('bx-x');
    navlist.classList.toggle('active');
};
window.onscroll = () => {
    menu.classList.remove('bx-x');
    menu.classList.remove('active');

}

function openModal() {
    document.getElementById("signInModal").style.display = "block";
}


function closeModal() {
    document.getElementById("signInModal").style.display = "none";
}

window.onclick = function(event) {
    var modal = document.getElementById("signInModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}