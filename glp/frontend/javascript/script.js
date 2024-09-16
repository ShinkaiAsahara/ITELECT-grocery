function openModal() {
    const modal = document.getElementById('myModal');
    const modalContent = modal.querySelector('.modal-content');
    modal.style.display = 'block';
    modalContent.classList.add('show'); 
}

function closeModal() {
    const modal = document.getElementById('myModal');
    const modalContent = modal.querySelector('.modal-content');
    modalContent.classList.remove('show');
    setTimeout(() => {
        modal.style.display = 'none'; 
    }, 300); 
}

function toggleSearch() {
    const searchInput = document.getElementById('searchInput');
    searchInput.classList.toggle('show');
}

