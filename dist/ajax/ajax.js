var no = 0;
function hapusPemain(ids) {
     $("#"+ids).remove();

}

function validateForm() {
    var total_debit = parseInt(document.getElementById("total_debit").value);
    var total_kredit = parseInt(document.getElementById("total_kredit").value);
    if (total_debit != total_kredit) {
        alert("Jurnal yang anda entry-kan tidak Balance!");
        return false;
    }else if(total_debit == 0 || total_kredit == 0){
        alert("Jurnal yang anda entry-kan tidak Balance!");
        return false;
    }else{
        return true;
    }
}

function valid(){
  var total_bayar = parseInt(document.getElementById("total_bayar").value);
  var total_tagihan = parseInt(document.getElementById("total_tagihan").value);
  if (total_bayar != total_tagihan) {
        alert("Nominal tidak sama!");
        return false;
    }else if(total_bayar == 0 || total_tagihan == 0){
        alert("Nominal Belum dientrykan!");
        return false;
    }else{
        return true;
    }
}


function hapusJurnal(ele,no) {

    ids = ele.rowIndex;
    var table = document.getElementById('myTab');
    var debit = parseInt((table.rows[ids].cells[2].textContent.trim()));
    var kredit = parseInt((table.rows[ids].cells[3].textContent.trim()));
    var total_debit = parseInt(document.getElementById("total_debit").value) - debit;
    var total_kredit = parseInt(document.getElementById("total_kredit").value) - kredit;
    $("#total_debit").val(total_debit);
    $("#total_kredit").val(total_kredit);

    $("#"+no).remove();
    
}

function hitungTotal(){
  var totals = 0;
  for(var i=0;i<100;i++){
    totals = totals + parseInt($("#i"+i).val() || 0);
  }
  $("#total_bayar").val(totals);
}

function hitungTotals(){
  var totals = 0;
  for(var i=0;i<100;i++){
    totals = totals + parseInt($("#i"+i).val() || 0);
  }
  $("#total_bayar").val(totals);
}

function hapusBayar(ele,no) {
    var jumlah = parseInt($("#i"+no).val()) || 0;
    var ttl = parseInt($("#total_bayar").val()) || 0;
    ttl = ttl- jumlah; 
    $("#total_bayar").val(ttl);
    $("#"+no).remove();
    
}



function hapusPeng(no) {
  
  $("#"+no).remove();
  hitungTotals();
    
}

var id = 1;

$(document).ready(function(){
    $("#addBtn").click(function(){
        id = id + 1;
        $("#entry").append("<div class='row' id='"+id+"' style='margin-bottom: 15px;''> <div class='col-xs-5'> <input type='text' class='form-control' name='nama_dokumen[]' placeholder='Keterangan'></div><div class='col-xs-5'><input type='file' class='form-control' name='dokumen[]' placeholder='Dokumen' multiple/></div><div class='col-xs-2'><a href='#' class='btn btn-primary' onclick='hapusPemain("+id+"); return false;'> <i class='fa fa-trash'></i></a> </div><br></div>");
    });
});

$(document).ready(function(){
    var nop = parseInt($("#rows").val());
    $("#addPeng").click(function(){

        nop = nop + 1;
        var dataString = 'no='+nop;
        $.ajax({
            type: "POST",
            url: "dist/ajax/getPengeluaran.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#lis").append(html);
            } 
        });
    });
});

$(document).ready(function(){
    var nop = parseInt($("#rows").val());
    $("#addJadwal").click(function(){

        nop = nop + 1;
        var dataString = 'no='+nop;
        $.ajax({
            type: "POST",
            url: "dist/ajax/getJadwal.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#lis").append(html);
            } 
        });
    });
});

$(document).ready(function(){
    var nop = parseInt($("#rows").val());
    $("#addPem").click(function(){

        nop = nop + 1;
        var dataString = 'no='+nop;
        $.ajax({
            type: "POST",
            url: "dist/ajax/getBills.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#lis").append(html);
            } 
        });
    });
});

$(document).ready(function(){
    $("#ut0").hide();
    $("#uk0").hide();
    $("#addByr").click(function(){
        no = no + 1;
        var dataString = 'no='+no;
        $.ajax({
            type: "POST",
            url: "dist/ajax/getBayar.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#lis").append(html);
                $("#ut"+no).hide();
                $("#uk"+no).hide();
            } 
        });
    });
});


$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var dir = "assets/dokumen/" // Button that triggered the modal
  var recipient = dir + button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body img').attr("src", recipient);
})

$('#exampleModal2').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var dir = "assets/bukti/" // Button that triggered the modal
  var recipient = dir + button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body img').attr("src", recipient);
})


function tampil(el,id){
  
  if($(el).val() == 'Transfer'){
    $("#ut"+id).show();
    $("#uk"+id).show();
  }else{
    $("#ut"+id).hide();
    $("#uk"+id).hide();
  }
}



$(document).ready(function()
{
    $("#btn_approve").click(function()
    {
        $('#approve').modal('show');
    });
});

$('#modal_approve').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var dir = "window.location.href='app/action/actApproval.php?act=approve&no_spr=";
  var recipient = dir + button.data('whatever') +"'"; // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body a').attr("onclick", recipient);
});

$('#modal_tolak').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var dir = "window.location.href='app/action/actApproval.php?act=tolak&no_spr=";
  var recipient = dir + button.data('whatever') +"'"; // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body a').attr("onclick", recipient);
});

$('#modal_approve2').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var recipient = button.data('whatever');
  var jml = button.data('jml');  // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body input').val(recipient);
  modal.find('#jumlah').val(jml);
});

$('#modal_tolak2').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var dir = "window.location.href='app/action/actkp.php?act=tolak&no_spr=";
  //var recipient = dir + button.data('whatever') +"'";
  var spr= dir + button.data('todo').spr;
  var jml= dir + button.data('todo').jml; 
  var modal = $(this)
  modal.find('.modal-body img').attr("src", jml); // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body a').attr("onclick", spr);
});

$('#modal1s').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  //var recipient = dir + button.data('whatever') +"'";
  var no = button.data('whatever');

  var modal = $(this)
  $("#noakun").val(no);
});


$(document).ready(function(){
    $("#addBtns").click(function(){
        var no_akun= document.getElementById("no_akun").value;
        if(no_akun != ""){
          no = no+1;
          var nama_akun = document.getElementById("nama_akun").value;
          var debit = parseInt(document.getElementById("debit").value) || 0;
          var kredit = parseInt(document.getElementById("kredit").value) || 0; 
          rows = "<tr id='"+no+"' onclick='hapusJurnal(this,"+no+")'><td><input type='hidden' class='form-control' name='no_akuns[]' value='"+ no_akun +"'>" + no_akun + "</td><td>" + nama_akun + "</td><td class='text-right'><input type='hidden' class='form-control' name='debits[]' value='"+ debit +"'>" + debit + "</td><td class='text-right'><input type='hidden' class='form-control' name='kredits[]' value='"+ kredit +"'>" + kredit + "</td><td><a href='#' class='btn btn-primary' style='cursor:pointer;'> <i class='fa fa-trash'></i></a></td></tr>";
          $("#lis").append(rows);
          $("#no_akun").val("");
          $("#nama_akun").val("");
          $("#debit").val("");
          $("#kredit").val("");
          var total_debit = parseInt(document.getElementById("total_debit").value);
          var total_kredit = parseInt(document.getElementById("total_kredit").value);
          

          total_debit = total_debit + debit;
          total_kredit = total_kredit + kredit;
          $("#total_debit").val(total_debit);
          $("#total_kredit").val(total_kredit);
        }
    });
});

function getKonsumen(id,nama,alamat,telp,mail,ktp) {
     $("#nama_pemesan").val(nama);
     $("#id_pemesanan").val(id);
     $("#alamat").val(alamat);
     $("#telp").val(telp);
     $("#email").val(mail);
     $("#ktp").val(ktp);
}

function getAkun(id,nama) {
     $("#nama_akun").val(nama);
     $("#no_akun").val(id);
}

function getAkun2(id,nama) {
    var no = $("#noakun").val()
     $("#nama_akun"+no).val(nama);
     $("#no_akun"+no).val(id);
}

function getKav(no_kavling, nama_konsumen, $id_konsumen) {
     $("#no_kavling").val(no_kavling);
     $("#nama").val(nama_konsumen);
     $("#id_konsumen").val(id_konsumen);

}

function getKavling(no_kavling, tipe, blok, lokasi, luas, harga) {
     $("#no_kavling").val(no_kavling);
     $("#tipe").val(tipe);
     $("#blok").val(blok);
     $("#lokasi").val(lokasi);
     $("#luas").val(luas);
     $("#harga").val(harga);
     $("#harga2").val(harga);
}


$(document).ready(function() {
    $("#id_proyek").change(function() {
        var id_proyek =$(this).val();
        var dataString = 'id_proyek='+id_proyek;
        $.ajax({
            type: "POST",
            url: "dist/ajax/gettipe.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#id_tipe").html(html);
            } 
        });
    });
});

$(document).ready(function() {
    $("#id_termin").change(function() {

        var id_termin =$(this).val();
        var dataString = 'id='+id_termin;
        $.ajax({
            type: "POST",
            url: "dist/ajax/getBill.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#lis").html(html);
                hitungTotals();
            } 
        });
    });
});

$(document).ready(function() {
    $("#id_jenis").change(function() {
        var id_jenis = $(this).val();
        var dataString = 'id=';
        $.ajax({
            type: "POST",
            url: "dist/ajax/getBill.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#lis").html(html);
                if(id_jenis == 1){
                  $("#tagih").show();
                }else{
                  $("#tagih").hide();
                }
                
                hitungTotals();
            } 
        });
    });
});

$(document).ready(function() {
    $("#id_proyek").change(function() {
        var id_proyek =$(this).val();
        var dataString = 'id_proyek='+id_proyek;
        $.ajax({
            type: "POST",
            url: "dist/ajax/gettipe.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#id_tipe").html(html);
            } 
        });
    });
});

$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });


    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});


