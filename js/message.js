const mmodal = document.querySelector(".mmodal");
const mtrigger = document.querySelector(".mtrigger");
const mcloseButton = document.querySelector(".mclose-button");

function mtoggleModal() {
    mmodal.classList.toggle("show-modal");
}

function mwindowOnClick(event) {
    if (event.target === modal) {
        mtoggleModal();
    }
}

mtrigger.addEventListener("click", mtoggleModal);
mcloseButton.addEventListener("click", mtoggleModal);
mwindow.addEventListener("click", mwindowOnClick);


