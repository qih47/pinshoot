<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 4000);
</script>
<script>
    setTimeout(function() {
        $('#belumisi').fadeOut('fast');
    }, 10000); // <-- time in milliseconds
</script>

<script>
    function logoutConfirm() {
        swal.fire({
            title: "Anda yakin ingin keluar?",
            text: "Tekan OK untuk keluar atau CANCEL untuk batalkan!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK',
            closeOnConfirm: true,
            closeOnCancel: true,
            dangerMode: true,
        }).then((result) => {
            if (result.value === true) {
                window.location = 'signout';
            } else {
                swal.fire({
                    text: 'Anda tidak jadi keluar halaman, silahkan lanjutkan tugas!',
                    icon: 'info',
                    type: 'success',
                    button: true
                })

            }
        })
    }
</script>

<script>
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

        if (h < 9) {
            waktu = "PAGI HARI";
        } else if (h >= 9 && h < 15) {
            waktu = "SIANG HARI";
        } else if (h >= 15 && h < 18) {
            waktu = "SORE HARI";
        } else {
            waktu = "MALAM HARI";
        }

        var time = h + ":" + mnol + m + ":" + snol + s + text;
        document.getElementById("MyClockDisplay").innerText = time;
        document.getElementById("MyClockDisplay").textContent = time;
        document.getElementById("waktu").innerText = waktu;
        document.getElementById("waktu").textContent = waktu;

        setTimeout(showTime, 1000);
    }
    showTime();
</script>

<script>
    $(document).ready(function() {
        $('#tableAkses').DataTable({
            "processing": true,
            "serverSide": true,
            "sPaginationType": "full_numbers",
            "ajax": "system/controllers/getAksesInfo.php",


        });

    });
</script>