function processDeletePost(that) {
    var r = confirm("Confirm Delete Product");
    console.log('r', r)
    if (r == true) {
        // OK is Submit delete
        console.log($(that).closest('form'));
        $(that).closest('form').submit();
    }
}