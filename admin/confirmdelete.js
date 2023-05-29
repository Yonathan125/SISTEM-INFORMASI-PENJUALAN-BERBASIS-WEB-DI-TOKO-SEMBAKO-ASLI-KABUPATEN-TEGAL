function confirmDelete(event) {
    var hasil = confirm('Yakin hapus?');
    if(!hasil) {
        event.preventDefault();
    } else {
        return hasil;
    }
}