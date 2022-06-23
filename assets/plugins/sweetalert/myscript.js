const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal.fire(
        'Sukses',
        flashData,
        'success'
    );
}

// tidak terdeteksi
const flashData2 = $('.data-flash').data('flashdata');
if (flashData2) {
    Swal.fire(
        'Gagal',
        flashData2,
        'warning'
    );
}

// tombol hapus
$('.tombol-hapus').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href')

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data ini tidak akan dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus data'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                document.location.href = href
            );
        }
    })

});