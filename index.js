const sentences = [
    "Belanja Mudah, Cepat, dan Aman!, Temukan Semua Kebutuhanmu di Sini!",
]

let sentencesIndex = 0;
let wordIndex = 0;
const textElement = document.getElementById('typewriter');

// Fungsi untuk memunculkan kata per kata
function typeSentence() {
    const words = sentences[sentencesIndex].split(''); // Pecah kalimat menjadi huruf-huruf
    if (wordIndex < words.length) {
        textElement.innerHTML += words[wordIndex]; // Tambahkan huruf
        wordIndex++;
        setTimeout(typeSentence, 90); // Jeda antar-huruf (cepat)
    } else {
        // Reset untuk kalimat berikutnya
        wordIndex = 0;
        sentencesIndex = (sentencesIndex + 1) % sentences.length; // Loop ke kalimat berikutnya
        setTimeout(() => {
            textElement.innerHTML = ''; // Kosongkan teks
            typeSentence(); // Panggil lagi untuk kalimat berikutnya
        }, 1000); // Jeda antar-kalimat (2 detik)
    }
}


// panggil fungsi pertama kali
typeSentence();

// Start Acount

const seeBtn = document.getElementById('login');
const closeBtn = document.querySelector('.close');
const loginModal = document.querySelector('.login');

// Menampilkan Login
seeBtn.addEventListener('click', () => {
    loginModal.style.display = 'block';
    loginModal.style.opacity = '0'; // Mulai dengan opacity 0 (transparan)
    loginModal.style.transition = 'opacity 0.5s'; // Atur transisi lebih cepat
    setTimeout(() => {
        loginModal.style.opacity = '1'; // Setelah 0.5 detik, opacity menjadi 1 (terlihat)
    }, 10); // Sedikit delay agar transisi bisa diterapkan
});

// Menghilangkan Login
closeBtn.addEventListener('click', () => {
    loginModal.style.transition = 'opacity 0.5s'; // Transisi lebih cepat
    loginModal.style.opacity = '0'; // Mengubah opacity menjadi 0
    setTimeout(() => {
        loginModal.style.display = 'none'; // Setelah transisi selesai, sembunyikan modal
    }, 500); // Menunggu 0.5 detik sampai transisi selesai
});


const seeBtnSingin = document.getElementById('singin');
const closeBtnSingin = document.querySelector('.closeSingin');
const singinModal = document.querySelector('.singin');

// Menampilkan Login
seeBtnSingin.addEventListener('click', () => {
    singinModal.style.display = 'block';
    singinModal.style.opacity = '0'; // Mulai dengan opacity 0 (transparan)
    singinModal.style.transition = 'opacity 0.5s'; // Atur transisi lebih cepat
    setTimeout(() => {
        singinModal.style.opacity = '1'; // Setelah 0.5 detik, opacity menjadi 1 (terlihat)
    }, 10); // Sedikit delay agar transisi bisa diterapkan
});

// Menghilangkan Login
closeBtnSingin.addEventListener('click', () => {
    singinModal.style.transition = 'opacity 0.5s'; // Transisi lebih cepat
    singinModal.style.opacity = '0'; // Mengubah opacity menjadi 0
    setTimeout(() => {
        singinModal.style.display = 'none'; // Setelah transisi selesai, sembunyikan modal
    }, 500); // Menunggu 0.5 detik sampai transisi selesai
});

// End Acount

// Start animationAccount

let toastBox = document.getElementById('toastBox');
let successMsg = '<i class="fas fa-circle-check"></i> Successfully submitted';

// ! Tanya Miku
function showToast(msg) {
    let toast = document.createElement('div');
    toast.classList.add('toast');
    toast.innerHTML = msg;
    toastBox.appendChild(toast);

    setTimeout(() => {
        toast.remove();
    }, 6000);
}

// End animationAccount

