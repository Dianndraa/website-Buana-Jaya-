<?php
if (!defined("INDEX")) die("---");
?>

<h2 class="sub-header">Tambah Halaman</h2>

<!-- Add some inline CSS for styling -->
<style>
    .form-horizontal {
        background-color: #f9f9f9; /* Light background for the form */
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .form-group {
        margin-bottom: 15px;
    }
    .label-control {
        font-weight: bold;
        color: #333; /* Darker text for labels */
    }
    .form-control {
        border: 1px solid #ccc; /* Light border */
        border-radius: 4px;
        transition: border-color 0.3s;
    }
    .form-control:focus {
        border-color: #007bff; /* Blue border on focus */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Light blue shadow */
    }
    .btn-primary {
        background-color: #007bff; /* Primary button color */
        border-color: #007bff; /* Button border color */
        transition: background-color 0.3s, border-color 0.3s;
    }
    .btn-primary:hover {
        background-color: #0056b3; /* Darker blue on hover */
        border-color: #0056b3; /* Darker border on hover */
    }
    .btn-primary:focus {
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Light blue shadow on focus */
    }
</style>

<form name="tambah" method="post" action="?tampil=halaman_tambahproses" class="form-horizontal">
    <div class="form-group">
        <label class="label-control col-md-2">Judul Halaman</label>    
        <div class="col-md-4">
            <input type="text" class="form-control" name="judul" size="50" placeholder="Masukkan judul halaman">
        </div>
    </div>
    
    <div class="form-group">
        <label class="label-control col-md-2">Isi Halaman</label>            
        <div class="col-md-8">
            <textarea name="isi" cols="80" rows="15" class="form-control" placeholder="Masukkan isi halaman"></textarea>
        </div>
    </div>
    
    <div class="form-group">
        <label class="label-control col-md-2"></label>                
        <div class="col-md-4">
            <input type="submit" name="tambah" value="Tambah" class="btn btn-primary">
        </div>
    </div>
</form>