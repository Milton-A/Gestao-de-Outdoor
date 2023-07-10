document.addEventListener('DOMContentLoaded', function () {
    // Selecionar o botão do dropdown
    var dropdownButton = document.getElementById('dropdownMenuButton');

    // Adicionar um evento de clique ao botão
    dropdownButton.addEventListener('click', function () {
        // Selecionar o menu do dropdown
        var dropdownMenu = document.querySelector('.dropdown-menu');

        // Alternar a exibição do menu
        if (dropdownMenu.style.display === 'block') {
            dropdownMenu.style.display = 'none';
            dropdownMenu.classList.remove('dropdown-menu-start');
        } else {
            dropdownMenu.style.display = 'block';
            dropdownMenu.classList.add('dropdown-menu-start');
        }
    });
});