window.setTimeout(function () {
  $(".alert")
    .fadeTo(500, 0)
    .slideUp(500, function () {
      $(this).remove();
    });
}, 4000);

setTimeout(function () {
  $("#belumisi").fadeOut("fast");
}, 10000); // <-- time in milliseconds

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#foto").attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

// Onchange Locker
function updateKodeLocker() {
  var lockerSelect = document.getElementById("nomor");
  var kodeInput = document.getElementById("kode");
  var selectedLocker = lockerSelect.value;
  var lockerNumber = selectedLocker.substr(7);
  var kodeLocker = "L" + parseInt(lockerNumber);
  kodeInput.value = kodeLocker;
}

// Cek Verifikasi Password
function checkPasswordMatch() {
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("verpassword").value;
  var passwordMatchMessage = document.getElementById("passwordMatchMessage");

  if (password === "" || confirmPassword === "") {
    passwordMatchMessage.innerText = "";
    passwordMatchMessage.classList.remove("password-not-match");
    passwordMatchMessage.classList.remove("password-match");
  } else if (password !== confirmPassword) {
    passwordMatchMessage.innerText = "Password tidak cocok";
    passwordMatchMessage.classList.remove("password-match");
    passwordMatchMessage.classList.add("password-not-match");
    passwordMatchMessage.style.color = "red"; // Set text color to red
  } else {
    passwordMatchMessage.innerText = "Password cocok";
    passwordMatchMessage.classList.remove("password-not-match");
    passwordMatchMessage.classList.add("password-match");
    passwordMatchMessage.style.color = "green"; // Set text color to green
  }
}

function logoutConfirm() {
  swal
    .fire({
      title: "Anda yakin ingin keluar?",
      text: "Tekan OK untuk keluar atau CANCEL untuk batalkan!",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "OK",
      closeOnConfirm: true,
      closeOnCancel: true,
      dangerMode: true,
    })
    .then((result) => {
      if (result.value === true) {
        window.location = "?hal=logout";
      } else {
        swal.fire({
          text: "Anda tidak jadi keluar halaman, silahkan lanjutkan tugas!",
          icon: "info",
          type: "success",
          button: true,
        });
      }
    });
}

function showTime() {
  var date = new Date();
  var h = date.getHours(); // 0 - 23
  var m = date.getMinutes(); // 0 - 59
  var s = date.getSeconds(); // 0 - 59
  text = " WIB";
  if (m < 10) {
    mnol = 0;
  } else {
    mnol = "";
  }
  if (s < 10) {
    snol = 0;
  } else {
    snol = "";
  }
  if (h < 10) {
    hnol = 0;
  } else {
    hnol = "";
  }

  if (h < 9) {
    waktu = "PAGI HARI";
  } else if (h >= 9 && h < 15) {
    waktu = "SIANG HARI";
  } else if (h >= 15 && h < 18) {
    waktu = "SORE HARI";
  } else {
    waktu = "MALAM HARI";
  }

  var time = hnol + h + ":" + mnol + m + ":" + snol + s + text;
  document.getElementById("MyClockDisplay").innerText = time;
  document.getElementById("MyClockDisplay").textContent = time;
  document.getElementById("waktu").innerText = waktu;
  document.getElementById("waktu").textContent = waktu;

  setTimeout(showTime, 1000);
}
showTime();

// Table Akses Personil
$(document).ready(function () {
  $("#tableAkses").DataTable({
    processing: true,
    serverSide: true,
    sPaginationType: "full_numbers",
    ajax: "system/controllers/showAksesInfo.php",
    dataSrc: "",
    order: [],
    fnCreatedRow: function (row, data, index) {
      $("td", row)
        .eq(0)
        .html(index + 1);
    },
    columnDefs: [
      {
        targets: [9],
        data: null,
        render: function (data, dt, ids, type, row) {
          var indexID = data[0];
          var indexNama = data[1];
          var indexNpp = data[2];
          var btn =
            '<center></a> <a href="pages/controllers/index/hal.php?i=pages8&pesan=' +
            data[0] +
            '"class="btn btn-success btn-xs"><i class="fas fa-edit"></i></a> <a onclick="confirmDeleteAksesPersonil(\'' +
            indexID +
            "', '" +
            indexNama +
            "', '" +
            indexNpp +
            '\')" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a></center>';
          return btn;
        },
      },
    ],
  });
});

// Delete akses personil
function confirmDeleteAksesPersonil(id, nama, npp) {
  Swal.fire({
    title: "Konfirmasi Hapus Data",
    text:
      "Anda yakin ingin menghapus Data " +
      id +
      " dengan nama " +
      nama +
      " dan nomor NPP " +
      npp +
      "?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Hapus",
    cancelButtonText: "Batal",
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
  })
    .then((result) => {
      if (result.isConfirmed) {
        window.location.href =
          "system/controllers/deleteData.php?sesi=akses&id=" + id;
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire("Dibatalkan", "Operasi penghapusan dibatalkan.", "info");
      }
    })
    .catch((error) => {
      console.log(error);
      Swal.fire("Error", "Terjadi kesalahan dalam menampilkan pesan.", "error");
    });
}

$(document).ready(function () {
  $("#tablePersonil").DataTable({
    processing: true,
    serverSide: true,
    sPaginationType: "full_numbers",
    ajax: "system/controllers/showPersonil.php",
    dataSrc: "",
    order: [],
    fnCreatedRow: function (row, data, index) {
      $("td", row)
        .eq(0)
        .html(index + 1);
    },
    columnDefs: [
      {
        targets: [6],
        data: null,
        render: function (data, dt, ids, type, row) {
          var indexID = data[0];
          var indexNama = data[1];
          var indexNpp = data[2];
          var btn =
            '<center></a> <a href="pages/controllers/index/hal.php?i=pages6&pesan=' +
            data[0] +
            '"class="btn btn-success btn-xs"><i class="fas fa-edit"></i></a> <a onclick="confirmDeleteDataPersonil(\'' +
            indexID +
            "', '" +
            indexNama +
            "', '" +
            indexNpp +
            '\')" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a></center>';
          return btn;
        },
      },
    ],
  });
});

// Delete data personil
function confirmDeleteDataPersonil(id, nama, npp) {
  Swal.fire({
    title: "Konfirmasi Hapus Data",
    text:
      "Anda yakin ingin menghapus Data " +
      id +
      " dengan nama " +
      nama +
      " dan nomor NPP " +
      npp +
      "?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Hapus",
    cancelButtonText: "Batal",
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
  })
    .then((result) => {
      if (result.isConfirmed) {
        window.location.href =
          "system/controllers/deleteData.php?sesi=personil&id=" + id;
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire("Dibatalkan", "Operasi penghapusan dibatalkan.", "info");
      }
    })
    .catch((error) => {
      console.log(error);
      Swal.fire("Error", "Terjadi kesalahan dalam menampilkan pesan.", "error");
    });
}

// Table User
$(document).ready(function () {
  $("#tableUser").DataTable({
    processing: true,
    serverSide: true,
    sPaginationType: "full_numbers",
    ajax: "system/controllers/showUser.php",
    dataSrc: "",
    order: [],
    fnCreatedRow: function (row, data, index) {
      $("td", row)
        .eq(0)
        .html(index + 1);
    },
    columnDefs: [
      {
        targets: [6],
        data: null,
        render: function (data, type, row) {
          var indexID = data[0];
          var indexNama = data[2];
          var indexNpp = data[3];
          var btn =
            '<center></a> <a href="pages/controllers/index/hal.php?i=pages10&pesan=' +
            data[0] +
            '"class="btn btn-success btn-xs"><i class="fas fa-edit"></i></a> <a onclick="confirmDeleteDataUser(\'' +
            indexID +
            "', '" +
            indexNama +
            "', '" +
            indexNpp +
            '\')" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a></center>';
          return btn;
        },
      },
      {
        data: null,
        targets: [5],
        width: "8%",
        render: function (data, type, row) {
          return '<img src="assets/profile/' + data[5] + '" width="100" >';
        },
      },
    ],
  });
});

// Delete data user
function confirmDeleteDataUser(id, nama, npp) {
  Swal.fire({
    title: "Konfirmasi Hapus Data",
    text:
      "Anda yakin ingin menghapus Data " +
      id +
      " dengan nama " +
      nama +
      " dan nomor NPP " +
      npp +
      "?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Hapus",
    cancelButtonText: "Batal",
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
  })
    .then((result) => {
      if (result.isConfirmed) {
        window.location.href =
          "system/controllers/deleteData.php?sesi=user&id=" + id;
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire("Dibatalkan", "Operasi penghapusan dibatalkan.", "info");
      }
    })
    .catch((error) => {
      console.log(error);
      Swal.fire("Error", "Terjadi kesalahan dalam menampilkan pesan.", "error");
    });
}

// Kunci Locker
$(document).ready(function () {
  $("#tableLocker").DataTable({
    processing: true,
    serverSide: true,
    sPaginationType: "full_numbers",
    ajax: "system/controllers/showLocker.php",
    dataSrc: "",
    order: [],
    fnCreatedRow: function (row, data, index) {
      $("td", row)
        .eq(0)
        .html(index + 1);
    },
    columnDefs: [
      {
        targets: [5],
        data: null,
        render: function (data, type, row) {
          var indexID = data[0];
          var indexNo = data[1];
          var indexNama = data[4];
          var btn =
            '<center><a href="pages/controllers/index/hal.php?i=pages13&pesan=' +
            data[0] +
            '" class="btn btn-success btn-xs"><i class="fas fa-edit"></i></a> <a onclick="confirmDeleteDataLocker(\'' +
            indexID +
            "', '" +
            indexNo +
            "', '" +
            indexNama +
            '\')" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a></center>';
          return btn;
        },
      },
    ],
  });
});

// Delete data Locker
function confirmDeleteDataLocker(id, nomor, namagedung) {
  Swal.fire({
    title: "Konfirmasi Hapus Data",
    text:
      "Anda yakin ingin menghapus Data " +
      id +
      " dengan nomor " +
      nomor +
      " dan nama gedung " +
      namagedung +
      "?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Hapus",
    cancelButtonText: "Batal",
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
  })
    .then((result) => {
      if (result.isConfirmed) {
        window.location.href =
          "system/controllers/deleteData.php?sesi=locker&id=" + id;
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire("Dibatalkan", "Operasi penghapusan dibatalkan.", "info");
      }
    })
    .catch((error) => {
      console.log(error);
      Swal.fire("Error", "Terjadi kesalahan dalam menampilkan pesan.", "error");
    });
}

$(document).ready(function () {
  $("#npp").on("change", function () {
    var id = this.value;
    $.get(
      "system/controllers/getPersonil.php",
      { id: id },
      function (data) {
        if (data !== "") {
          var nama_personil = data["nama"];
          var npp = data["npp"];
          var divisi = data["divisi"];
          $("#nama").val(nama_personil.trim());
          $("#npps").val(npp.trim());
          $("#divisi").val(divisi.trim());
        } else {
          $("#nama").val("");
          $("#npps").val("");
          $("#divisi").val("");
        }
      },
      "json"
    );
  });
});

// Simpan tambah akses personil
function simpanAkses() {
  $.ajax({
    url: "system/controllers/simpanData.php?sesi=akses",
    method: "POST",
    data: {
      personil: npp.value,
      norf: norfid.value,
      loker: locker.value,
    },
    success: function (response) {
      if (response === "error") {
        gagalInputData();
      } else {
        berhasilInputAksesPersonil();
      }
    },
  });
}

// Simpan edit akses personil
function editAkses() {
  var currentURL = window.location.href;
  var urlParams = new URLSearchParams(new URL(currentURL).search);
  var idAkses = urlParams.get("pesan");
  $.ajax({
    url: "system/controllers/editData.php?sesi=akses",
    method: "POST",
    data: {
      idakses: idAkses,
      norf: norfid.value,
      loker: locker.value,
    },
    success: function (response) {
      if (response === "error") {
        gagalEditData();
      } else {
        berhasilEditAksesPersonil();
        // $("#test").html(response).css("color", "green");
      }
    },
  });
}

// Tambah Personil
function tambahPersonil() {
  // console.log(nonpp.value);
  $.ajax({
    url: "system/controllers/simpanData.php?sesi=personil",
    method: "POST",
    data: {
      nama: nama.value,
      npp: nonpp.value,
      divisi: divisi.value,
      lokasi: lokasi.value,
    },
    success: function (response) {
      if (response === "error") {
        gagalInputData();
      } else {
        berhasilInputDataPersonil();
        // $("#test").html(response).css("color", "green");
      }
    },
  });
}

// Simpan edit akses personil
function editPersonil() {
  var currentURL = window.location.href;
  var urlParams = new URLSearchParams(new URL(currentURL).search);
  var idpersonil = urlParams.get("pesan");
  $.ajax({
    url: "system/controllers/editData.php?sesi=personil",
    method: "POST",
    data: {
      idpersonil: idpersonil,
      nama: nama.value,
      npp: nppedit.value,
      divisi: divisi.value,
      lokasi: lokasi.value,
    },
    success: function (response) {
      if (response === "error") {
        gagalEditData();
      } else {
        berhasilEditDataPersonil();
        // $("#test").html(response).css("color", "green");
      }
    },
  });
}

// Tambah Locker
function tambahLocker() {
  console.log(nomor.value);
  $.ajax({
    url: "system/controllers/simpanData.php?sesi=locker",
    method: "POST",
    data: {
      nomor: nomor.value,
      kode: kode.value,
      nogedung: nogedung.value,
      namagedung: namaGedung.value,
    },
    success: function (response) {
      if (response === "error") {
        gagalInputData();
      } else {
        berhasilInputDataLocker();
        // $("#test").html(response).css("color", "green");
      }
    },
  });
}

// Simpan edit Locker
function editLocker() {
  var currentURL = window.location.href;
  var urlParams = new URLSearchParams(new URL(currentURL).search);
  var idLocker = urlParams.get("pesan");
  $.ajax({
    url: "system/controllers/editData.php?sesi=locker",
    method: "POST",
    data: {
      id: idLocker,
      nomor: nomor.value,
      kode: kode.value,
      nogedung: nogedung.value,
      namagedung: namaGedung.value,
    },
    success: function (response) {
      if (response === "error") {
        gagalEditData();
      } else {
        berhasilEditLocker();
        // $("#test").html(response).css("color", "green");
      }
    },
  });
}

function gagalInputData() {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener("mouseenter", Swal.stopTimer);
      toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
  });

  Toast.fire({
    icon: "error",
    title: "Gagal menyimpan data ke database!!",
  });
}

function berhasilInputAksesPersonil() {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener("mouseenter", Swal.stopTimer);
      toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
    willClose: () => {
      document.querySelector(".swal-toast-container");
      window.location.href =
        "pages/controllers/index/hal.php?i=pages2&pesan=sukses";
    },
  });

  Toast.fire({
    icon: "success",
    title: "Berhasil menyimpan data akses personil!!",
  });
}

function berhasilInputDataPersonil() {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener("mouseenter", Swal.stopTimer);
      toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
    willClose: () => {
      document.querySelector(".swal-toast-container");
      window.location.href =
        "pages/controllers/index/hal.php?i=pages4&pesan=sukses";
    },
  });

  Toast.fire({
    icon: "success",
    title: "Berhasil menyimpan data personil!!",
  });
}

function gagalEditData() {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener("mouseenter", Swal.stopTimer);
      toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
  });

  Toast.fire({
    icon: "error",
    title: "Gagal mengedit data di database!!",
  });
}

// Edit Akses Personil Berhasil
function berhasilEditAksesPersonil() {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener("mouseenter", Swal.stopTimer);
      toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
    willClose: () => {
      document.querySelector(".swal-toast-container");
      window.location.href =
        "pages/controllers/index/hal.php?i=pages2&pesan=edited";
    },
  });

  Toast.fire({
    icon: "success",
    title: "Berhasil mengedit data akses personil!!",
  });
}

// Edit Data Personil Berhasil
function berhasilEditDataPersonil() {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener("mouseenter", Swal.stopTimer);
      toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
    willClose: () => {
      document.querySelector(".swal-toast-container");
      window.location.href =
        "pages/controllers/index/hal.php?i=pages4&pesan=edited";
    },
  });

  Toast.fire({
    icon: "success",
    title: "Berhasil mengedit data personil!!",
  });
}

// Input Data Locker
function berhasilInputDataLocker() {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener("mouseenter", Swal.stopTimer);
      toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
    willClose: () => {
      document.querySelector(".swal-toast-container");
      window.location.href =
        "pages/controllers/index/hal.php?i=pages11&pesan=sukses";
    },
  });

  Toast.fire({
    icon: "success",
    title: "Berhasil menyimpan data Locker!!",
  });
}

// Edit Data Locker Berhasil
function berhasilEditLocker() {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener("mouseenter", Swal.stopTimer);
      toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
    willClose: () => {
      document.querySelector(".swal-toast-container");
      window.location.href =
        "pages/controllers/index/hal.php?i=pages11&pesan=edited";
    },
  });

  Toast.fire({
    icon: "success",
    title: "Berhasil mengedit data locker!!",
  });
}

document.addEventListener("DOMContentLoaded", function () {
  $("#import_file").hide();
  $("#imports").hide();
  $("#import").on("click", function () {
    $("#import_file").removeClass("hidden");
    $("#import_file").removeClass("fade");
    $("#imports").removeClass("hidden");
    $("#imports").removeClass("fade");
    $("#import_file").toggle();
    $("#imports").toggle();
  });
});

$(document).ready(function () {
  $("#import_personil_excel_form").on("submit", function (event) {
    event.preventDefault();
    $.ajax({
      url: "system/controllers/ImportPersonil",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        $("#imports").attr("disabled", "disabled");
        $("#imports").val("Sedang Mengimport...");
      },
      success: function (data) {
        $("#message").html(data);
        $("#import_excel_form")[0].reset();
        $("#imports").attr("disabled", false);
        $("#imports").val("Imports");
      },
    });
  });
});

// Locker Popup
function getDataAndUpdate() {
  fetch("system/controllers/getDataStatusLocker.php")
    .then((response) => response.json())
    .then((data) => {
      // Update tombol berdasarkan data terbaru dari server
      data.forEach((row) => {
        const button = document.getElementById(row.id);
        if (button) {
          button.dataset.status = row.status;
          if (row.status === "0") {
            button.style.backgroundColor = "";
            button.innerHTML = `${row.kode_locker}<i class="fa fa-lock md-1 mt-2 px-2" style="font-size: 20px;"></i>`;
          } else {
            button.style.backgroundColor = "green";
            button.innerHTML = `${row.kode_locker}<i class="fa fa-unlock md-1 mt-2 px-2" style="font-size: 20px;"></i>`;
          }
        }
      });

      setTimeout(getDataAndUpdate, 5000); 
    })
    .catch((error) => {
      console.error("Error:", error);
      setTimeout(getDataAndUpdate, 5000); 
    });
}

// Mulai polling saat halaman web dimuat
getDataAndUpdate();

function showPopup(button) {
  var id = button.dataset.id;
  var nomor = button.dataset.nomor;
  var nama = button.dataset.kode;
  var nomorGedung = button.dataset.nomorgedung;
  var namaGedung = button.dataset.namagedung;
  var status = button.dataset.status;

  // Cek apakah popup telah ditampilkan
  var popup = button.querySelector(".popup");
  if (popup) {
    return;
  }

  var popup = document.createElement("div");
  if (status === "0") {
    color = "red"; // Tidak perlu deklarasi var lock dan var color lagi
    lock = "Locked"; // karena variabel tersebut sudah didefinisikan di atas
  } else {
    color = "green";
    lock = "Unlocked";
  }

  popup.classList.add("popup");
  popup.classList.add("show-popup"); // Tambahkan class 'show-popup' ke popup

  popup.innerHTML = `
            <div class="popup">
                <h6><b><u>INFORMASI LOKER</u></b></h6>
                <strong>Nomor Locker:</strong> ${nomor}<br>
                <strong>Nama Locker:</strong> ${nama}<br>
                <strong>Nomor Gedung:</strong> ${nomorGedung}<br>
                <strong>Nama Gedung:</strong> ${namaGedung}<br>
                <strong>Status Locker:</strong> <a style="color:${color}">${lock}</a><br>
                <strong>Buka Kunci: </strong><button id="${id}" name="lockerKey" class="btn btn-primary" value="${status}" onclick="updateStatus()"> <i class="fa fa-key"></i></button>
            </div><br>
        `;

  button.appendChild(popup);
}

function hidePopup(button) {
  var popup = button.querySelector(".popup");
  if (popup) {
    button.removeChild(popup);
  }
}

    function updateStatus() {
      var button = event.currentTarget;
      var id = button.id;
      var status = button.value;
      // console.log(status);
      $.ajax({
        url: "system/controllers/editData.php?sesi=status",
        method: "POST",
        data: {
          id: id,
          status: status,
        },
        success: function (response) {
          if (response === "error") {
            gagalInputData();
          } else if(response === "dibuka"){
            berhasilEditStatusBuka();
          } else {
            // $("#test").html(response).css("color", "green");
            // console.log(response);
            berhasilEditStatusKunci();
          }
        },
      });
    }

    // Locker di Buka
    function berhasilEditStatusBuka() {
      const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener("mouseenter", Swal.stopTimer);
          toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
      });

      Toast.fire({
        icon: "success",
        title: "Locker berhasil dibuka!!",
      });
}
    
    // Locker di kunci
    function berhasilEditStatusKunci() {
      const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener("mouseenter", Swal.stopTimer);
          toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
      });

      Toast.fire({
        icon: "success",
        title: "Locker berhasil dikunci!!",
      });
    }