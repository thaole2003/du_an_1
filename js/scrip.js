//show-hidden login
const loginBtnHidden = document.querySelector("#cancellogin");
const loginBtnShow = document.querySelector("#login");

const login = document.querySelector(".login");
loginBtnShow.addEventListener("click", () => {
    login.style.display = "block";
});
loginBtnHidden.addEventListener("click", () => {
    login.style.display = "none";
});
//show-hidden register
const registerBtnHidden = document.querySelector("#cancelregister");
const registerBtnShow = document.querySelector("#register");

const register = document.querySelector(".register");
registerBtnShow.addEventListener("click", () => {
    register.style.display = "block";
});
registerBtnHidden.addEventListener("click", () => {
    register.style.display = "none";
});