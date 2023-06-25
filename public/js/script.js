// Ambil elemen tombol
var button = document.getElementById("back-to-top");

// Tampilkan tombol saat scrolling lebih dari 20 piksel dari bagian atas halaman
window.onscroll = function () {
	if (document.documentElement.scrollTop > 20) {
		button.style.display = "block";
	} else {
		button.style.display = "none";
	}
};

// Fungsi untuk kembali ke atas saat tombol diklik
button.onclick = function () {
	document.documentElement.scrollTop = 0;
};
