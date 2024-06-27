window.addEventListener('scroll', function() {
    var dropdown = document.getElementById('myDropdown');
    var scrollPosition = window.scrollY;

    if (scrollPosition > 0) {
        dropdown.classList.add('scrolled');
    } else {
        dropdown.classList.remove('scrolled');
    }
});
