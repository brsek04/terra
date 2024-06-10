document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('usuario-menu-button').addEventListener('click', function(e) {
        e.preventDefault();
        var dropdown = document.getElementById('dropdown-user');
        dropdown.classList.toggle('hidden');
    });
});

const sidebar = document.querySelector("aside");
const maxSidebar = document.querySelector(".max")
const miniSidebar = document.querySelector(".mini")
const roundout = document.querySelector(".roundout")
const maxToolbar = document.querySelector(".max-toolbar")
const logo = document.querySelector('.logo')
const content = document.querySelector('.content')
const moon = document.querySelector(".moon")
const sun = document.querySelector(".sun")

window.setDark = function setDark(val){
    if(val === "dark"){
        document.documentElement.classList.add('dark')
        moon.classList.add("hidden")
        sun.classList.remove("hidden")
    }else{
        document.documentElement.classList.remove('dark')
        sun.classList.add("hidden")
        moon.classList.remove("hidden")
    }
}

window.openNav =function openNav() {
    if(sidebar.classList.contains('-translate-x-48')){
        // max sidebar 
        sidebar.classList.remove("-translate-x-48")
        sidebar.classList.add("translate-x-none")
        maxSidebar.classList.remove("hidden")
        maxSidebar.classList.add("flex")
        miniSidebar.classList.remove("flex")
        miniSidebar.classList.add("hidden")
        maxToolbar.classList.add("translate-x-0")
        maxToolbar.classList.remove("translate-x-24","scale-x-0")
        logo.classList.remove("ml-12")
        content.classList.remove("ml-12")
        content.classList.add("ml-12","md:ml-60")
    }else{
        // mini sidebar
        sidebar.classList.add("-translate-x-48")
        sidebar.classList.remove("translate-x-none")
        maxSidebar.classList.add("hidden")
        maxSidebar.classList.remove("flex")
        miniSidebar.classList.add("flex")
        miniSidebar.classList.remove("hidden")
        maxToolbar.classList.add("translate-x-24","scale-x-0")
        maxToolbar.classList.remove("translate-x-0")
        logo.classList.add('ml-12')
        content.classList.remove("ml-12","md:ml-60")
        content.classList.add("ml-12")

    }

}

window.resizeSidebar =function resizeSidebar() {
    var sidebar = document.getElementById('sidebar-admin');
    if (window.innerWidth < 768) { // Small screens
        sidebar.classList.add("-translate-x-48")
        sidebar.classList.remove("translate-x-none")
        maxSidebar.classList.add("hidden")
        maxSidebar.classList.remove("flex")
        miniSidebar.classList.add("flex")
        miniSidebar.classList.remove("hidden")
        maxToolbar.classList.add("translate-x-24","scale-x-0")
        maxToolbar.classList.remove("translate-x-0")
        logo.classList.add('ml-12')
        content.classList.remove("ml-12","md:ml-60")
        content.classList.add("ml-12")


    } else { // Medium and larger screens
        sidebar.classList.remove("-translate-x-48")
        sidebar.classList.add("translate-x-none")
        maxSidebar.classList.remove("hidden")
        maxSidebar.classList.add("flex")
        miniSidebar.classList.remove("flex")
        miniSidebar.classList.add("hidden")
        maxToolbar.classList.add("translate-x-0")
        maxToolbar.classList.remove("translate-x-24","scale-x-0")
        logo.classList.remove("ml-12")
        content.classList.remove("ml-12")
        content.classList.add("ml-12","md:ml-60")

    }
}
resizeSidebar();
window.addEventListener('resize', resizeSidebar);

document.querySelectorAll('[data-modal-toggle]').forEach(button => {
    button.addEventListener('click', () => {
        const modalId = button.getAttribute('data-modal-toggle');
        const modal = document.getElementById(modalId);
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        modal.setAttribute('aria-hidden', 'false');
    });
});

document.querySelectorAll('[data-modal-hide]').forEach(button => {
    button.addEventListener('click', () => {
        const modalId = button.getAttribute('data-modal-hide');
        const modal = document.getElementById(modalId);
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        modal.setAttribute('aria-hidden', 'true');
    });
});