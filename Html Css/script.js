function toggleNav(){
    let nav = document.querySelector('.navigation');
    nav.classList.toggle('close');
}
function toggleFilterOption(element){
    let parentElement = element.parentElement;
    parentElement.classList.toggle('close');
}
function toggleFilter(){
    let element = document.querySelector('.results-displayer > div > div');
    element.classList.toggle('open');
}

console.log(Promise);


