//code for hamburger menu when clicked on mobile devices 
const hamburger = document.querySelector('.hamburger');
const menu = document.querySelector('.menu');
const links = document.querySelectorAll('.menu-list');


const subMenu = document.querySelector('.submenu');
const subTeacherMenu = document.querySelector('.teachersubmenu');
const subStudentMenu = document.querySelector('.studentsubmenu');
const studentmenu = document.querySelector('.studentmenu');
const teachermenu = document.querySelector('.teachermenu');

teachermenu.addEventListener('click', () => {
    console.log("try");
    subMenu.classList.toggle('openmenu');
    subTeacherMenu.classList.toggle('openmenu');
});
studentmenu.addEventListener('click', () => {
    console.log("try");
    subMenu.classList.toggle('openmenu');
    subStudentMenu.classList.toggle('openmenu');
});

hamburger.addEventListener('click', () => {
    console.log("try");
    hamburger.classList.toggle('active');
    menu.classList.toggle('open');
});

function inputvalidation(){
        const inputcheck = document.querySelectorAll(".input");
        var checkvalue = true;
        Array.from(inputcheck).forEach(input => {
            if(input.value == "") checkvalue = false; 
        })
        if(!checkvalue) window.alert("Please fill all the textfield");
}