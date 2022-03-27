
const btns = document.querySelectorAll("#editbutton");



$indexButton=0;


btns.forEach((item, index) => {
    item.addEventListener('click', () =>
        $indexButton=index
        );
});

function usy(){
    return $indexButton;
}


