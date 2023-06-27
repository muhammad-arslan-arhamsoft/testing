$(function () {
    // summernote editor
    $('.summernote').summernote(
        {
            height: 200,
            focus: false,
            onpaste: function () {
                alert('You have pasted something to the editor');
            },
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['insert', ['link', 'picture', 'video']],
                ['para', ['ol', 'ul', 'paragraph']],
                ['table', ['table']],
                ['view', ['undo', 'redo', 'fullscreen', 'codeview']]
            ]
        });
});