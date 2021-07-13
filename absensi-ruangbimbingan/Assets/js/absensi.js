const content = document.querySelector("#content");
const searchButton = document.querySelector("#search-button");
const id_kelas = document.querySelector("#id_kelas");

function printDataSiswa(dataSiswa) {
	let html = `<table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th class="text-center" style="min-width: 150px">Kehadiran</th>
                        </tr>
                        </thead>
                        <tbody>`;
	dataSiswa.forEach((data) => {
		html += `<tr>
        <td><img src="${data.foto_profile}" alt="${data.nama_siswa}"/></td>
        <td>${data.nama_siswa}</td>
        <div class="form-group">
            <td class="d-none d-lg-flex justify-content-between d-xs-none">
                        <label class="form-check-label" for="hadir-${data.id_siswa}">
                        <input type="radio" class="form-check-input" name="kehadiran[${data.id_siswa}]" id="hadir-${data.id_siswa}" value="Hadir"/>
                        Hadir
                        </label>
                        <label class="form-check-label" for="izin-${data.id_siswa}">
                        <input type="radio" class="form-check-input" name="kehadiran[${data.id_siswa}]" id="izin-${data.id_siswa}" value="Izin"/>
                        Izin
                        </label>
                        <label class="form-check-label" for="alpha-${data.id_siswa}">
                        <input type="radio" class="form-check-input" name="kehadiran[${data.id_siswa}]" id="alpha-${data.id_siswa}" value="Alpha"/>
                        Alpha
                        </label>
                        <div class="form-check-danger">
                        <label class="form-check-label" for="alpha-${data.id_siswa}">
                            <input type="radio" class="form-check-input" name="kehadiran[${data.id_siswa}]" id="sakit-${data.id_siswa}" value="Sakit"/>
                            Sakit
                        </label>
                    </div>
            </td>
            <td class="d-lg-none" style="min-width: 150px">
                <select class="form-control" name="kehadiran[${data.id_siswa}]">
                    <option value="" selected disabled>Masukkan Kehadiran</option>
                    <option value="Hadir">Hadir</option>
                    <option value="Alpha">Alpha</option>
                    <option value="Izin">Izin</option>
                    <option value="Sakit">Sakit</option>
                </select>
            </td>
        </div>
    </tr>`;
	});
	html += `</tbody>
    </table>
    <div class="form-group mt-4 ml-4">
    <label>Upload Foto</label>
    <div class="input-group col-xs-12 col-lg-5">
            <input type="file" class="form-control file-upload-info" placeholder="Upload Image" name="foto_profile"/>
        </div>
    </div>
    <div class="form-group mt-3 text-lg-right">
        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
        <button class="btn btn-light">Kembali</button>
    </div>`;
	content.innerHTML = html;
}

id_kelas.addEventListener("change", async function () {
	const dataSiswa = await fetch("http://localhost/absensi-online-ruangbimbingan/dailyReport/api/getDataSiswa.php?kelas=" + id_kelas.value)
		.then((response) => response.json())
		.then((response) => response);
	printDataSiswa(dataSiswa);
});

document.addEventListener("click", function () {
	(function ($) {
		"use strict";
		$(function () {
			$(".file-upload-browse").on("click", function () {
				var file = $(this).parent().parent().parent().find(".file-upload-default");
				file.trigger("click");
			});
			$(".file-upload-default").on("change", function () {
				$(this)
					.parent()
					.find(".form-control")
					.val(
						$(this)
							.val()
							.replace(/C:\\fakepath\\/i, "")
					);
			});
		});
	})(jQuery);
});
