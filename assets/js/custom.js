/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";
$(document).ready(function () {
    $('tr#dokter').hide();
    $("tr#rumah_sakit").hide();
    $("tr#poli").hide();
    
    $("#jabatan").change(function () {
        // alert("The text has been changed.");
        if ($('#jabatan').val() == 'dokter') {
            $("tr#dokter").show();
        }else{
            $("tr#dokter").hide();
        }
        
    });

    $(function () {
        if ($('#jabatan').val() == 'dokter') {
            $("tr#dokter").show();
        } else {
            $("tr#dokter").hide();
        }
    });

    $("#rujukan").change(function () {
        // alert("The text has been changed.");
        if ($('#rujukan').val() == 'ya') {
            $("tr#rumah_sakit").show();
            $("tr#poli").show();
            $("tr#rumah_sakit").attr('value', ' ');
            $("tr#poli").attr('value', ' ');
        }else{
            $("tr#rumah_sakit").hide();
            $('input[name=poli]').attr('value', 'pasien tidak di rujuk');
            $("tr#poli").hide();
            $('input[name=rumah_sakit]').attr('value', 'pasien tidak di rujuk');
        }
        
    });
    
    $(function () {
        if ($('#rujukan').val() == 'ya') {
            $("tr#rumah_sakit").show();
            $("tr#poli").show();
        } else {
            $("tr#rumah_sakit").hide();
            $("tr#poli").hide();
        }
    });
    
    $(".datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '1750:+16',
        dateFormat: 'yy-mm-dd',
        showAnim: "slide"
    });
    
    
});

$(function () {
    $('#bayar').on("input", function () {
        // alert("The text has been changed.");
        var total = $('#bayar').val();
        var jumuang = $('#jumlah').val();
        var hsl = jumuang.replace(/[^\d]/g, "");
        // alert(hsl);
        $('#bayar2').val(hsl);
        $('#kembalian').val(total - hsl);

    })

});
