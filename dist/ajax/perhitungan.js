

function hitungHarga(){
	var harga = document.getElementById("harga_kesepakatan").value || 0;
	var ppn = document.getElementById("ppn").value || 0;
	var pajak = (parseFloat(ppn)/100)*parseFloat(harga) || 0;
	var harga_ppn = parseFloat(pajak) + parseFloat(harga) || 0;
	var diskon = parseFloat(document.getElementById("diskon").value);
	var n_diskon = (diskon/100)*harga_ppn || 0;
	var total = parseFloat(harga_ppn) - parseFloat(n_diskon) || 0;

	var pum = parseFloat(document.getElementById("p_um").value) || 0;
	var uang_muka = (pum/100)*total;
	var book = parseFloat(document.getElementById("booking_fee").value) || 0;

	var sisa = total - uang_muka - book || 0;



	$("#total_harga").val(total) || 0;
	$("#uang_muka").val(uang_muka) || 0;
	$("#sisa_pembayaran").val(sisa) || 0;
}

function hitungUM(){
	var um = parseFloat(document.getElementById("uang_muka").value);
	var lama_um = parseFloat(document.getElementById("lama_um").value);
	var angsuran = Math.ceil(um/lama_um);
	$("#jumlah_angsuran_um").val(angsuran);
}

Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});



function jenis(){
	var metode = document.getElementById("cara_pembayaran").value;

	if(metode == "Tunai Bertahap"){
		$("#tahap").show();
		$("#kpr").hide();
	}else if(metode == "KPR"){
		$("#tahap").hide();
		$("#kpr").show();
	}else{
		$("#tahap").hide();
		$("#kpr").hide();
	}
}

function hitungAngsuran(){
	var sisa = parseFloat(document.getElementById("sisa_pembayaran").value);
	var lama= parseFloat(document.getElementById("lama_pembayaran").value);
	var angsuran = Math.ceil(sisa/lama);
	$("#jumlah_angsuran_bertahap").val(angsuran);
}
