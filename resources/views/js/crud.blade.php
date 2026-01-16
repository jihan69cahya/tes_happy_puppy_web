{{-- Fungsi global untuk mengirim data ke controller (insert, update, delete) --}}
<script>
    function tambah_data() {
        var formData = new FormData(document.getElementById('formData'));
        $.ajax({
            type: "POST",
            url: url_tambah,
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function() {
                showLoader();
            },
            success: function(response) {
                delete_error();
                if (response.errors) {
                    Object.keys(response.errors).forEach(function(fieldName) {
                        $("#error-" + fieldName).show();
                        $("#error-" + fieldName).html(
                            response.errors[fieldName][0]
                        );
                    });
                } else if (response.success) {
                    $("#modal").modal("hide");
                    Swal.fire(
                        'Berhasil!',
                        response.success,
                        'success'
                    );
                    get_data();
                } else if (response.error) {
                    Swal.fire(
                        'Gagal!',
                        response.error,
                        'error'
                    );
                }
                hideLoader();
            },
            error: function(xhr, status, error) {
                hideLoader();
                Swal.fire(
                    'Gagal!',
                    'Terjadi kesalahan, coba lagi nanti',
                    'error'
                )
            },
        });
        return false;
    }

    function edit_data() {
        var formData = new FormData(document.getElementById('formData'));
        var id = $('#id').val();
        $.ajax({
            type: "POST",
            url: url_edit.replace(':id', id),
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-HTTP-Method-Override', 'PUT');
                showLoader();
            },
            success: function(response) {
                delete_error();
                if (response.errors) {
                    Object.keys(response.errors).forEach(function(fieldName) {
                        $("#error-" + fieldName).show();
                        $("#error-" + fieldName).html(
                            response.errors[fieldName][0]
                        );
                    });
                } else if (response.success) {
                    $("#modal").modal("hide");
                    Swal.fire(
                        'Berhasil!',
                        response.success,
                        'success'
                    );
                    get_data();
                } else if (response.error) {
                    Swal.fire(
                        'Gagal!',
                        response.error,
                        'error'
                    );
                }
                hideLoader();
            },
            error: function(xhr, status, error) {
                hideLoader();
                Swal.fire(
                    'Gagal!',
                    'Terjadi kesalahan, coba lagi nanti',
                    'error'
                )
            },
        });
        return false;
    }

    function hapus_data(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2e8e87',
            cancelButtonColor: '#C42A02',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: url_hapus + "/" + id,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    dataType: "json",
                    beforeSend: function() {
                        showLoader();
                    },
                    complete: function() {
                        hideLoader();
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire(
                                'Berhasil!',
                                response.success,
                                'success'
                            );
                            get_data();
                        } else if (response.error) {
                            Swal.fire(
                                'Gagal!',
                                response.error,
                                'error'
                            );
                        }
                    },
                    error: function() {
                        Swal.fire(
                            'Gagal!',
                            'Terjadi kesalahan, coba lagi nanti',
                            'error'
                        )
                    },
                });
            }
        });
    }
</script>
