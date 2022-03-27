
const btns = document.querySelectorAll("#editbutton");








btns.forEach((item, index) => {
    item.addEventListener('click', () =>
        console.log(index));
});




