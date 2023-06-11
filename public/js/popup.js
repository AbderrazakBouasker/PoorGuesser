const overlayusername = document.querySelector(".popup-overlay-username")
document.querySelector("#show-modal-username").addEventListener("click",()=>{
    overlayusername.style.display = "block";
})
document.querySelector("#close-modal-username").addEventListener("click",()=>{
    overlayusername.style.display = "none";
})

const overlayemail = document.querySelector(".popup-overlay-email")
document.querySelector("#show-modal-email").addEventListener("click",()=>{
    overlayemail.style.display = "block";
})
document.querySelector("#close-modal-email").addEventListener("click",()=>{
    overlayemail.style.display = "none";
})

const overlaypassword = document.querySelector(".popup-overlay-password")
document.querySelector("#show-modal-password").addEventListener("click",()=>{
    overlaypassword.style.display = "block";
})
document.querySelector("#close-modal-password").addEventListener("click",()=>{
    overlaypassword.style.display = "none";
})