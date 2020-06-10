let chiepsField = document.querySelector('.chieps-field');
let lastname = document.querySelector('.input-lastname');
let name = document.querySelector('.input-name');
let patronymic = document.querySelector('.input-patronymic');
document.querySelector('.form-submit-btn').onclick = checkInputs;


function checkInputs(e) {
    if (lastname.value == '' || name.value == '' || name.patronymic == '') {
        chipsCreate();
        return false;
    }
}

function chipsCreate() {
    let chips = document.createElement('div');
    chips.classList.add('chips');
    let message = document.createTextNode("Заполните поля!");
    chips.appendChild(message);
    chiepsField.appendChild(chips);

    setTimeout(() => {
        chipsRemove(chips);
    }, 3000)
}

function chipsRemove(chips) {
    chips.remove();
}