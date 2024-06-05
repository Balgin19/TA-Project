@extends('layouts.master')

@section('content')

<div class="pagetitle">
    <h1 style="display: inline-block;">Permintaan Pembayaran</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Menu</a></li>
            <li class="breadcrumb-item">Program</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title"></h6>
                <!-- Elemen Formulir Umum -->
                <form action="{{ route('spp.create') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="nomor_spp" class="col-sm-2 col-form-label">Nomor SPP</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="nomor_spp" name="nomor_spp" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Bagian</label>
                        <div class="col-sm-5">
                            <select class="form-select" name="bagian" required>
                                <option value="ADM">ADM</option>
                                <option value="YANDAR">YANDAR</option>
                                <option value="MK">MK</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Kepentingan</label>
                        <div class="col-sm-5">
                            <select class="form-select" name="kepentingan" required>
                                <option value="Rutin">Rutin</option>
                                <option value="Temporer">Temporer</option>
                                <option value="Khusus">Khusus</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tanggal" class="col-sm-2 col-form-label">Hari/Tanggal</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="uraian_kegiatan" class="col-sm-2 col-form-label">Uraian Kegiatan</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-primary btn-sm" id="addRow">Tambah</button>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <table class="table table-bordered" id="dynamicTable">
                                <thead>
                                    <tr>
                                        <th style="width: 30%;">Uraian Kegiatan</th>
                                        <th>Harga</th>
                                        <th style="width: 10%;">Jumlah</th>
                                        <th>Biaya</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr> 
                                        <td>
                                            <select name="detail_spp[0][uraian_kegiatan]" class="form-control uraian_kegiatan" placeholder="Uraian Kegiatan" required onchange="getHargaJumlah(this)">
                                                <option value=""></option>
                                                @foreach($rencanas as $rencana)
                                                <option value="{{ $rencana->id_proker }}">{{ $rencana->uraian }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        
                                        <td><input type="text" name="detail_spp[0][harga]" class="form-control" placeholder="Harga" required /></td>
                                        <td><input type="text" name="detail_spp[0][jumlah]" class="form-control" placeholder="Jumlah" required /></td>
                                        <td><input type="text" name="detail_spp[0][biaya]" class="form-control" placeholder="Biaya" required /></td>
                                        <td><textarea name="detail_spp[0][keterangan]" class="form-control" placeholder="Keterangan"></textarea></td>
                                        <td><button type="button" class="btn btn-danger remove-row btn-sm"><i class="bi bi-trash"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form><!-- Akhir Elemen Formulir Umum -->
            </div>
        </div>
    </div>
</section>

<style>
    textarea.form-control {
        resize: vertical;
        height: 70px; /* Sesuaikan tinggi sesuai kebutuhan Anda */
    }
</style>

@stop

<script>
    function getHargaJumlah(selectElement) {
        var rowIndex = $(selectElement).closest('tr').index();
        var idProker = $(selectElement).val();

        $.ajax({
            url: "{{ route('getHargaJumlah') }}",
            method: 'GET',
            data: { selected_value: idProker },
            success: function(response) {
                // Isi kolom harga dan jumlah sesuai dengan respons dari server
                var harga_satuan = response.harga || 0;
                var jumlah = response.jumlah || 0;
                $('input[name="detail_spp[' + rowIndex + '][harga]"]').val(harga_satuan);
                $('input[name="detail_spp[' + rowIndex + '][jumlah]"]').val(jumlah);
            }
        });
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Mendengarkan perubahan pada input harga atau jumlah
        $('body').on('input', 'input[name^="detail_spp["][name$="][harga]"], input[name^="detail_spp["][name$="][jumlah]"]', function() {
            var rowIndex = $(this).closest('tr').index(); // Dapatkan indeks baris untuk input ini
            
            // Dapatkan nilai harga dan jumlah dari input masing-masing
            var harga = parseFloat($(this).closest('tr').find('input[name="detail_spp[' + rowIndex + '][harga]"]').val()) || 0;
            var jumlah = parseInt($(this).closest('tr').find('input[name="detail_spp[' + rowIndex + '][jumlah]"]').val()) || 0;
            
            // Hitung biaya
            var biaya = harga * jumlah;
            
            // Tampilkan biaya yang dihitung pada input biaya
            $(this).closest('tr').find('input[name="detail_spp[' + rowIndex + '][biaya]"]').val(biaya.toFixed(2));
        });

        // Fungsi untuk menghitung biaya berdasarkan harga dan jumlah
        function hitungBiaya(rowIndex) {
            var harga = parseFloat($('input[name="detail_spp[' + rowIndex + '][harga]"]').val()) || 0;
            var jumlah = parseInt($('input[name="detail_spp[' + rowIndex + '][jumlah]"]').val()) || 0;
            var biaya = harga * jumlah;
            $('input[name="detail_spp[' + rowIndex + '][biaya]"]').val(biaya.toFixed(2));
        }

        // Mendengarkan perubahan pada input harga atau jumlah
        $('body').on('input', 'input[name^="detail_spp["][name$="][harga]"], input[name^="detail_spp["][name$="][jumlah]"]', function() {
            var rowIndex = $(this).closest('tr').index(); // Dapatkan indeks baris untuk input ini
            hitungBiaya(rowIndex);
        });

        // Mendengarkan perubahan pada select uraian_kegiatan
        $('body').on('change', 'select[name^="detail_spp["][name$="][uraian_kegiatan]"]', function() {
            var rowIndex = $(this).closest('tr').index(); // Dapatkan indeks baris untuk input ini
            var idProker = $(this).val(); // Dapatkan nilai yang dipilih dari uraian_kegiatan
            $.ajax({
                url: "{{ route('getHargaJumlah') }}",
                method: 'GET',
                data: { selected_value: idProker },
                success: function(response) {
                    // Perbarui nilai harga dan jumlah berdasarkan respons dari server
                    var harga = response.harga || 0;
                    var jumlah = response.jumlah || 0;
                    $('input[name="detail_spp[' + rowIndex + '][harga]"]').val(harga);
                    $('input[name="detail_spp[' + rowIndex + '][jumlah]"]').val(jumlah);
                    // Hitung dan perbarui biaya
                    hitungBiaya(rowIndex);
                }
            });
        });

    })
</script>


<script type="text/javascript">
    $(document).ready(function() {
        var i = 0;
        $("#addRow").click(function() {
            ++i;
            var html = '<tr>';
            html += '<td><select name="detail_spp[' + i + '][uraian_kegiatan]" class="form-control uraian_kegiatan" placeholder="Uraian Kegiatan" required onchange="getHargaJumlah(this)"><option value=""></option>@foreach($rencanas as $rencana)<option value="{{ $rencana->id_proker }}">{{ $rencana->uraian }}</option>@endforeach</select></td>';
            html += '<td><input type="text" name="detail_spp[' + i + '][harga]" class="form-control harga" placeholder="Harga" required /></td>';
            html += '<td><input type="text" name="detail_spp[' + i + '][jumlah]" class="form-control jumlah" placeholder="Jumlah" required /></td>';
            html += '<td><input type="text" name="detail_spp[' + i + '][biaya]" class="form-control biaya" placeholder="Biaya" required /></td>';
            html += '<td><textarea name="detail_spp[' + i + '][keterangan]" class="form-control" placeholder="Keterangan"></textarea></td>';
            html += '<td><button type="button" class="btn btn-danger remove-row btn-sm"><i class="bi bi-trash"></i></button></td>';
            html += '</tr>';
            $('#dynamicTable tbody').append(html);
        });

        $(document).on('click', '.remove-row', function(){
            $(this).closest('tr').remove();
        });
    });
</script>
