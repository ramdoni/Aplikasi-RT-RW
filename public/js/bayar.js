$(function(){

    $('#submit_payment').click(function(){

        var cek_rekening_bank_user_id = $("input[name='rekening_bank_user_id']").val();
        var cek_rekening_bank_id = $("input[name='rekening_bank_id']").val();

        if(cek_rekening_bank_user_id == ""){
            alert("Rekening Bank harus dipilih !");
            
            return false;
        }

        if(cek_rekening_bank_id == ""){
            alert("Opsi Pembayaran harus dipilih !");
            
            return false;
        }

        $("#form_payment").submit();
    });

    $('#simpan-rekening').click(function(){
        $.ajax({
            type:"POST",
            url: $('#form-add-rekening').attr('action'),
            data: $('#form-add-rekening').serialize(),
            dataType: 'json',
            success: function(data){
                if(data.message == 'success')
                {

                }
            },
            error: function(data){

            }
        });
    });


    $(".rekening_bank_user").each(function(){
        $(this).click(function(){
            
            $(".rekening_bank_user").each(function(){
                $(this).removeClass('active-bank');
                $(this).find('.checklist-rekening-bank').hide();
            });

            $(this).addClass('active-bank');
            $(this).find('.checklist-rekening-bank').show();

            var rekening_bank_user_id = $(this).find('.rekening_bank_user_id').val();

            $("input[name='rekening_bank_user_id']").val(rekening_bank_user_id);

            $('.btn-next-rekening-bank').show();
        });
    });

    $('.btn-next-rekening-bank').click(function(){

        $("#tab-rekening").removeClass('active');
        $("#tab-pembayaran").addClass('active');

        $('.li-tab-rekening').removeClass('active');
        $('.li-tab-pembayaran').addClass('active');
    });

    $('.list-bank').each(function(){
        $(this).click(function(){
            
            $('.list-bank').each(function(){
                $(this).removeClass('active-bank');
                $(this).find('.checklist-bank').hide();
            });
            
            $(this).addClass('active-bank');
            $(this).find('.checklist-bank').show();
            
            var rekening_bank_id =  $(this).find('.hidden-rekening_bank_id').val();
            var image =  $(this).find('.hidden-rekening_bank_image').val();
            var nama_akun =  $(this).find('.hidden-rekening_bank_nama_akun').val();
            var no_rekening =  $(this).find('.hidden-rekening_bank_no_rekening').val();

            $('.transfer_ke').find('img').attr('src', image);
            $('.transfer_ke').find('.nama_akun').html(nama_akun);
            $('.transfer_ke').find('.no_rekening').html(no_rekening);

            $("input[name='rekening_bank_id']").val(rekening_bank_id);

            $('.btn-next').show();
        });
    });

    $('.btn-next').click(function(){

        $("#tab-opsi_pembayaran").removeClass('active');
        $("#tab-rekening").addClass('active');

        $('.li-tab-opsi_pembayaran').removeClass('active');
        $('.li-tab-rekening').addClass('active');

    });

});