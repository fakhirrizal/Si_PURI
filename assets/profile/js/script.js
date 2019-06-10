$('.ui.dropdown').dropdown();
$('.special.cards .image').dimmer({
    on: 'hover'
});
$('.menu .item').tab();
$('.ui.checkbox').checkbox();

function profile_change(elem){
    var files = elem.files;

    console.log(files);
    if( files || files[0] ){
        files = files[0];
        var reader = new FileReader();

        reader.onload = function(e){
            $(elem).parent().siblings('img').attr('src', e.target.result);
            $(elem).siblings('.red').removeClass('red').addClass('teal');
            $(elem).siblings('.pointing').html('Foto terpilih');
        }
        reader.readAsDataURL(files);
    }
}

function open_modal(str){
    $("#"+str).modal('show');
}