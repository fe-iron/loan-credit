function validateImage(dynamic_id) {
    var img = $("#"+dynamic_id).val();
    var exts = ['jpg','jpeg','png','pdf'];
    // split file name at dot
    var get_ext = img.split('.');
    // reverse name to check extension

    get_ext = get_ext.reverse();
    if (img.length > 0 ) {
        if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
          return true;
        } else {
             alert("Upload only jpg, jpeg, png, pdf files");
            return false;
        }            
    } else {
        alert("please upload a file");
        return false;
    }
    return false;
}
