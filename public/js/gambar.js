// mengambil elemen container
const container = document.querySelector(".gambar-item");
// mengambil elemn gambarclass gambar jumbo
const jumbo = document.querySelector(".jumbo");
// mengambil elemen gambar class thumb
const thumbs = document.querySelectorAll(".thumb");

container.addEventListener("click", function (e) {
  if (e.target.className == "thumb") {
    jumbo.src = e.target.src;
    // ketika thumbnail di klik dan gambar utama berubah maka ditambah clas fade untuk animasi
    jumbo.classList.add("fade");
    // untuk mengehtikan class fade supoya jika berpindah ke gambar lainnya masih ada animasinya
    setTimeout(function () {
      jumbo.classList.remove("fade");
    }, 500);

    // mengecek apkah  thumb ada kelas active atau tidak kalau ada di hapus
    thumbs.forEach(function (thumb) {
      if (thumb.classList.contains("active")) {
        thumb.classList.remove("active");
      }
      //   thumb.className = "thumb";
    });

    // ketika thumbnail di klik maka akan dikasih clas active untuk menandai
    e.target.classList.add("active");
  }
});
